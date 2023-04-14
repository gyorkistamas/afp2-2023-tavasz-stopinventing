@extends('main_template')

@section('title')
    <title>Manage Meetings</title>
@endsection


@section('content')
<div class="container p-5 text-white mb-5">

    <div class="row justify-content-center p-5">

        <div class="col-6 {{ Auth::User()->privilage < 2 ? 'text-start' : 'text-center' }} ">
            <h3 class="text-white">{{ Auth::User()->privilage < 2 ? 'My Own Meetings' : 'Created Meetings' }}</h3>
        </div>

        @if (Auth::User()->privilage < 2)
            <div class="col-6 text-end">
                <a href="{{ url('/meeting/create') }}" class="btn btn-primary">Create new Meeting</a>
            </div>
        @endif

    </div>

    <div class="row justify-content-center gap-3">

        @if (empty($Meetings))

            <div class="col-12">
                <h1 class="text-white text-center">There are no meetings created yet!</h1>
            </div>

        @else

            @foreach ($Meetings as $meeting)

                <div class="card bg-dark text-center" style="width: 19rem;">

                    <div class="card-body">

                        <h4 class="card-title">{{ $meeting->name }}</h4>

                        <p class="card-text">
                            <span class="badge bg-light text-dark"> Participants: {{ $meeting->attendants->count() }}</span>
                        </p>

                        <p class="card-text">
                            <span class="badge bg-light text-dark"> Starts at: {{ $meeting->start_time }}</span>
                        </p>

                        @if (Auth::User()->privilage == 2)
                            <p class="card-text">
                                <span class="badge bg-light text-dark"> Organiser: {{ $meeting->scrumMaster->full_name }}</span>
                            </p>
                        @endif

                        <a href="/meeting/show/{{ $meeting->id }}" class="btn btn-primary">View</a>

                        <a href="/meeting/edit/{{ $meeting->id }}" class="btn btn-info text-white">Edit</a>

                        <a href="/meeting/delete/{{ $meeting->id }}" class="btn btn-warning">Cancel</a>

                    </div>

                </div>

            @endforeach

            <div class="row p-5">
                <div class="col-12">
                    {{ $Meetings->links('pagination::bootstrap-5') }}
                </div>
            </div>

        @endif

    </div>

</div>

@endsection
