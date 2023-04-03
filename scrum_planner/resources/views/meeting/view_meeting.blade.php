@extends('main_template')

@section('title')
	<title>View meeting</title>
@endsection

@section('custom_css')
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endsection

@section('content')

	<div class="container-fluid text-white mt-3">

		<div class="row">
			<div class="col-12 col-lg-6 d-flex justify-content-center justify-content-lg-start border-bottom">
				<h1>{{$meeting->name}}</h1>
			</div>
			<div class="col-12 col-lg-6 d-flex justify-content-center justify-content-lg-end mt-2 mt-lg-0">
				<div class="">
					<a class="btn btn-warning me-0 me-lg-2">Edit meeting</a>
					<a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Add new participant(s)</a>
				</div>
			</div>
		</div>

		<div class="row mt-3">

			<!-- The meeting data side -->
			<div class="col-12 col-lg-6">
				<div class="row border-bottom mb-3">
					<h2>Details:</h2>
				</div>

				<div class="row">
					<div class="col-12 col-sm-3"><h3>Start time:</h3></div>
					<div class="col-12 col-sm-9"><h3>{{$meeting->start_time}}</h3></div>
					<hr class="d-block d-sm-none">
				</div>

				<div class="row">
					<div class="col-12 col-sm-3"><h3>End time:</h3></div>
					<div class="col-12 col-sm-9"><h3>{{$meeting->end_time}}</h3></div>
					<hr class="d-block d-sm-none">
				</div>

				<div class="row">
					<div class="col-12 col-sm-3"><h3>Organiser:</h3></div>
					<div class="col-12 col-sm-9"><h3>{{$meeting->scrumMaster->full_name}}</h3></div>
					<hr class="d-block d-sm-none">
				</div>

				<div class="row border-bottom">
					<div class="col-12 col-sm-3"><h3>Description:</h3></div>
					<div class="col-12 col-sm-9"><p class="ms-2">{{$meeting->description}}</p></div>
					<hr class="d-block d-sm-none">
				</div>

				<div class="row mt-2">
					<h2>Participants: @if(session()->has('user-removed')) <span class="bg-success">User removed successfully!</span> @endif
                                     @if(session()->has('users_added')) <span class="bg-success">{{  session()->get('users_added') }}</span> @endif
                    </h2>
				</div>

				<div class="row mt-2">
					<h6>({{$meeting->attendants()->wherePivot('participate', '=', '0')->count()}} not responded, {{$meeting->attendants()->wherePivot('participate', '=', '1')->count()}} attends, {{$meeting->attendants()->wherePivot('participate', '=', '2')->count()}} cannot attend)</h6>
				</div>

				@if ($meeting->attendants()->count() == 0)
					<h4>There aren't any participants yet!</h4>
				@endif

				<!-- A single participant template -->
				@foreach ($meeting->attendants as $attendant)
				<div class="row mt-2 bordered p-2 ms-1 me-1 mb-2">

					<div class="col-2 col-sm-1">
						<img class="img small-pic" src="{{ url($attendant->picture) }}">
					</div>

					<div class="col-10 col-sm-6">
						<h6>{{$attendant->full_name}}</h6>
					</div>


					<div class="col-6 col-sm-1 mt-3 mt-sm-0">
						<img src="@switch($attendant->pivot->participate)
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

					<div class="col-6 col-sm-4 mt-3 mt-sm-0">
						<form action="/meeting/remove-participant", method="POST">
							@csrf
							<div style="display: none;">
								<input type="number" value="{{$meeting->id}}" name="meeting_id">
								<input type="number" value="{{$attendant->id}}" name="user_id">
							</div>

							<button type="submit" class="btn btn-danger">Remove from meeting</button>
						</form>

					</div>

				</div>
				@endforeach

			</div>


			<!-- The comment side -->
			<div class="col-12 col-lg-6 ps-1 ps-lg-5">
				<div class="row border-bottom">
					<h2>Comments: @if(session()->has('created')) <span class="bg-success">Comment added successfully!</span>  @endif</h2>
				</div>

				@if ($meeting->comments()->count() == 0)
					<h3>There are no comments yet!</h3>
				@endif

				<div class="overflow-auto h-50 mt-1 pe-1">
					@foreach ($meeting->comments->reverse() as $comment)
				<div class="comment mt-3 p-3">
					<div class="row">
						<h5><img src="{{ $comment->author->picture }}" class="img-thumbnail small-pic">{{$comment->author->full_name}}</h5>
						<h6>{{ $comment->created_at }}</h6>
					</div>

					<div class="row">
						<p>{{$comment->comment}}</p>
					</div>
				</div>
				@endforeach
				</div>

				<div class="comment mt-3 p-3">
					<form method="POST" action='/meeting/comment'>
						@csrf
						<div class="row">
							<div style="display: none;">
								<input type="number" name="meeting_id" value="{{$meeting->id}}">
								<input type="number" name="user_id" value="{{Auth::user()->id}}">
							</div>
						</div>
						<div class="row">
							<div class="col-12 col-sm-10">
								<div class="form-floating text-dark">
									<input type="text" class="form-control" id="floatingInput" placeholder="example" name="comment" required>
									<label for="floatingInput">Your message</label>
								</div>
							</div>

							<div class="col-12 col-sm-2 mt-2 mt-sm-1">
								<button type="submit" class="btn btn-primary btn-lg">Submit</button>
							</div>
						</div>
					</form>
				</div>

			</div>

		</div>
	</div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add new participants</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="/meeting/add-participants">
                    @csrf
                <div class="modal-body">
                    <div style="display: none;"> <input type="number" name="meeting_id" value="{{$meeting->id}}"> </div>
                    <label>
                        Start typing the participant's email address:
                        <select id="participant-chooser" multiple="multiple" name="participants[]" style="width: 100%;">
                            @foreach($users as $user)
                                <option value="{{  $user->id }}">{{  $user->full_name }} ({{ $user->email  }})</option>
                            @endforeach
                        </select>
                    </label>

                    <label>
                        Or add a whole team:
                        <select id="team-chooser" multiple="multiple" name="teams[]" style="width: 100%;">
                            @foreach($teams as $team)
                                <option value="{{  $team->id }}">{{  $team->team_name }}</option>
                            @endforeach
                        </select>
                    </label>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success">Send invites</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#participant-chooser').select2({
                dropdownParent: $('#exampleModal'),
                width: 'resolve'
            });

            $('#team-chooser').select2({
                dropdownParent: $('#exampleModal'),
                width: 'resolve'
            });

        });
    </script>

@endsection
