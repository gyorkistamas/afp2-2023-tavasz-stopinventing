<?php

namespace App\Http\Controllers;


use App\Models\Team;
use App\Models\User;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use App\Mail\TeamNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;


class TeamController extends Controller
{
    public function CreateTeamSite()
    {

        if(Auth::user()->privilage <= 1)
        {
            return abort(401);
        }

        $users = User::where('id','!=',Auth::user() -> id) -> get();
        return view('teams.creating_team', ['users' => $users]);

    }

    public function TeamCreation(Request $request)
    {
        $fields = $request -> validate([
            'team_name' => ['required'],
            'members' => ['required']
        ]);

        if(Auth::user()->privilage <= 1)
        {
            return abort(401);
        }

        $newTeam = Team::create(['team_name' => $fields['team_name'], 'scrum_master' => Auth::user() -> id]);
        $createError = 0;
        foreach ($fields['members'] as $member) {
            try {
                TeamMember::create(['team_id' => $newTeam -> id, 'user_id' => $member]);
            } catch (\Throwable $th) {
                $createError += 1;
            }
        }

        foreach ($newTeam->members as $member) {
            Mail::to($member->email)->send(new TeamNotification($newTeam, $member));

        }

        return redirect() -> back() -> with(['success' => 'Team has been created!']);
    }
}
