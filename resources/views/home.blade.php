@extends('layouts.default')
@section('title', 'home')
@section('content')
    <div class="main-content">
        <h1>Startseite</h1>
        <div class="home-content">
            <p>
                Herzlich willkommen!
                Hier können Sie ein Hotelzimmer buchen.
                Wir arbeiten seit 1946 und zeigen uns perfekt. Die meisten unserer Kunden sind zufrieden und kommen wieder zu uns.
            </p>
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{asset('files/home_carousel/maldiv.jpg')}}" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{asset('files/home_carousel/palma.jpg')}}" class="d-block w-100" alt="...">
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
