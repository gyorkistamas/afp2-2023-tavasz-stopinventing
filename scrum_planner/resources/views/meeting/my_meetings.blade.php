@extends('main_template')

@section('title')
    <title>My meetings</title>
@endsection

@section('content')

    <div class="container text-white mt-5">

        <table class="table table-dark table-striped table-hover text-white">
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
                            <td><a href="/meeting/show/{{$meetings[0][$i - 1]->id}}">{{  $meetings[0][$i - 1]->name }}</a></td>
                        @else
                            <td><h1> - </h1></td>
                        @endif

                        @if(array_key_exists($i - 1, $meetings[1]))
                            <td>{{  $meetings[1][$i - 1]->name }}</td>
                        @else
                            <td><h1> - </h1></td>
                        @endif

                        @if(array_key_exists($i - 1, $meetings[2]))
                            <td>{{  $meetings[2][$i - 1]->name }}</td>
                        @else
                            <td><h1> - </h1></td>
                        @endif

                        @if(array_key_exists($i - 1, $meetings[3]))
                            <td>{{  $meetings[3][$i - 1]->name }}</td>
                        @else
                            <td><h1> - </h1></td>
                        @endif

                        @if(array_key_exists($i - 1, $meetings[4]))
                            <td>{{  $meetings[4][$i - 1]->name }}</td>
                        @else
                            <td><h1> - </h1></td>
                        @endif

                        @if(array_key_exists($i - 1, $meetings[5]))
                            <td>{{  $meetings[5][$i - 1]->name }}</td>
                        @else
                            <td><h1> - </h1></td>
                        @endif

                        @if(array_key_exists($i - 1, $meetings[6]))
                            <td>{{  $meetings[6][$i - 1]->name }}</td>
                        @else
                            <td><h1> - </h1></td>
                        @endif

                    </tr>
                @endfor
            </tbody>

        </table>

    </div>

@endsection
