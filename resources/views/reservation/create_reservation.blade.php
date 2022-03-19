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
                <div class=" element alert alert-danger">
                @if (session('error'))
                   {{ session('error') }}
                @endif
                </div>
                <div class="element">
                    <label for="roomsel">Room</label>
                    @if($rooms)
                        <select name="room_name" id="roomsel">
                            @foreach($rooms as $room)
                                <option value="{{$room->id}}">{{$room->name}}</option>
                            @endforeach
                        </select>
                    @endif
                </div>
                <div class="element">
                        <label for="date_start">From</label>
                        <input type="text" name="date_start" id="date_start" class="datepick" required autocomplete="off">
                        <label for="date_end">To</label>
                        <input type="text" name="date_end" id="date_end" class="datepick" required autocomplete="off">
                </div>
                <div class="element">
                    <label for="name_client">Nach- und Vorname</label>
                    <input type="text" name="name_client" value="" id="name_client"
                           class="" required>
                </div>
                <div class="element">
                    <label for="email">Email</label>
                    <input type="email" name="email" value="" id="email"
                           class="" required>
                </div>
                <div class="element">
                    <label for="phone">Telefonummer</label>
                    <input type="tel" name="phone" value="" id="phone"
                           class="" required minlength="14">
                </div>
                <div class="btns">
                        <button class="btn">Book</button>
                </div>
            </form>
        </div>
    </div>
@endsection
