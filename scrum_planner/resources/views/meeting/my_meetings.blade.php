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
                    </tr>
                @endfor
            </tbody>

        </table>

    </div>

@endsection
