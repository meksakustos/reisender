@extends('layouts.default')
@section('title', 'Create reservation')
@section('script')
    <script src="{{asset('js/myScript.js')}}"></script>
@endsection
@section('content')
    <div class="main-content">
        <div class="form">
            <form action="{{route('create_reservation')}}" method="post">
                {{ csrf_field() }}
                <div class="element">
                    @if($rooms)
                        <select name="room_name">
                            @foreach($rooms as $room)
                                <option value="{{$room->id}}">{{$room->name}}</option>
                            @endforeach
                        </select>
                    @endif
                </div>
                <div class="element">
                    <p>DATE booking</p>
                    <label for="date_start">From</label>
                    <input type="text" name="date_start" id="date_start" class="datepick">
                    <label for="date_end">To</label>
                    <input type="text" name="date_end" id="date_end" class="datepick">
                </div>
                <div class="element">
                    <label for="name_client">Nach- und Vorname</label>
                    <input type="text" name="name_client" value="" id="name_client"
                           class="">
                </div>
                <div class="element">
                    <label for="email">Email</label>
                    <input type="email" name="email" value="" id="email"
                           class="">
                </div>
                <div class="element">
                    <label for="phone">Telefonummer</label>
                    <input type="tel" name="phone" value="" id="phone"
                           class="">
                </div>
                <div class="btns">
                        <button class="btn">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
