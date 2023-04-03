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
                    @if ($user->status == 0)
                        <span class="badge bg-primary">Active</span>
                    @else
                        <span class="badge bg-warning text-dark">Suspended</span>
                    @endif
                </div>

                <img class="card-img-top" src="{{ asset($user->picture) }}" alt="" style="max-width: 20rem">

                <div class="card-body">

                    <h5 class="card-title text-center">
                        {{ $user->full_name }}
                    </h5>

                    <p class="card-text font-weight-bold text-center">
                        {{ $user->email }}
                    </p>

                    <p class="card-text font-weight-bold text-center">
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

                    <p class="card-text font-weight-bold text-center">
                        <span class="badge bg-info">{{ $user->created_at }}</span>
                    </p>

                    <div class="card-footer d-flex justify-content-between">
                        @if ($user->status == 0)
                            <a href="/users/change-status/{{ $user->id }}" class="btn btn-warning">Suspend</a>
                        @else
                            <a href="/users/change-status/{{ $user->id }}" class="btn btn-primary">Activate</a>
                        @endif
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#changeRole{{$user->id}}">
                            Modify
                        </button>
                        <form method="GET" action="/users/change-role/{{$user->id}}">
                        <div class="modal fade" id="changeRole{{$user->id}}" tabindex="-1" aria-labelledby="changeRole" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h1 class="modal-title fs-5 text-dark" id="changeRole">Controller</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <select class="form-select" aria-label="Default select example" name="privilage">
                                        <option value=-1>Select the action</option>
                                        <option value=0>User</option>
                                        <option value=1>Scrum master</option>
                                        <option value=2>Admin</option>
                                      </select>
                                    <a href="/users/changepasswd/{{$user->id}}" class="text-warning">Change password for user</a>
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Change Role</button>
                                </div>
                            </div>
                            </div>
                        </div>
                    </form>
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


