@extends('main_template')

@section('title')
    <title>My invites</title>
@endsection

@section('content')


    <div class="container text-white mt-5 bg-dark p-4 rounded-3">

        <div class="row mb-5">
            <div class="col-12 col-lg-9">@if(session()->has('success')) <h1> <span class="bg-success">Response recorded</span> </h1> @endif</div>

            <div class="col-12 col-lg-3"><a href="/my-meetings" class="btn btn-primary"> <-- Back to my meetings</a></div>
        </div>
        @foreach($meetings as $meeting)
            <div class="row mb-5 border-bottom pb-4">

                <div class="col-0 col-lg-2"></div>

                <div class=" col-10 col-lg-4">
                    <h3><a href="/meeting/show/{{$meeting->id}}" class="link-light">{{  $meeting->name }}</a></h3>
                    <h6> {{  $meeting->start_time }} </h6>
                </div>

                <div class="col-2 col-lg-2">
                    Status:
                    <img src="@switch($meeting->pivot->participate)
						@case(0)
							{{url('/no-response.png')}}
							@break
						@case(1)
							{{url('/yes.png')}}
							@break
						@case(2)
							{{url('/no.png')}}
							@break

					@endswitch" class="img-thumbnail response-img">
                </div>

                <div class="col-6 col-lg-1">
                    <form action="/set-attendance" method="POST">
                        @csrf
                        <input type="hidden" name="meetingId" value="{{$meeting->id}}">
                        <input type="hidden" name="participate" value="1">
                        <button type="submit" class="btn btn-success">Accept</button>
                    </form>
                </div>

                <div class="col-6 col-lg-1">
                    <form action="/set-attendance" method="POST">
                        @csrf
                        <input type="hidden" name="meetingId" value="{{$meeting->id}}">
                        <input type="hidden" name="participate" value="2">
                        <button type="submit" class="btn btn-danger">Deny</button>
                    </form>
                </div>

            </div>
        @endforeach
    </div>

@endsection
