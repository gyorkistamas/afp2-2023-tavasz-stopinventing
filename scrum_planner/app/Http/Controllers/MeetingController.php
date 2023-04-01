<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\User;
use App\Models\Comment;
use App\Models\Meeting;
use Illuminate\Http\Request;
use App\Mail\NotificationEmail;
use App\Models\MeetingAttendant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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

        if(Auth::user()->id == $meeting->organiser || Auth::user()->privilage == 2 || $attendant)
        {
            return view('meeting.view_meeting', ['meeting' => $meeting]);
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

    //Creation Segment

    public function CreateMeetingSite()
    {
        if(Auth::user()->privilage <= 1)
        {
            return abort(401);
        }

        $teams = Team::all();
        $users = User::where('id','!=',Auth::user() -> id) -> get();
        return view('meeting.create_meeting', ['teams' => $teams, 'users' => $users]);
    }

    public function MeetingCreation(Request $request)
    {
        if(Auth::user()->privilage <= 1)
        {
            return abort(401);
        }

        $fields = $request -> validate([
            'name' => ['required'],
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
            Mail::to($attendant->email) -> send(new NotificationEmail());

        }

        return redirect() -> back() -> with(['success' => 'Meeting has been created!']);
    }
}
