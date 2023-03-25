@extends('main_template')

@section('title')
<title>Users List</title>
@endsection


@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="main-box clearfix">
                <div class="table-responsive">
                    <table class="table text-white">
                        <thead>
                            <tr>
                                <th class="text-center"><span>User</span></th>
                                <th class="text-center"><span>Title</span></th>
                                <th class="text-center"><span>Created</span></th>
                                <th class="text-center"><span>Status</span></th>
                                <th class="text-center"><span>Email</span></th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($Users as $user)
                        <tr>
                            <td>

                                <img src={{ $user->picture }} width="50px" height="50px" alt="">
                                <a href="#">{{ $user->full_name }}</a>

                            </td>
                            <td class="text-center">
                                @if ( $user->privilage == 0)
                                    <span>Simple User</span>
                                @elseif ( $user->privilage == 1 )
                                    <span>Scrum Master</span>
                                @else
                                    <span>Admin</span>
                                @endif
                            </td>
                            <td class="text-center">
                                {{ $user->created_at }}
                            </td>
                            <td class="text-center">
                                <span class="label label-default">Active</span>
                            </td>
                            <td class="text-center">
                                <a href="#">{{$user->email}}</a>
                            </td>
                            <td style="width: 20%;">
                                <a href="#" class="table-link">
                                    <button class="btn btn-primary">Show</button>
                                </a>
                                <a href="#" class="table-link">
                                    <button class="btn btn-success">Edit</button>
                                </a>
                                <a href="#" class="table-link danger">
                                    <button class="btn btn-warning">Suspend</button>
                                </a>
                            </td>
                        </tr>
                        @endforeach

                        </tbody>
                    </table>

                    <div class="row">
                        <div class="col-12">
                            {{ $Users->links('pagination::bootstrap-4') }}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection


