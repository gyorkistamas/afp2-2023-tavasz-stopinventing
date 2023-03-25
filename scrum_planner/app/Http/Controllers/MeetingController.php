<?php

namespace App\Http\Controllers;

use App\Models\Meeting;
use Illuminate\Http\Request;

class MeetingController extends Controller
{
    //

    public function ShowMeeting(Meeting $meeting) 
    {
        return view('meeting.view_meeting', ['meeting' => $meeting]);
    }
}
