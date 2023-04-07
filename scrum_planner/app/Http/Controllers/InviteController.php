<?php

namespace App\Http\Controllers;

use App\Models\Meeting;
use App\Models\MeetingAttendant;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InviteController extends Controller
{
    //

    public function invites()
    {
        $meetings = Auth::user()->meetings
                                ->where('start_time', '>=', Carbon::now()->toDateTimeString());

        return view('meeting.my_invites')->with(['meetings' => $meetings]);
    }

    public function SetAttendance(Request $request)
    {
        $fields = $request->validate([
            'meetingId' => ['required'],
            'participate' => ['required']
        ]);

        $attendance = MeetingAttendant::where('meeting_id', $fields['meetingId'])
                                        ->where('user_id', Auth::user()->id)
                                        ->first();

        $attendance->participate = $fields['participate'];

        $attendance->save();

        return redirect()->back()->with(['success' => 'Answer saved']);
    }
}
