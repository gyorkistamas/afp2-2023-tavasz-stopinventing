@extends('main_template')

@section('title')
<title>Create meeting</title>
@endsection

@section('custom_css')
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endsection

@section('content')

<div class="container-fluid text-white mt-3">
    <form action={{url('/meeting/create')}} method="post">
        @csrf
    <div class="row">
        <div class="col-12 col-lg-6">
            <div class="card text-center bg-dark border-primary border-4 mb-3 mt-lg-2">
                <div class="card-header bg-primary">
                    <h1>Meeting Creation</h1>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div>
                            <input
                                type="text"
                                name="name"
                                id="meetingName"
                                class="form-control form-control-lg"
                                placeholder="Title of the meeting"
                                value="{{ old("name") }}"
                                required
                            >
        
                            @error('name')
                                <p class="text-warning text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
        
                    <div class="row">
                        <div>
                            <label for="date" class="-flex justify-content-start align-items-start pe-3 fw-bold form-label">Starting Date:</label>
        
                            <input
                                type="datetime-local"
                                class="form-control form-control-lg"
                                name="start_time"
                                id="startTime"
                                value="{{ old("start_time") }}"
                                required
                            >
        
                            @error('start_time')
                                <p class="text-warning text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
        
                    <div class="row">
                        <div>
                            <label for="date" class="-flex justify-content-start align-items-start pe-3 fw-bold form-label">End Date:</label>
        
                            <input
                                type="datetime-local"
                                class="form-control form-control-lg"
                                name="end_time"
                                id="endTime"
                                value="{{ old("end_time") }}"
                                required
                            >
        
                            @error('end_time')
                                <p class="text-warning text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
        
                    <div class="row">
                        <div>
                            <label class="-flex justify-content-start align-items-start pe-3 fw-bold form-label">Description:</label>
        
                            <textarea
                                name="description"
                                id="description"
                                class="form-control form-control-lg"
                                placeholder="Description of meeting">{{ old("description") }}</textarea>
                        </div>
                    </div>
        
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-6">
            <div class="card text-center bg-dark border-primary border-4 mb-3 mt-lg-2">
                <div class="card-header bg-primary">
                    <h2>
                        Invite teams:
                    </h2> 
                </div>
                <div class="card-body">
                    <div class="text-dark">
                        <select id="team_chooser" multiple="multiple" name="teams[]" style="width: 100%;">
                            @foreach($teams as $team)
                                <option value="{{  $team->id }}">{{  $team->team_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    @error('teams[]')
                        <p class="text-warning text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>
            </div>
            
            <div class="row">
                <div>
                    <div class="card text-center bg-dark border-primary border-4 mb-3 mt-lg-2">
                        <div class="card-header bg-primary">
                            <h2>
                                Invite individuals:
                            </h2>
                        </div>
                        <div class="card-body">
                            <div class="text-dark">
                                <select id="individuals_chooser" multiple="multiple" name="individuals[]" style="width: 100%;">
                                    @foreach($users as $user)
                                        <option value="{{  $user->id }}">{{  $user->full_name }} ({{ $user->email  }})</option>
                                    @endforeach
                                </select>
                            </div>
        
                            @error('individuals[]')
                                <p class="text-warning text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="card bg-transparent">
                    @if (session() -> has('success'))
                        <h1 class="bg-success">{{session() -> get('success')}}</h1>
                    @endif
                    @if (session() -> has('invalidTime'))
                        <h1 class="bg-warning">{{session() -> get('invalidTime')}}</h1>
                    @endif
                </div>
            </div>

            <div class="d-flex">
                <button type="submit" class="btn btn-outline-light btn-success btn-lg me-auto">
                    Create meeting
                </button>
            
                <a href="/" class="btn btn-outline-light btn-danger btn-lg ms-auto">
                    Cancel
                </a>
            </div>
        </div>
    </div>
    </form>
</div>


<script>
    $(document).ready(function() {
        $('#team_chooser').select2({
            width: 'resolve'
        });
    });
    $(document).ready(function() {
        $('#individuals_chooser').select2({
            width: 'resolve'
        });
    });

</script>

@endsection
