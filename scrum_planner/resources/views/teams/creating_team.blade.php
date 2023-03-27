@extends('main_template')

@section('title')
	<title>Creating team</title>
@endsection

@section('custom_css')
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/css/bootstrap-select.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/bootstrap-select.min.js"></script>
@endsection

@section('content')

<div class="container d-flex align-items-center justify-content-center text-center p-5">
    <div class="text-white">

        <h1 class="mb-3">Create new team</h1>

        <form action={{ url('/team/create') }} method="POST">
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

            <select class="selectpicker" data-live-search="true">
                <option data-tokens="ketchup mustard">Hot Dog, Fries and a Soda</option>
                <option data-tokens="mustard">Burger, Shake and a Smile</option>
                <option data-tokens="frosting">Sugar, Spice and all things nice</option>
            </select>
              
            @error('?')
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