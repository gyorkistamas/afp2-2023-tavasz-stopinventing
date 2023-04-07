@extends('main_template')

@section('title')
    <title>My meetings</title>
@endsection

@section('content')

    <div class="container text-white mt-5">

        <a class="btn btn-success mb-2" href="/my-meetings/{{ ((new DateTime($date))->modify('-7 day'))->format('Y-m-d') }}"> <-- Last week</a>

        <a class="btn btn-success mb-2" href="/my-meetings/{{ ((new DateTime($date))->modify('+7 day'))->format('Y-m-d') }}">Next week --> </a>

        <a class="btn btn-danger mb-2 float-end"><h3>My invites</h3></a>

        <table class="table table-dark table-striped table-hover">
            <thead>
                <tr>
                    <th>
                        <h2>#</h2>
                    </th>
                    <th>
                        <h2>Monday</h2>
                        <br>
                        <h6>{{((new DateTime($date)))->format('Y.m.d')}}</h6>
                    </th>

                    <th>
                        <h2>Tuesday</h2>
                        <br>
                        <h6>{{ ((new DateTime($date))->modify('+1 day'))->format('Y.m.d') }}</h6>
                    </th>

                    <th>
                        <h2>Wednesday</h2>
                        <br>
                        <h6>{{ ((new DateTime($date))->modify('+2 day'))->format('Y.m.d')  }}</h6>
                    </th>

                    <th>
                        <h2>Thursday</h2>
                        <br>
                        <h6>{{ ((new DateTime($date))->modify('+3 day'))->format('Y.m.d') }}</h6>
                    </th>

                    <th>
                        <h2>Friday</h2>
                        <br>
                        <h6>{{ ((new DateTime($date))->modify('+4 day'))->format('Y.m.d') }}</h6>
                    </th>

                    <th>
                        <h2>Saturday</h2>
                        <br>
                        <h6>{{ ((new DateTime($date))->modify('+5 day'))->format('Y.m.d') }}</h6>
                    </th>

                    <th>
                        <h2>Sunday</h2>
                        <br>
                        <h6>{{ ((new DateTime($date))->modify('+6 day'))->format('Y.m.d') }}</h6>
                    </th>

                </tr>
            </thead>

            <tbody>
                @for($i = 1; $i <= $rowNum; $i++)
                    <tr>
                        <td><h2>{{ $i }}.</h2></td>

                        @if(array_key_exists($i - 1, $meetings[0]))
                            <td>
                               <div class="card text-bg-light text-dark">
                                   <div class="card-body">
                                     <h5 class="card-title">{{ $meetings[0][$i - 1]->name }}</h5>
                                     <hr>
                                     <h6 class="card-subtitle mb-2 text-body-secondary">Organiser: {{ $meetings[0][$i - 1]->scrumMaster->full_name }}</h6>
                                     <hr>
                                     <h6 class="card-subtitle mb-2 text-body-secondary">Start: {{ date('H:i', strtotime($meetings[0][$i - 1]->start_time)) }}</h6>
                                     <h6 class="card-subtitle mb-2 text-body-secondary">End: {{ date('H:i', strtotime($meetings[0][$i - 1]->end_time)) }}</h6>
                                     <hr>
                                     <a href="/meeting/show/{{$meetings[0][$i - 1]->id}}" class="card-link">View meeting</a>
                                   </div>
                               </div>
                            </td>
                        @else
                            <td><h1> - </h1></td>
                        @endif

                        @if(array_key_exists($i - 1, $meetings[1]))
                            <td>
                                <div class="card text-bg-light text-dark">
                                    <div class="card-body">
                                      <h5 class="card-title">{{ $meetings[1][$i - 1]->name }}</h5>
                                      <hr>
                                      <h6 class="card-subtitle mb-2 text-body-secondary">Organiser: {{ $meetings[1][$i - 1]->scrumMaster->full_name }}</h6>
                                      <hr>
                                      <h6 class="card-subtitle mb-2 text-body-secondary">Start: {{ date('H:i', strtotime($meetings[1][$i - 1]->start_time)) }}</h6>
                                      <h6 class="card-subtitle mb-2 text-body-secondary">End: {{ date('H:i', strtotime($meetings[1][$i - 1]->end_time)) }}</h6>
                                      <hr>
                                      <a href="/meeting/show/{{$meetings[1][$i - 1]->id}}" class="card-link">View meeting</a>
                                    </div>
                                </div>
                            </td>
                        @else
                            <td><h1> - </h1></td>
                        @endif

                        @if(array_key_exists($i - 1, $meetings[2]))
                            <td>
                                <div class="card text-bg-light text-dark">
                                    <div class="card-body">
                                      <h5 class="card-title">{{ $meetings[2][$i - 1]->name }}</h5>
                                      <hr>
                                      <h6 class="card-subtitle mb-2 text-body-secondary">Organiser: {{ $meetings[2][$i - 1]->scrumMaster->full_name }}</h6>
                                      <hr>
                                      <h6 class="card-subtitle mb-2 text-body-secondary">Start: {{ date('H:i', strtotime($meetings[2][$i - 1]->start_time)) }}</h6>
                                      <h6 class="card-subtitle mb-2 text-body-secondary">End: {{ date('H:i', strtotime($meetings[2][$i - 1]->end_time)) }}</h6>
                                      <hr>
                                      <a href="/meeting/show/{{$meetings[2][$i - 1]->id}}" class="card-link">View meeting</a>
                                    </div>
                                </div>
                            </td>
                        @else
                            <td><h1> - </h1></td>
                        @endif

                        @if(array_key_exists($i - 1, $meetings[3]))
                            <td>
                                <div class="card text-bg-light text-dark">
                                    <div class="card-body">
                                      <h5 class="card-title">{{ $meetings[3][$i - 1]->name }}</h5>
                                      <hr>
                                      <h6 class="card-subtitle mb-2 text-body-secondary">Organiser: {{ $meetings[3][$i - 1]->scrumMaster->full_name }}</h6>
                                      <hr>
                                      <h6 class="card-subtitle mb-2 text-body-secondary">Start: {{ date('H:i', strtotime($meetings[3][$i - 1]->start_time)) }}</h6>
                                      <h6 class="card-subtitle mb-2 text-body-secondary">End: {{ date('H:i', strtotime($meetings[3][$i - 1]->end_time)) }}</h6>
                                      <hr>
                                      <a href="/meeting/show/{{$meetings[3][$i - 1]->id}}" class="card-link">View meeting</a>
                                    </div>
                                </div>
                            </td>
                        @else
                            <td><h1> - </h1></td>
                        @endif

                        @if(array_key_exists($i - 1, $meetings[4]))
                            <td>
                                <div class="card text-bg-light text-dark">
                                    <div class="card-body">
                                      <h5 class="card-title">{{ $meetings[4][$i - 1]->name }}</h5>
                                      <hr>
                                      <h6 class="card-subtitle mb-2 text-body-secondary">Organiser: {{ $meetings[4][$i - 1]->scrumMaster->full_name }}</h6>
                                      <hr>
                                      <h6 class="card-subtitle mb-2 text-body-secondary">Start: {{ date('H:i', strtotime($meetings[4][$i - 1]->start_time)) }}</h6>
                                      <h6 class="card-subtitle mb-2 text-body-secondary">End: {{ date('H:i', strtotime($meetings[4][$i - 1]->end_time)) }}</h6>
                                      <hr>
                                      <a href="/meeting/show/{{$meetings[4][$i - 1]->id}}" class="card-link">View meeting</a>
                                    </div>
                                </div>
                            </td>
                        @else
                            <td><h1> - </h1></td>
                        @endif

                        @if(array_key_exists($i - 1, $meetings[5]))
                            <td>
                                <div class="card text-bg-light text-dark">
                                    <div class="card-body">
                                      <h5 class="card-title">{{ $meetings[5][$i - 1]->name }}</h5>
                                      <hr>
                                      <h6 class="card-subtitle mb-2 text-body-secondary">Organiser: {{ $meetings[5][$i - 1]->scrumMaster->full_name }}</h6>
                                      <hr>
                                      <h6 class="card-subtitle mb-2 text-body-secondary">Start: {{ date('H:i', strtotime($meetings[5][$i - 1]->start_time)) }}</h6>
                                      <h6 class="card-subtitle mb-2 text-body-secondary">End: {{ date('H:i', strtotime($meetings[5][$i - 1]->end_time)) }}</h6>
                                      <hr>
                                      <a href="/meeting/show/{{$meetings[5][$i - 1]->id}}" class="card-link">View meeting</a>
                                    </div>
                                </div>
                            </td>
                        @else
                            <td><h1> - </h1></td>
                        @endif

                        @if(array_key_exists($i - 1, $meetings[6]))
                            <td>
                                <div class="card text-bg-light text-dark">
                                    <div class="card-body">
                                      <h5 class="card-title">{{ $meetings[6][$i - 1]->name }}</h5>
                                      <hr>
                                      <h6 class="card-subtitle mb-2 text-body-secondary">Organiser: {{ $meetings[6][$i - 1]->scrumMaster->full_name }}</h6>
                                      <hr>
                                      <h6 class="card-subtitle mb-2 text-body-secondary">Start: {{ date('H:i', strtotime($meetings[6][$i - 1]->start_time)) }}</h6>
                                      <h6 class="card-subtitle mb-2 text-body-secondary">End: {{ date('H:i', strtotime($meetings[6][$i - 1]->end_time)) }}</h6>
                                      <hr>
                                      <a href="/meeting/show/{{$meetings[6][$i - 1]->id}}" class="card-link">View meeting</a>
                                    </div>
                                </div>
                            </td>
                        @else
                            <td><h1> - </h1></td>
                        @endif

                    </tr>
                @endfor
            </tbody>

        </table>

    </div>

@endsection
