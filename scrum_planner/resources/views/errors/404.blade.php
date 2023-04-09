@extends('main_template')

@section('title')
    <title>Not Found</title>
@endsection

@section('content')

<div class="container text-white p-5 mb-5">

    <div class="card bg-dark text-center">
        <div class="card-header fw-bold">
          HTTP : 404 Page Not Found!
        </div>
        <div class="card-body">
          <h3 class="card-title">Oops! The page, you were looking for, was not found!</h3>
          <h5 class="card-text">Please, consider stepping back!</h5>
          <button onclick="history.back();" class="btn btn-warning">Get Back!</button>
        </div>
    </div>

</div>

@endsection
