<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\User;
use App\Models\Comment;
use App\Models\Meeting;
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

    public function CreateMeeting()
    {
        if(Auth::user()->privilage <= 1)
        {
            return abort(401);
        }

        $teams = Team::all();
        $users = User::where('id','!=',Auth::user() -> id) -> get();
        return view('meeting.create_meeting', ['teams' => $teams, 'users' => $users]);
    }
}
