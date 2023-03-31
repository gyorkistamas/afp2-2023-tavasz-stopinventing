<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\TeamMember;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeamController extends Controller
{
    public function CreateTeam()
    {
        if(Auth::user()->privilage <= 1)
        {
            return abort(401);
        }

        $users = User::where('id','!=',Auth::user() -> id) -> get();
        return view('teams.creating_team', ['users' => $users]);
    }

    public function Creation(Request $request)
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

        return redirect() -> back() -> with(['success' => 'Team has been created! ('.$createError.' could not be added!)']);
    }
}
