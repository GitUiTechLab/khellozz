@extends('layouts.main-app')
@section('main-content')

    <div class="player-achievements-area">
        <div class="container pt-3">
            <div class="heading">
                <div>
                    <h2>Player Achievements</h2>
                </div>
                <p>Recognizing the outstanding accomplishments of our talented players. Explore individual and team
                    achievements, milestones, and awards.</p>
            </div>

            <div class="container">
                <div class="card mb-3 w-100">
                    <div class="row">
                        <div class="col-md-3 col-12">
                            <img src="assets/img/player-achievements/1.png" class="achieve-dtl-img img-fluid rounded-start p-0"
                                alt="...">
                        </div>
                        <div class="col-md-9">
                            <div class="card-body">
                                <h5 class="card-title">Maria Smith</h5>
                                <h6 class="color-primary2 my-2">Gold medal in table tennis</h6>
                                <p class="card-text">This is a wider card with supporting text below as a natural
                                    lead-in to additional content. This content is a little bit longer.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container bg-pink mb-3">
                <div class="player-data">
                    <div>
                        <span class="color-primary2 fw-semibold">Sports name</span>
                        <span>Badminton</span>
                    </div>
                    <div>
                        <span class="color-primary2 fw-semibold">Player name</span>
                        <span>Maria Smith</span>
                    </div>
                    <div>
                        <span class="color-primary2 fw-semibold">Under age group</span>
                        <span>Under 17</span>
                    </div>
                    <div>
                        <span class="color-primary2 fw-semibold">School name</span>
                        <span>DPS Patna</span>
                    </div>
                    <div>
                        <span class="color-primary2 fw-semibold">Class</span>
                        <span>12</span>
                    </div>
                    <div>
                        <span class="color-primary2 fw-semibold">Date</span>
                        <span>08/07/2024</span>
                    </div>
                </div>
            </div>

            <div class="container d-flex flex-column align-items-center">
                <h2>Sports certificate</h2>
                <div class="box">
                    <a href=""><img src="assets/img/player-achievements/certificate.png" alt=""></a>
                    <div class="img-data">
                        <div class="img-data-icons">
                            <i class="fa-solid fa-share-nodes left-icon"></i>
                            <i class="fa-solid fa-download right-icon"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-5">
                <a href="{{route('page.registerone')}}"><button class="btn-red" data-text="Register Now">Register Now</button></a>
            </div>
        </div>
    </div>
@endsection

   