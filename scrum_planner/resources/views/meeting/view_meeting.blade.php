@extends('main_template')

@section('title')
	<title>View meeting</title>
@endsection

@section('content')

	<div class="container-fluid text-white mt-3">

		<div class="row">
			<div class="col-12 col-lg-6 d-flex justify-content-center justify-content-lg-start border-bottom">
				<h1>The name of the meeting</h1>
			</div>
			<div class="col-12 col-lg-6 d-flex justify-content-center justify-content-lg-end mt-2 mt-lg-0">
				<div class="">
					<a class="btn btn-warning me-0 me-lg-2">Edit meeting</a>
					<a class="btn btn-success">Add new participant(s)</a>
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
					<div class="col-12 col-sm-9"><h3>2023.03.24, 10:00</h3></div>
					<hr class="d-block d-sm-none">
				</div>

				<div class="row">
					<div class="col-12 col-sm-3"><h3>End time:</h3></div>
					<div class="col-12 col-sm-9"><h3>2023.03.24, 10:30</h3></div>
					<hr class="d-block d-sm-none">
				</div>

				<div class="row">
					<div class="col-12 col-sm-3"><h3>Organiser:</h3></div>
					<div class="col-12 col-sm-9"><h3>Sample Person</h3></div>
					<hr class="d-block d-sm-none">
				</div>

				<div class="row">
					<div class="col-12 col-sm-3"><h3>Place or link:</h3></div>
					<div class="col-12 col-sm-9"><h3>www.zoom.com/room-id-2004534545435</h3></div>
					<hr class="d-block d-sm-none">
				</div>

				<div class="row border-bottom">
					<div class="col-12 col-sm-3"><h3>Description:</h3></div>
					<div class="col-12 col-sm-9"><p class="ms-2">This is a short description to be filled!</p></div>
					<hr class="d-block d-sm-none">
				</div>

				<div class="row mt-2">
					<h2>Participants:</h2>
				</div>

				<div class="row mt-2">
					<h6>(1 not responded, 1 attends, 1 cannot attend)</h6>
				</div>

				<!-- A single participant template -->
				<div class="row mt-2 bordered p-2 ms-1 me-1 mb-2">

					<div class="col-2 col-sm-1">
						<img class="img small-pic" src="{{ url('/profile_pic_sample.png') }}">
					</div>

					<div class="col-10 col-sm-6">
						<h6>Name of the participant</h6>
					</div>

					<div class="col-6 col-sm-1 mt-3 mt-sm-0">
						<img src="{{ url('/no-response.png') }}" class="img-thumbnail response-img">
					</div>

					<div class="col-6 col-sm-4 mt-3 mt-sm-0">
						<form>
							@csrf
							<div style="display: none;">
								<input type="number" value="1" name="meeting-id">
								<input type="number" value="1" name="user-id">
							</div>

							<button type="submit" class="btn btn-danger">Remove from meeting</button>
						</form>

					</div>

				</div>

			</div>


			<!-- The comment side -->
			<div class="col-12 col-lg-6 ps-1 ps-lg-5">
				<div class="row border-bottom">
					<h2>Comments:</h2>
				</div>

				<div class="comment mt-3 p-3">
					<div class="row">
						<h5><img src="{{ url('/profile_pic_sample.png') }}" class="img-thumbnail small-pic">Name here</h5>
					</div>
	
					<div class="row">
						<p>This is the mesage left by the user</p>
					</div>
				</div>

				<div class="comment mt-3 p-3">
					<form>
						@csrf
						<div class="row">
							<div style="display: none;">
								<input type="number" name="meeting_id" value="1">
								<input type="number" name="user_id" value="1">
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

@endsection