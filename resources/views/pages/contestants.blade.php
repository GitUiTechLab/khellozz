@extends('layouts.main-app')
   @section('main-content')
    <div class="contestants-area pt-3">
        <div class="container">
            <div class="heading">
                <div>
                    <h2>Meet our Contestants</h2>
                </div>
                <p>Our events feature an incredible lineup of diverse and talented athletes:</p>
            </div>
        </div>
        <div class="container contestants-area2">
            <div class="image-container">
                <a href="{{route('page.contestantdetail')}}">
                    <img src="assets/img/contestants/c1.png" alt="">
                    <h4>Sport <br> players</h4>
                </a>
            </div>
            <div class="image-container">
                <a href="{{route('page.contestantdetail')}}">
                    <img src="assets/img/contestants/c2.png" alt="">
                    <h4>Professional players</h4>
                </a>
            </div>
            <div class="image-container">
                <a href="{{route('page.contestantdetail')}}">
                    <img src="assets/img/contestants/c3.png" alt="">
                    <h4>Young Athletes</h4>
                </a>
            </div>
            <div class="image-container">
                <a href="{{route('page.contestantdetail')}}">
                    <img src="assets/img/contestants/c4.png" alt="">
                    <h4>Women in Sports</h4>
                </a>
            </div>
            <div class="image-container">
                <a href="{{route('page.contestantdetail')}}">
                    <img src="assets/img/contestants/c5.png" alt="">
                    <h4>All Gender Stars</h4>
                </a>
            </div>
        </div>
        <div class="container my-4">
            <h5>Spark a passion for sports at a young age! We offer fun and engaging programs designed to develop skills
                and foster a love for the game.</h5>
        </div>
        <div class="text-center mt-3">
            <a href="{{route('page.registerone')}}"><button class="btn-red mb-1" data-text="Register Now">Register Now</button></a>
        </div>
    </div>
@endsection
