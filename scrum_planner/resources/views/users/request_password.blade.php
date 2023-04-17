@extends('main_template')

@section('title')
    <title>Request for password reset</title>
@endsection

@section('content')

<div class="container text-white p-5 mb-5">

    <div class="card bg-dark text-center">
        <div class="card-header fw-bold">
          Requesting new password!
        </div>

        <div class="card-body p-5">
          <h2 class="card-title">Please, contact the Administrator!</h2>
          <h3 class="card-text">You should visit the Administrator regarding your need of changing your credentials!</h3>
        </div>

        <div class="card-footer">
            <a href="{{ url('/sign-in') }}" class="btn btn-lg btn-primary">Back to Login</a>
        </div>
    </div>

</div>

@endsection
