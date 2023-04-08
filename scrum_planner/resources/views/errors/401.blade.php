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
          <h5 class="card-text">Please, report this problem to the Administrator!</h5>
          <button onclick="window.location.reload();" class="btn btn-danger">Or try reloading this page</button>
        </div>
    </div>

</div>


@endsection