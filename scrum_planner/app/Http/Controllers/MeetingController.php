<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Meeting;
use App\Models\MeetingAttendant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            return view('meeting.view_meeting', ['meeting' => $meeting, 'users' => $allUsers]);
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

        foreach ($request->participants as $participant)
        {
            try {
                MeetingAttendant::create(['meeting_id' => $request->meeting_id, 'user_id' => $participant, 'participate' => 0]);
                $addedCount += 1;
            }
            catch (\Exception) { $failed += 1; }
        }

        return redirect()->back()->with(['users_added' => $addedCount . ' user added, '. $failed . ' failed']);
    }
}
