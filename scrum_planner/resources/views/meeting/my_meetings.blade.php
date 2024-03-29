@extends('main_template')

@section('title')
    <title>My meetings</title>
@endsection

@section('content')

    <div class="container text-white mt-5">

        <div class="row">

            <div class="col-12 col-lg-2 mb-3">
                <a class="btn btn-success w-100" href="/my-meetings/{{ ((new DateTime($date))->modify('-7 day'))->format('Y-m-d') }}"> <-- Last week</a>
            </div>

            <div class="col-12 col-lg-2 mb-3">
                <a class="btn btn-success w-100" href="/my-meetings/{{ ((new DateTime($date))->modify('+7 day'))->format('Y-m-d') }}">Next week --> </a>
            </div>

            <div class="col-0 col-lg-6"></div>

            <div class="col-12 col-lg-2 d-flex justify-content-center mb-3">
                <a class="btn btn-primary float-end position-relative" href="/my-invites"><h3>My invites</h3>@if($inviteNumber > 0) <span class="position-absolute top-0 start-100 translate-middle badge rounded-circle bg-danger d-flex justify-content-center align-items-center" style="font-size: 1.3rem; width: 39px; height: 39px;">@if($inviteNumber <= 9) {{$inviteNumber}} @else 9+ @endif</span> @endif</a>
            </div>

        </div>

            <table class="table table-dark table-striped table-hover p-5 rounded rounded-3 overflow-hidden d-none d-lg-table">
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
                                <td></td>
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
                                <td></td>
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
                                <td></td>
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
                                <td></td>
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
                                <td></td>
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
                                <td></td>
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
                                <td></td>
                            @endif
    
                        </tr>
                    @endfor
                </tbody>
    
            </table>


            <div class="small d-block d-lg-none">
                <div class="row">
                    <div class="col-12 bg-dark mb-2 rounded rounded-2 text-center">
                        <h2>Monday</h2>
                        <br>
                        <h6>{{((new DateTime($date)))->format('Y.m.d')}}</h6>
                    </div>
                    @for ($i = 0; $i < $rowNum; $i++)
                        @if(array_key_exists($i, $meetings[0]))
                                <div class="card text-bg-light text-dark col-12 mb-3">
                                       <div class="card-body">
                                         <h5 class="card-title">{{ $meetings[0][$i]->name }}</h5>
                                         <hr>
                                         <h6 class="card-subtitle mb-2 text-body-secondary">Organiser: {{ $meetings[0][$i]->scrumMaster->full_name }}</h6>
                                         <hr>
                                         <h6 class="card-subtitle mb-2 text-body-secondary">Start: {{ date('H:i', strtotime($meetings[0][$i]->start_time)) }}</h6>
                                         <h6 class="card-subtitle mb-2 text-body-secondary">End: {{ date('H:i', strtotime($meetings[0][$i]->end_time)) }}</h6>
                                         <hr>
                                         <a href="/meeting/show/{{$meetings[0][$i]->id}}" class="card-link">View meeting</a>
                                       </div>                               
                                </div>
                        @endif  
                    @endfor


                    <div class="col-12 bg-dark mb-2 rounded rounded-2 text-center">
                        <h2>Tuesday</h2>
                        <br>
                        <h6>{{ ((new DateTime($date))->modify('+1 day'))->format('Y.m.d') }}</h6>
                    </div>
                    @for ($i = 0; $i < $rowNum; $i++)
                        @if(array_key_exists($i, $meetings[1]))
                                <div class="card text-bg-light text-dark col-12 mb-3">
                                       <div class="card-body">
                                         <h5 class="card-title">{{ $meetings[1][$i]->name }}</h5>
                                         <hr>
                                         <h6 class="card-subtitle mb-2 text-body-secondary">Organiser: {{ $meetings[1][$i]->scrumMaster->full_name }}</h6>
                                         <hr>
                                         <h6 class="card-subtitle mb-2 text-body-secondary">Start: {{ date('H:i', strtotime($meetings[1][$i]->start_time)) }}</h6>
                                         <h6 class="card-subtitle mb-2 text-body-secondary">End: {{ date('H:i', strtotime($meetings[1][$i]->end_time)) }}</h6>
                                         <hr>
                                         <a href="/meeting/show/{{$meetings[1][$i]->id}}" class="card-link">View meeting</a>
                                       </div>                               
                                </div>
                        @endif  
                    @endfor


                    <div class="col-12 bg-dark mb-2 rounded rounded-2 text-center">
                        <h2>Wednesday</h2>
                        <br>
                        <h6>{{ ((new DateTime($date))->modify('+2 day'))->format('Y.m.d') }}</h6>
                    </div>
                    @for ($i = 0; $i < $rowNum; $i++)
                        @if(array_key_exists($i, $meetings[2]))
                                <div class="card text-bg-light text-dark col-12 mb-3">
                                       <div class="card-body">
                                         <h5 class="card-title">{{ $meetings[2][$i]->name }}</h5>
                                         <hr>
                                         <h6 class="card-subtitle mb-2 text-body-secondary">Organiser: {{ $meetings[2][$i]->scrumMaster->full_name }}</h6>
                                         <hr>
                                         <h6 class="card-subtitle mb-2 text-body-secondary">Start: {{ date('H:i', strtotime($meetings[2][$i]->start_time)) }}</h6>
                                         <h6 class="card-subtitle mb-2 text-body-secondary">End: {{ date('H:i', strtotime($meetings[2][$i]->end_time)) }}</h6>
                                         <hr>
                                         <a href="/meeting/show/{{$meetings[2][$i]->id}}" class="card-link">View meeting</a>
                                       </div>                               
                                </div>
                        @endif  
                    @endfor

                    <div class="col-12 bg-dark mb-2 rounded rounded-2 text-center">
                        <h2>Thursday</h2>
                        <br>
                        <h6>{{ ((new DateTime($date))->modify('+3 day'))->format('Y.m.d') }}</h6>
                    </div>
                    @for ($i = 0; $i < $rowNum; $i++)
                        @if(array_key_exists($i, $meetings[3]))
                                <div class="card text-bg-light text-dark col-12 mb-3">
                                       <div class="card-body">
                                         <h5 class="card-title">{{ $meetings[3][$i]->name }}</h5>
                                         <hr>
                                         <h6 class="card-subtitle mb-2 text-body-secondary">Organiser: {{ $meetings[3][$i]->scrumMaster->full_name }}</h6>
                                         <hr>
                                         <h6 class="card-subtitle mb-2 text-body-secondary">Start: {{ date('H:i', strtotime($meetings[3][$i]->start_time)) }}</h6>
                                         <h6 class="card-subtitle mb-2 text-body-secondary">End: {{ date('H:i', strtotime($meetings[3][$i]->end_time)) }}</h6>
                                         <hr>
                                         <a href="/meeting/show/{{$meetings[3][$i]->id}}" class="card-link">View meeting</a>
                                       </div>                               
                                </div>
                        @endif  
                    @endfor


                    <div class="col-12 bg-dark mb-2 rounded rounded-2 text-center">
                        <h2>Friday</h2>
                        <br>
                        <h6>{{ ((new DateTime($date))->modify('+4 day'))->format('Y.m.d') }}</h6>
                    </div>
                    @for ($i = 0; $i < $rowNum; $i++)
                        @if(array_key_exists($i, $meetings[4]))
                                <div class="card text-bg-light text-dark col-12 mb-3">
                                       <div class="card-body">
                                         <h5 class="card-title">{{ $meetings[4][$i]->name }}</h5>
                                         <hr>
                                         <h6 class="card-subtitle mb-2 text-body-secondary">Organiser: {{ $meetings[4][$i]->scrumMaster->full_name }}</h6>
                                         <hr>
                                         <h6 class="card-subtitle mb-2 text-body-secondary">Start: {{ date('H:i', strtotime($meetings[4][$i]->start_time)) }}</h6>
                                         <h6 class="card-subtitle mb-2 text-body-secondary">End: {{ date('H:i', strtotime($meetings[4][$i]->end_time)) }}</h6>
                                         <hr>
                                         <a href="/meeting/show/{{$meetings[4][$i]->id}}" class="card-link">View meeting</a>
                                       </div>                               
                                </div>
                        @endif  
                    @endfor


                    <div class="col-12 bg-dark mb-2 rounded rounded-2 text-center">
                        <h2>Saturday</h2>
                        <br>
                        <h6>{{ ((new DateTime($date))->modify('+5 day'))->format('Y.m.d') }}</h6>
                    </div>
                    @for ($i = 0; $i < $rowNum; $i++)
                        @if(array_key_exists($i, $meetings[5]))
                                <div class="card text-bg-light text-dark col-12 mb-3">
                                       <div class="card-body">
                                         <h5 class="card-title">{{ $meetings[5][$i]->name }}</h5>
                                         <hr>
                                         <h6 class="card-subtitle mb-2 text-body-secondary">Organiser: {{ $meetings[5][$i]->scrumMaster->full_name }}</h6>
                                         <hr>
                                         <h6 class="card-subtitle mb-2 text-body-secondary">Start: {{ date('H:i', strtotime($meetings[5][$i]->start_time)) }}</h6>
                                         <h6 class="card-subtitle mb-2 text-body-secondary">End: {{ date('H:i', strtotime($meetings[5][$i]->end_time)) }}</h6>
                                         <hr>
                                         <a href="/meeting/show/{{$meetings[5][$i]->id}}" class="card-link">View meeting</a>
                                       </div>                               
                                </div>
                        @endif  
                    @endfor

                    <div class="col-12 bg-dark mb-2 rounded rounded-2 text-center">
                        <h2>Sunday</h2>
                        <br>
                        <h6>{{ ((new DateTime($date))->modify('+6 day'))->format('Y.m.d') }}</h6>
                    </div>
                    @for ($i = 0; $i < $rowNum; $i++)
                        @if(array_key_exists($i, $meetings[6]))
                                <div class="card text-bg-light text-dark col-12 mb-3">
                                       <div class="card-body">
                                         <h5 class="card-title">{{ $meetings[6][$i]->name }}</h5>
                                         <hr>
                                         <h6 class="card-subtitle mb-2 text-body-secondary">Organiser: {{ $meetings[6][$i]->scrumMaster->full_name }}</h6>
                                         <hr>
                                         <h6 class="card-subtitle mb-2 text-body-secondary">Start: {{ date('H:i', strtotime($meetings[6][$i]->start_time)) }}</h6>
                                         <h6 class="card-subtitle mb-2 text-body-secondary">End: {{ date('H:i', strtotime($meetings[6][$i]->end_time)) }}</h6>
                                         <hr>
                                         <a href="/meeting/show/{{$meetings[6][$i]->id}}" class="card-link">View meeting</a>
                                       </div>                               
                                </div>
                        @endif  
                    @endfor


                </div>
            </div>
    </div>

@endsection
