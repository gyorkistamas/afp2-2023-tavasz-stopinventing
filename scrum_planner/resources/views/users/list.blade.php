@extends('main_template')

@section('title')
<title>Users List</title>
@endsection


@section('content')


<div class="container p-5 text-white mb-5">
    <div class="row justify-content-center gap-3">
        @foreach ($Users as $user)
        <div class="card bg-dark" style="max-width: 20rem;">

            <div class="card-header">
                <span class="badge bg-primary">Status</span>
            </div>

            <img class="card-img-top" src="{{ $user->picture }}" alt="" style="max-width: 20rem">

            <div class="card-body">

                <h5 class="card-title">
                    {{ $user->full_name }}
                </h5>

                <p class="card-text font-weight-bold">
                    {{ $user->email }}
                </p>

                <p class="card-text font-weight-bold">
                    <span class="badge bg-secondary">
                        @if ($user->privilage == 0)
                            Simple User
                        @elseif ($user->privilage == 1)
                            Scrum Master
                        @else
                            Admin
                        @endif
                    </span>
                </p>

                <p class="card-text font-weight-bold">
                    <span class="badge bg-info">{{ $user->created_at }}</span>
                </p>

                <div class="card-footer d-flex justify-content-between">
                    <button class="btn btn-warning">Suspend</button>
                    <button class="btn btn-success">Modify</button>
                </div>

            </div>
        </div>
        @endforeach
    </div>


    <div class="row p-5">
        <div class="col-12">
            {{ $Users->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>

@endsection


