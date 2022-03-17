@extends('layouts.default')
@section('title', 'view-reservation')
@section('script')
{{--    <script src="{{asset('js/myScript.js')}}"></script>--}}
@endsection
@section('content')
    <div class = "table">
        <table>
            <thead>
            <tr>
                <td>Room</td>
                <td>Booker's name</td>
                <td>Period</td>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Комната 1</td>
                    <td>Хер моржов</td>
                    <td>from 21-03-2022 to 22-03-2022</td>
                </tr>
            </tbody>
@endsection
