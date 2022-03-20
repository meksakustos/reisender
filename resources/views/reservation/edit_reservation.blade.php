@extends('layouts.default')
@section('title', 'view-reservation')
@section('script')
    <script src="{{asset('js/myScript.js')}}"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
@endsection
@section('content')
    <div class="main-content">
        <h1>Your personal reservation</h1>
        @if($out_of_service)
            <h3>Reservation is expired.</h3>
        <div class="table  table-warning table-bordered">
            <table>
                <thead class="table-success">
                <tr>
                    <td>Zimmer</td>
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
        </div>
        @else
            <div class="form">
                <form action="{{route('update_reservation', $reservation->uuid)}}" method="post" class="form-floating">
                    {{ csrf_field() }}
                    <div class="element form-floating">
                        @if($rooms)
                            <select name="room_name"  id="roomsel" class="form-select" aria-label="Default select example">
                                @foreach($rooms as $room)
                                    <option value="{{$room->id}}"
                                            @if ($room->id == $reservation->room_id)
                                            selected="selected"
                                        @endif
                                    >{{$room->name}}</option>
                                @endforeach
                            </select>
                            <label for="roomsel">Zimmer</label>

                        @endif
                    </div>
                    <div class="element form-floating">
                        <input type="text" name="date" id="date" class="datepick form-control " value="{{Carbon\Carbon::parse($reservation->date_start)->format('d.m.Y')}} -{{Carbon\Carbon::parse($reservation->date_end)->format('d.m.Y')}} " required autocomplete="off">
                        <label for="date">Date</label>

                    </div>
                    <div class="element form-floating">
                        <input type="text" name="name_client" value="{{$reservation->name}}" id="name_client"
                               class="form-control" required>
                        <label for="name_client">Nach- und Vorname</label>

                    </div>
                    <div class="element form-floating">
                        <input type="email" name="email" value="{{$reservation->email}}" id="email"
                               class="form-control" required>
                        <label for="email">Email</label>

                    </div>
                    <div class="element form-floating">
                        <input type="tel" name="phone" value="{{$reservation->phone}}" id="phone"
                               class="form-control" required minlength="14">
                        <label for="phone">Telefonummer</label>
                    </div>
                    <div class="btns">
                        <button class="btn  btn-success">Update</button>
                    </div>
                </form>
                <form action="{{route('delete_reservation', $reservation->uuid)}}" method="post" class="form-floating del-form">
                    {{ csrf_field() }}
                    <div class="btns">
                        <button class="btn btn-danger">Delete Reservation</button>
                    </div>
                </form>
            </div>
    </div>
    @endif
@endsection
