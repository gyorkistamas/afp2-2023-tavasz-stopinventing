@extends('main_template')

@section('title')
	<title>Creating team</title>
@endsection

@section('content')

<div class="container d-flex align-items-center justify-content-center text-center p-5">
    <div class="text-white">

        <h1 class="mb-3">Create new team</h1>

        <form action={{ url('/sign-in') }} method="POST">
        @csrf

        <div class="form-outline mb-4">

            <label class="d-flex justify-content-start align-items-start pe-3 fw-bold form-label" for="teamName">
                Team Name
            </label>

            <input
                name="team_name"
                type="text"
                id="teamName"
                class="form-control form-control-lg"
                placeholder="Enter a team name"
                required
            />

            @error('team_name')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror

        </div>

        <div class="form-outline mb-3">

            <label class="d-flex justify-content-start align-items-start pe-3 fw-bold form-label" for="teamMembers">
                Team members
            </label>

            <input
                name="team_members"
                type="text"
                id="teamMembers"
                class="form-control form-control-lg"
                placeholder=""
				aria-haspopup="listbox"
				aria-multiselectable="true"
                required
            />

            @error('team_members')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror

        </div>

        <div class="text-center text-lg-start mt-4 pt-2">

            <div class="text-center">
                <button type="submit" class="btn btn-outline-light btn-success btn-lg m-2">
                    Create team
                </button>

				<button type="button" class="btn btn-outline-light btn-danger btn-lg m-2">
                    Cancel
                </button>
            </div>

        </div>

        </form>

    </div>
</div>

@endsection