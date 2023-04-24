<?php

namespace App\Http\Controllers;

use App\Mail\Team_deleted;
use App\Mail\Team_member_removed;
use App\Mail\Team_modified;
use App\Models\Team;
use App\Models\User;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use App\Mail\TeamNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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
                    Mail::to($member->email)->send(new TeamNotification($team, $member));
                } catch (\Throwable $th) {
                    return redirect() -> back() -> with(['failed' => 'Team cant be modified!']);
                }
            }
        }      
        $team->save();

        foreach ($team->members as $member) {
            Mail::to($member->email)->send(new Team_modified($team, $member));
        }

        return redirect('/manage-teams');
    }

    public function RemoveMember(Team $team, Request $request)
    {
        $fields = $request->validate([
            'team_id' => ['required'],
            'user_id' => ['required']
        ]);

        $theTeam = Team::where('id', $fields['team_id'])->first();
        $memberId = TeamMember::where('team_id', $fields['team_id'])->where('user_id', $fields['user_id'])->first();
        $member = User::where('id', $memberId['user_id'])->first();

        Mail::to($member->email)->send(new Team_member_removed($theTeam, $member));

        $memberId->delete();

        return redirect()->back()->with(['member-removed' => '1 Member removed from the team']);
    }

    public function DeleteTeam(Team $team)
    {
        if (Auth::user()->privilage != 2 && Auth::user()->id != $team->scrumMaster->id)
        {
            return abort(401);
        }

        $members = TeamMember::where('team_id', $team->id)->get();

        foreach ($members as $member) {
            Mail::to($member->email)->send(new Team_deleted($team, $member));
            $member->delete();
        }

        $team->delete();

        return redirect('/manage-teams');
    }
}
