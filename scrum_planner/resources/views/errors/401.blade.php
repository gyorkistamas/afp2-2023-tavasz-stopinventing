@extends('main_template')

@section('title')
    <title>Unauthorized Page!</title>
@endsection

@section('content')
<div class="container text-white p-5 mb-5">

    <div class="card bg-dark text-center">
        <div class="card-header fw-bold">
          HTTP : 401 Unauthorized Page!
        </div>
        <div class="card-body">
          <h3 class="card-title">Oops! You have no access to visit this site!</h3>
          <h5 class="card-text">Go back to the last visited site!</h5>
          <button onclick="window.history.back(1);" class="btn btn-danger">Go back</button>
        </div>
    </div>

</div>


@endsection