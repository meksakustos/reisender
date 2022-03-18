@extends('layouts.default')
@section('title', 'view-reservation')
@section('script')
    <script src="{{asset('js/myScript.js')}}"></script>
@endsection
@section('content')
    <div class="main-content">
        <h1>Your personal reservation</h1>
        @if($out_of_service)
            <h3>Reservation is expired.</h3>
            <table>
                <thead>
                <tr>
                    <td>Room</td>
                    <td>Name</td>
                    <td>Period</td>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>{{$current_room->name}}</td>
                    <td>{{$reservation->name}}</td>
                    <td>from {{Carbon\Carbon::parse($reservation->date_start)->format('d.m.Y')}}  to {{Carbon\Carbon::parse($reservation->date_end)->format('d.m.Y')}}</td>
                </tr>
                </tbody>
            </table>
        @else
            <form action="{{route('update_reservation', $reservation->uuid)}}" method="post">
                {{ csrf_field() }}
                <div class="element">
                    @if($rooms)
                        <select name="room_name">
                            @foreach($rooms as $room)
                                <option value="{{$room->id}}"
                                        @if ($room->id == $reservation->room_id)
                                        selected="selected"
                                    @endif
                                >{{$room->name}}</option>
                            @endforeach
                        </select>
                    @endif
                </div>
                <div class="element">
                    <p>DATE booking</p>
                    <label for="date_start">From</label>
                    <input type="text" name="date_start" id="date_start" value="{{Carbon\Carbon::parse($reservation->date_start)->format('d.m.Y')}}" class="datepick">
                    <label for="date_end">To</label>
                    <input type="text" name="date_end" id="date_end" value="{{Carbon\Carbon::parse($reservation->date_end)->format('d.m.Y')}}" class="datepick">
                </div>
                <div class="element">
                    <label for="name_client">Nach- und Vorname</label>
                    <input type="text" name="name_client" value="{{$reservation->name}}" id="name_client"
                           class="">
                </div>
                <div class="element">
                    <label for="email">Email</label>
                    <input type="email" name="email" value="{{$reservation->email}}" id="email"
                           class="">
                </div>
                <div class="element">
                    <label for="phone">Telefonummer</label>
                    <input type="tel" name="phone" value="{{$reservation->phone}}" id="phone"
                           class="">
                </div>
                <div class="btns">
                    <button class="btn">Update</button>
                </div>
            </form>
            <form action="{{route('delete_reservation', $reservation->uuid)}}" method="post">
                {{ csrf_field() }}
                <div class="btns">
                    <button class="btn">Delete Reservation</button>
                </div>
            </form>
    </div>
    @endif
@endsection
