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

    public function ListTeams(Request $request) {

        $listOfTeams = null;


        if (!Auth::check() || Auth::User()->privilage < 1) {
            return abort(401);
        }

        switch (Auth::User()->privilage) {
            case 1:
                //Scrum Master

                // SELECT teams.id, teams.team_name, COUNT(team_members.user_id)
                // FROM teams
                // INNER JOIN team_members ON team_members.team_id = teams.id
                // WHERE teams.scrum_master = 5
                // GROUP BY teams.id, teams.team_name;


                $listOfTeams = $request->search ?  Team::where(
                    ['scrum_master', '=', Auth::User()->id],
                    ['team_name', 'LIKE', $request->search]
                )->paginate(8) :

                Team::where(['scrum_master', '=', Auth::User()->id])
                ->paginate(8);
                break;

            case 2:
                //Admin

                $listOfTeams = $request->search ? Team::where(
                    'team_name', 'LIKE', '%'.$request->search.'%'
                )->paginate(8) :
                Team::paginate(8);
                break;

        }

        // dd($listOfTeams);

        // $listOfTeams = null;
        return view('teams.list', ['Teams' => $listOfTeams]);
    }
}
