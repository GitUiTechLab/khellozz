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
            <div class="card-container">
                <div class="card player-card">
                    <a href="{{route('page.playerachievementdetail')}}">
                        <img height="250" src="assets/img/player-achievements/1.png" class="card-img-top" alt="...">
                        <div class="player-grp-logo">
                            <span>Under 17 age Group</span>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Maria Smith</h5>
                            <h6 class="color-primary2 my-2">Gold medal in table tennis</h6>
                            <p class="card-text">Lorem Ipsum is simply dummy text of the printing and type -setting
                                industry.</p>
                        </div>
                    </a>
                </div>
                <div class="card player-card">
                    <a href="{{route('page.playerachievementdetail')}}">
                        <img height="250" src="assets/img/player-achievements/2.png" class="card-img-top" alt="...">
                        <div class="player-grp-logo">
                            <span>Under 17 age Group</span>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Lorem Name</h5>
                            <h6 class="color-primary2 my-2">Gold medal in table tennis</h6>
                            <p class="card-text">Lorem Ipsum is simply dummy text of the printing and type -setting
                                industry.</p>
                        </div>
                    </a>
                </div>
                <div class="card player-card">
                    <a href="{{route('page.playerachievementdetail')}}">
                        <img height="250" src="assets/img/player-achievements/3.png" class="card-img-top" alt="...">
                        <div class="player-grp-logo">
                            <span>Under 17 age Group</span>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Lorem Name</h5>
                            <h6 class="color-primary2 my-2">Gold medal in table tennis</h6>
                            <p class="card-text">Lorem Ipsum is simply dummy text of the printing and type -setting
                                industry.</p>
                        </div>
                    </a>
                </div>
                <div class="card player-card">
                    <a href="{{route('page.playerachievementdetail')}}">
                        <img height="250" src="assets/img/player-achievements/4.png" class="card-img-top" alt="...">
                        <div class="player-grp-logo">
                            <span>Under 17 age Group</span>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Lorem Name</h5>
                            <h6 class="color-primary2 my-2">Gold medal in table tennis</h6>
                            <p class="card-text">Lorem Ipsum is simply dummy text of the printing and type -setting
                                industry.</p>
                        </div>
                    </a>
                </div>
                <div class="card player-card">
                    <a href="{{route('page.playerachievementdetail')}}">
                        <img height="250" src="assets/img/player-achievements/1.png" class="card-img-top" alt="...">
                        <div class="player-grp-logo">
                            <span>Under 17 age Group</span>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Maria Smith</h5>
                            <h6 class="color-primary2 my-2">Gold medal in table tennis</h6>
                            <p class="card-text">Lorem Ipsum is simply dummy text of the printing and type -setting
                                industry.</p>
                        </div>
                    </a>
                </div>
                <div class="card player-card">
                    <a href="{{route('page.playerachievementdetail')}}">
                        <img height="250" src="assets/img/player-achievements/2.png" class="card-img-top" alt="...">
                        <div class="player-grp-logo">
                            <span>Under 17 age Group</span>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Lorem Name</h5>
                            <h6 class="color-primary2 my-2">Gold medal in table tennis</h6>
                            <p class="card-text">Lorem Ipsum is simply dummy text of the printing and type -setting
                                industry.</p>
                        </div>
                    </a>
                </div>
                <div class="card player-card">
                    <a href="{{route('page.playerachievementdetail')}}">
                        <img height="250" src="assets/img/player-achievements/3.png" class="card-img-top" alt="...">
                        <div class="player-grp-logo">
                            <span>Under 17 age Group</span>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Lorem Name</h5>
                            <h6 class="color-primary2 my-2">Gold medal in table tennis</h6>
                            <p class="card-text">Lorem Ipsum is simply dummy text of the printing and type -setting
                                industry.</p>
                        </div>
                    </a>
                </div>
                <div class="card player-card">
                    <a href="{{route('page.playerachievementdetail')}}">
                        <img height="250" src="assets/img/player-achievements/4.png" class="card-img-top" alt="...">
                        <div class="player-grp-logo">
                            <span>Under 17 age Group</span>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Lorem Name</h5>
                            <h6 class="color-primary2 my-2">Gold medal in table tennis</h6>
                            <p class="card-text">Lorem Ipsum is simply dummy text of the printing and type -setting
                                industry.</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="text-center mt-5">
                <a href="{{route('page.registerone')}}"><button class="btn-red" data-text="Register Now">Register Now</button></a>
            </div>
        </div>
    </div>
@endsection

    

    