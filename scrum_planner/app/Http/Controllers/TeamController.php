<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function CreateTeam()
    {
        return view('teams.creating_team', [User::where('id','!=',Auth::user() -> id) -> get()]);
    }

    public function Creation(Request $request)
    {
        $fields = $request -> validate([
            'team_name' => ['required'],
            '?' => ['?']
        ]);

        return redirect('/team');
    }
}
