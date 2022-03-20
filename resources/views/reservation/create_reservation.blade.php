@extends('layouts.default')
@section('title', 'Create reservation')
@section('script')
    <script src="{{asset('js/myScript.js')}}"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
@endsection
@section('content')
    <div class="main-content">
        <div class="form">
            <form action="{{route('create_reservation')}}" method="post" class="form-floating">
                {{ csrf_field() }}
                @if (session('error'))
                    <div class=" element alert alert-danger">{{ session('error') }}</div>
                @endif

                <div class="element form-floating ">
                    @if($rooms)
                        <select name="room_name" id="roomsel" class="form-select" aria-label="Default select example">
                            @foreach($rooms as $room)
                                <option value="{{$room->id}}">{{$room->name}}</option>
                            @endforeach
                        </select>
                        <label for="roomsel">Room</label>
                    @endif
                </div>
                <div class="element form-floating">
                        <input type="text" name="date" id="date" class="datepick form-control " value="" required autocomplete="off">
                    <label for="date">Date</label>

                </div>
                <div class="element form-floating ">
                    <input type="text" name="name_client" value="" id="name_client"
                           class="form-control" required>
                    <label for="name_client">Nach- und Vorname</label>

                </div>
                <div class="element form-floating">
                    <input type="email" name="email" value="" id="email"
                           class="form-control" required>
                    <label for="email">Email</label>
                </div>
                <div class="element form-floating">
                    <input type="tel" name="phone" value="" id="phone"
                           class="form-control" required minlength="14">
                    <label for="phone">Telefonummer</label>

                </div>
                <div class="btns">
                        <button class="btn  btn-primary">Reserve</button>
                </div>
            </form>
        </div>
    </div>
@endsection
