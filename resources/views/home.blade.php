@extends('layouts.default')
@section('title', 'home')
@section('content')
    <h1>Startseite</h1>
    <a href="/">Home</a>
    <a href="{{route('list_room')}}">Booking</a>
@endsection
