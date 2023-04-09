@extends('main_template')

@section('title')
    <title>Edit meeting</title>
@endsection

@section('custom_css')
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endsection

@section('content')

    <div class="container-fluid text-white mt-3">
        <form action="{{url('/meeting/edit/'. $meeting->id)}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-0 col-lg-4"></div>
                <div class="col-12 col-lg-8">
                    <div class="row">
                        <h1>Edit meeting</h1>
                    </div>

                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <input
                                type="text"
                                name="name"
                                id="meetingName"
                                class="form-control form-control-lg"
                                placeholder="Title of the meeting"
                                value="{{$meeting->name}}"
                                required
                            >

                            @error('name')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <label for="date" class="-flex justify-content-start align-items-start pe-3 fw-bold form-label">Starting Date:</label>

                            <input
                                type="datetime-local"
                                class="form-control form-control-lg"
                                name="start_time"
                                id="startTime"
                                value="{{$meeting->start_time}}"
                                required
                            >

                            @error('start_time')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <label for="date" class="-flex justify-content-start align-items-start pe-3 fw-bold form-label">End Date:</label>

                            <input
                                type="datetime-local"
                                class="form-control form-control-lg"
                                name="end_time"
                                id="endTime"
                                value="{{$meeting->end_time}}"
                                required
                            >

                            @error('end_time')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <label class="-flex justify-content-start align-items-start pe-3 fw-bold form-label">Description:</label>

                            <textarea
                                name="description"
                                id="description"
                                class="form-control form-control-lg"
                                placeholder="Description of meeting">{{$meeting->description}}</textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="text-center col-12 col-lg-6">
                            <button type="submit" class="btn btn-outline-light btn-success btn-lg m-2">
                                Edit meeting
                            </button>

                            <a href="/meeting/show/{{$meeting->id}}" class="btn btn-outline-light btn-danger btn-lg m-2">
                                Cancel
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
