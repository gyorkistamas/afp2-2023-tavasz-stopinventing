<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\User;
use App\Models\Comment;
use App\Models\Meeting;
use App\Models\MeetingAttendant;
use DateTime;
use Illuminate\Http\Request;
use App\Mail\NotificationEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class MeetingController extends Controller
{
    //

    public function ShowMeeting(Meeting $meeting)
    {
        $attendant = false;

        foreach ($meeting->attendants as $attendant) {
            if ($attendant->id == Auth::user()->id)
            {
                $attendant = true;
                break;
            }

        }

        $attendantIDs = array();

        foreach ($meeting->attendants as $attendant)
        {
            $attendantIDs[] = $attendant->id;
        }

        $attendantIDs[] = $meeting->scrumMaster->id;



        $allUsers = User::whereNotIn('id', $attendantIDs)->get();

        if(Auth::user()->id == $meeting->organiser || Auth::user()->privilage == 2 || $attendant)
        {
            return view('meeting.view_meeting', ['meeting' => $meeting, 'users' => $allUsers, 'teams' => Team::all()]);
        }

        return abort(401);

    }

    public function RecordComment(Request $request)
    {
        $fields = $request->validate([
            'meeting_id' => ['required'],
            'user_id' => ['required'],
            'comment' => ['required']
        ]);

        Comment::create($fields);

        return redirect()->back()->with(['created' => 'Comment successfully created!']);
    }

    public function RemoveParticipant(Request $request)
    {

        $fields = $request->validate([
            'meeting_id' => ['required'],
            'user_id' => ['required']
        ]);
        $attendant = MeetingAttendant::where('meeting_id', $fields['meeting_id'])->
                                       where('user_id', $fields['user_id'])->first();

        $attendant->delete();

        return redirect()->back()->with('user-removed', 'User removed from meeting');
    }

    public function AddParticipants(Request $request)
    {
        $addedCount = 0;
        $failed = 0;

        if (!empty($request->teams))
        {
            foreach ($request->teams as $id)
            {
                $team = Team::find($id);
                foreach ($team->members as $participant)
                {
                    try {
                        MeetingAttendant::create(['meeting_id' => $request->meeting_id, 'user_id' => $participant->id, 'participate' => 0]);
                        Mail::to($participant->email)->send(new NotificationEmail(Meeting::find($request->meeting_id), $participant));
                        $addedCount += 1;
                    }
                    catch (\Exception) { $failed += 1; }
                }
            }
        }

        if (!empty($request->participants))
        {
            foreach ($request->participants as $participant)
            {
                try {
                    MeetingAttendant::create(['meeting_id' => $request->meeting_id, 'user_id' => $participant, 'participate' => 0]);
                    $user = User::find($participant);
                    Mail::to($user->email)->send(new NotificationEmail(Meeting::find($request->meeting_id), $user));
                    $addedCount += 1;
                }
                catch (\Exception) { $failed += 1; }
            }
        }

        return redirect()->back()->with(['users_added' => $addedCount . ' user added, '. $failed . ' failed']);
    }

    //Creation Segment

    public function CreateMeetingSite()
    {
        if(Auth::user()->privilage < 1)
        {
            return abort(401);
        }

        $teams = Team::all();
        $users = User::where('id','!=',Auth::user() -> id) -> get();
        return view('meeting.create_meeting', ['teams' => $teams, 'users' => $users]);
    }

    public function MeetingCreation(Request $request)
    {
        if(Auth::user()->privilage < 1)
        {
            return abort(401);
        }

        $fields = $request -> validate([
            'name' => ['required', 'min:3'],
            'start_time' => ['required'],
            'end_time' => ['required'],
            'description' => [],
            'teams' => [],
            'individuals' => []
        ]);

        $createError = 0;

        $newMeeting = Meeting::create([
            'name' => $fields['name'],
            'start_time' => $fields['start_time'],
            'end_time' => $fields['end_time'],
            'organiser' => Auth::user() -> id,
            'description' => $fields['description']
        ]);

        if (!empty($fields['teams'])) {
            foreach ($request->teams as $id) {
                $team = Team::find($id)->first();
                foreach ($team->members as $participant) {
                    try {
                        MeetingAttendant::create(['meeting_id' => $newMeeting -> id, 'user_id' => $participant->id, 'participate' => 0]);
                    }
                    catch (\Throwable $th) {
                        $createError += 1;
                    }
                }
            }
        }

        if (!empty($fields['individuals'])) {
            foreach ($fields['individuals'] as $individual) {
                try {
                    MeetingAttendant::create(['meeting_id' => $newMeeting -> id, 'user_id' => $individual, 'participate' => 0]);
                } catch (\Throwable $th) {
                    $createError += 1;
                }
            }
        }

        foreach ($newMeeting->attendants as $attendant) {
            Mail::to($attendant->email)->send(new NotificationEmail($newMeeting, $attendant));

        }

        return redirect() -> back() -> with(['success' => 'Meeting has been created!']);
    }

    public function MyMeetings(Request $request)
    {
        if(date('D', strtotime($request->date)) != 'Mon')
        {
            return abort(404);
        }

        $from = date('Y-m-d H:i:s', strtotime($request->date));
        $to = (new DateTime($from))->modify('+6 day')->format('Y-m-d H:i:s');
        $meetings = Auth::user()->meetings->whereBetween('start_time', [$from, $to])
                    ->merge(Meeting::where('organiser', Auth::user()->id)
                        ->whereBetween('start_time', [$from, $to])
                        ->get())
                    ->sortBy('start_time');

        $numberOfRows = $meetings->groupBy(function($date) {
            return Carbon::parse($date->start_time)->format('Y.m.d');
        })
            ->map
            ->count()
            ->max();

        $meetingsToDaysArray = [];

        $invitesToBeRespondedTo = Auth::user()->meetings->where('pivot.participate', '0')
                                                        ->where('start_time', '>=', Carbon::now()->toDateTimeString())
                                                        ->count();

        for ($i = 0; $i < 7; $i++)
        {
            $meetingsToDaysArray[$i] = array();

            foreach ($meetings as $meeting)
            {
                if ($this->DayToNumber(date('l', strtotime($meeting->start_time))) == $i)
                {
                    array_push($meetingsToDaysArray[$i], $meeting);
                }
            }
        }


        return view('meeting.my_meetings')->with(['date' => $request->date,
                                                        'rowNum' => $numberOfRows,
                                                        'meetings' => $meetingsToDaysArray,
                                                        'inviteNumber' => $invitesToBeRespondedTo]);
    }

    private function DayToNumber($day) {
        switch ($day)
        {
            case 'Monday': return 0;
            case 'Tuesday': return 1;
            case 'Wednesday': return 2;
            case 'Thursday': return 3;
            case  'Friday': return 4;
            case 'Saturday': return 5;
            case 'Sunday': return 6;
        }
    }

    public function MyMeetingsThisWeek(Request $request)
    {
        $thisMonday = date("Y-m-d", strtotime('monday this week'));

        return redirect('my-meetings/' . $thisMonday);
    }

    public function ListMeetings(Request $request) {

        $listOfMeetings = null;

        if (Auth::User()->privilage < 1) {
            return abort(401);
        }

        switch (Auth::User()->privilage) {

            case 1:

                $listOfMeetings = Meeting::where('organiser', '=', Auth::User()->id)
                ->paginate(8);

                break;


            case 2:

                $listOfMeetings = Meeting::paginate(8);

                break;
        }

        return view('meeting.list', ['Meetings' => $listOfMeetings]);

    }
}
