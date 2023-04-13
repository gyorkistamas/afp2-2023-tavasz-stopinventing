<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\User;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EditTeamController extends Controller
{
    public function EditForm(Team $team)
    {
        if (Auth::user()->privilage != 2 && Auth::user()->id != $team->scrumMaster->id) {
            return abort(401);
        }

        $teamMemberIds = $team->members->pluck('id');
        $notMember = User::whereNotIn('id', $teamMemberIds)->get();

        return view('teams.edit_team', ['team' => $team, 'notMember' => $notMember]);
    }

    public function EditTeam(Team $team, Request $request)
    {
        if (Auth::user()->privilage != 2 && Auth::user()->id != $team->scrumMaster->id)
        {
            return abort(401);
        }

        $fields = $request -> validate([
            'team_name' => ['required', 'min:3'],
            'members' => ['']
        ]);

        $team->team_name = $fields['team_name'];

        if (!empty($request->members)) {
            foreach ($request->members as $member) {
                try {
                    TeamMember::create(['team_id' => $team -> id, 'user_id' => $member]);
                } catch (\Throwable $th) {
                    return redirect() -> back() -> with(['failed' => 'Team cant be modified!']);
                }
            }
        }
        
        $team->save();

        return redirect('/manage-teams');
    }

    public function RemoveMember(Request $request)
    {
        $fields = $request->validate([
            'team_id' => ['required'],
            'user_id' => ['required']
        ]);

        $member = TeamMember::where('team_id', $fields['team_id'])->where('user_id', $fields['user_id'])->first();

        $member->delete();

        return redirect()->back()->with('member-removed', '1 Member removed from the team');
    }
}
