<?php

namespace App\Http\Controllers;

use App\Mail\MeetingChangedEmail;
use App\Mail\NotificationEmail;
use App\Models\Meeting;
use App\Models\MeetingAttendant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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

        foreach ($meeting->attendants as $attendant)
        {
            Mail::to($attendant->email)->send(new MeetingChangedEmail($attendant, $meeting));
        }

        return redirect('/meeting/show/' . $meeting->id);

    }

    public function DeleteMeeting(Meeting $meeting)
    {
        if (Auth::user()->privilage != 2 && Auth::user()->id != $meeting->scrumMaster->id)
        {
            return abort(401);
        }

        $attendants = MeetingAttendant::where('meeting_id', $meeting->id)->get();

        foreach ($attendants as $attendant)
        {
            $attendant->delete();
        }

        $meeting->delete();

        return redirect('/');
    }

}
