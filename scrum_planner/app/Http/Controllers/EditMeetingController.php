<?php

namespace App\Http\Controllers;

use App\Models\Meeting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EditMeetingController extends Controller
{
    public function ShowEditForm(Meeting $meeting)
    {
        if (Auth::user()->privilage != 2 && Auth::user()->id != $meeting->scrumMaster->id)
        {
            return abort(401);
        }

        return view('meeting.edit_meeting', ['meeting' => $meeting]);
    }

    public function EditMeeting(Meeting $meeting, Request $request)
    {
        if (Auth::user()->privilage != 2 && Auth::user()->id != $meeting->scrumMaster->id)
        {
            return abort(401);
        }

        $fields = $request->validate([
            'name' => ['required'],
            'start_time' => ['required'],
            'end_time' => ['required'],
            'description' => ['required']
        ]);

        $meeting->name = $fields['name'];
        $meeting->start_time = $fields['start_time'];
        $meeting->end_time = $fields['end_time'];
        $meeting->description = $fields['description'];

        $meeting->save();

        return redirect('/meeting/show/' . $meeting->id);

    }
}
