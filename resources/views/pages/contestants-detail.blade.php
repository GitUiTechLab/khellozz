@extends('layouts.main-app')
   @section('main-content')
    <div class="contestants-area contestants-detail">
        <div class="contestants-banner">
            <img class="banner-img" src="assets/img/contestants/cd1.png" alt="">
            <div class="heading mb-3">
                <div>
                    <h1>Sport players</h1>
                </div>
            </div>
        </div>
        <div class="container my-3">
            <div class="heading">
                <div>
                    <h2 class="mb-4">Meet our Contestants</h2>
                </div>
                <h5>Spark a passion for sports at a young age! We offer fun and engaging programs designed to develop skills and foster a love for the game.</h5>
            </div>
        </div>
        <div class="text-center mt-3">
            <a href="{{route('page.registerone')}}"><button class="btn-red mb-1" data-text="Register Now">Register Now</button></a>
        </div>
    </div>
   @endsection