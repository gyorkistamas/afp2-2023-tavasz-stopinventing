@extends('main_template')

@section('title')
<title>Manage Teams</title>
@endsection

@section('content')
<div class="container p-5 text-white mb-5">

    <div class="row justify-content-center p-5">

        @if (empty($Teams))

            <div class="col-12">
                <h1 class="text-white text-center">There are no teams created yet!</h1>
            </div>

        @else
            <div class="col-6 text-start">
                <form action="{{ url('/manage-teams/*') }}" method="GET">
                    <div class="input-group">

                        <div id="search-autocomplete" class="form-outline">

                            <input type="search" id="search" value="{{ Request::get('search') }}" name="search" class="form-control" placeholder="Search teams..."/>

                        </div>

                        <button type="submit" value="Search" class="btn btn-warning">Search</button>

                    </div>
                </form>
            </div>

            <div class="col-6 text-end">
                <a href="#" class="btn btn-primary">Create new Team</a>
            </div>
    </div>

    <div class="row justify-content-center gap-3">
            @foreach ($Teams as $team)
                <div class="card bg-dark text-center" style="width: 19rem;">

                    <div class="card-body">

                        <h5 class="card-title">{{ $team->team_name }}</h5>

                        @if ( Auth::User()->privilage == 2)
                            <p class="card-text">
                                <span class="badge bg-danger"> Scrum Master: {{ $team->scrumMaster->full_name }}</span>
                            </p>
                        @endif

                        <p class="card-text">
                            <span class="badge bg-light text-dark"> Members Count: {{ $team->members->count() }}</span>
                        </p>

                        <a href="#" class="btn btn-success">Edit Team</a>

                    </div>

                </div>
            @endforeach

            <div class="row p-5">
                <div class="col-12">
                    {{ $Teams->links('pagination::bootstrap-5') }}
                </div>
            </div>

        @endif

    </div>
</div>
@endsection


