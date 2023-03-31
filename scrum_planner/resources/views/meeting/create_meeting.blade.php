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
    <div class="row mt-3">
        <div class="col-12 col-lg-6 d-flex justify-content-center justify-content-lg-start border-bottom">
            <h1>Meeting Ccreation</h1>
        </div>
    </div>

    <div class="row mt-3">
        <form action={{ url('/team/create') }} method="POST">
            @csrf
        <div class="col-12 col-lg-6">
            <input
                type="text"
                name="meeting_name"
                id="meetingName"
                class="form-control form-control-lg"
                placeholder="Title of the meeting"
                required
            >
        </div>

        <div class="col-12 col-lg-6">
            
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $('?').select2({
            width: 'resolve'
        });
    });
    $(document).ready(function() {
        $('?').select2({
            width: 'resolve'
        });
    });
</script>

@endsection