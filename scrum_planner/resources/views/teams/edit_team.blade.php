@extends('main_template')

@section('title')
	<title>Creating team</title>
@endsection

@section('custom_css')
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endsection

@section('content')

<div class="container d-flex align-items-center justify-content-center text-center p-5">
    <div class="row">
        <div class="col-lg">
            <div class="card text-center text-white bg-dark border-primary border-4">
                <div class="card-header bg-primary mb-3">
                    <h1>Modify the {{$team->team_name}}</h1>
                </div>
                <div class="card-body">
                    <form action={{ url('/team/edit/'. $team->id) }} method="POST">
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
                                value= "{{$team->team_name}}"
                                required
                            />
                
                            @error('team_name')
                                <p class="text-warning text-xs mt-1">{{$message}}</p>
                            @enderror
                
                        </div>
                
                        <div class="form-outline mb-3">
                
                            <label class="d-flex justify-content-start align-items-start pe-3 fw-bold form-label" for="teamMembers">
                                Add new members
                            </label>
                
                            <div class="text-dark">
                                <select id="member-chooser" multiple="multiple" name="members[]" style="width: 600px;">
                                    @foreach($notMember as $user)
                                        <option value="{{  $user->id }}">{{  $user->full_name }} ({{ $user->email  }})</option>
                                    @endforeach
                                </select>
                            </div>
                
                            @error('members[]')
                                <p class="text-warning text-xs mt-1">{{$message}}</p>
                            @enderror
                
                        </div>
                
                        <div class="text-center text-lg-start mt-4 pt-2">
                
                            <div class="text-center">
                                <button type="submit" class="btn btn-outline-light btn-success btn-lg m-2">
                                    Modify team
                                </button>
                
                                <a href="/manage-teams" class="btn btn-outline-light btn-warning btn-lg m-2">
                                    Cancel
                                </a>

                                <button class="btn btn-outline-light btn-danger btn-lg m-2" type="button" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                    Delete team
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg">
            <div class="card text-center text-white bg-dark border-primary border-4">
                <div class="card-header bg-primary mb-3">
                    <h1>Team members</h1>
                </div>
                <div class="card-body">
                    @foreach ($team->members as $user)
                        <div class="row mt-2 bordered p-2 ms-1 me-1 mb-2">
                            <div class="col-2 col-sm-1">
                                <img class="img small-pic" src="{{ url($user->picture) }}">
                            </div>
    
                            <div class="col-10 col-sm-6">
                                <h6>{{$user->full_name}}</h6>
                            </div>
    
                            <div class="col-6 col-sm-4 mt-3 mt-sm-0">
                                <form action={{ url('/team/edit/'. $team->id) }}, method="POST">
                                    @csrf
                                    <div style="display: none;">
                                        <input type="number" value="{{$team->id}}" name="team_id">
                                        <input type="number" value="{{$user->id}}" name="user_id">
                                    </div>
    
                                    <button type="submit" class="btn btn-danger">Remove from {{$team->team_name}}</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            @if (session() -> has('failed'))
                <h1 class="bg-danger">{{session() -> get('failed')}}</h1>
            @endif
            @if (session() -> has('member-removed'))
                <h1 class="bg-warning">{{session() -> get('member-removed')}}</h1>
            @endif
        </div>
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
                <a type="button" class="btn btn-danger" href="/team/delete/{{$team->id}}">Confirm</a>
                <button type="button" class="btn btn-success" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#member-chooser').select2({
            width: 'resolve'
        });
    });
</script>

@endsection
