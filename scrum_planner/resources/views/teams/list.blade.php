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
                <form action="{{ url('/manage-teams') }}" method="GET">
                    <div class="input-group">

                        <div id="search-autocomplete" class="form-outline">

                            <input type="search" id="search" value="{{ Request::get('search') }}" name="search" class="form-control" placeholder="Search teams..."/>

                        </div>

                        <button type="submit" value="Search" class="btn btn-warning">Search</button>

                    </div>
                </form>
            </div>

            <div class="col-6 text-end">
                <a href="{{ url('/team/create') }}" class="btn btn-primary">Create new Team</a>
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

                        <a href="{{ url('/team/edit/'. $team->id) }}" class="btn btn-success">Edit Team</a>

                        <button class="btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete team</button>

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

<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Team</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h2>Are you sure you want to delete the team?</h2>
            </div>
            <div class="modal-footer">
                <a type="button" class="btn btn-danger" href="#">Confirm</a>
                <button type="button" class="btn btn-success" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
@endsection


