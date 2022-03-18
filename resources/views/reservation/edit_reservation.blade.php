@extends('layouts.default')
@section('title', 'view-reservation')
@section('script')
{{--    <script src="{{asset('js/myScript.js')}}"></script>--}}
@endsection
@section('content')
    <div class="main-content">
        <h1>Your personal reservation</h1>
            <div class = "table">
                <table>
                    <thead>
                    <tr>
                        <td>Room</td>
                        <td>Booker's name</td>
                        <td>Period</td>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{$room->name}}</td>
                            <td>{{$reservation->name}}</td>
                            <td>from {{Carbon\Carbon::parse($reservation->date_start)->format('d-m-Y')}}  to {{Carbon\Carbon::parse($reservation->date_end)->format('d-m-Y')}}</td>
                            <td><button name="del">Delete</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
    </div>
@endsection
