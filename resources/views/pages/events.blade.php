@extends('layouts.main-app')
@section('main-content')
    <div class="events-area">
        <div class="container pt-3">
            <div class="heading">
                <div>
                    <h2>Upcoming Events</h2>
                </div>
                <p>Discover Exciting Upcoming Events and Mark Your Calendar for Unforgettable Experiences. Join Us
                    for a Journey of Competition, Celebration, and Camaraderie.</p>
            </div>
            <div class="card-container">
                @foreach ($events as $data)
                <div class="card">
                    <img height="100" width="100" src="{{$data->imageUrl}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $data->title }} Championship</h5>
                        <p class="card-text">1st Feb to 3rd Feb</p>
                        <p class="card-text">{{$data->address}}</p>
                        <h6 class="color-primary2">Event Starts In:</h6>
                        <div class="time-counter">
                            <div>
                                <span class="timer-box">05</span>
                                <span class="color-gray">Days</span>
                            </div>
                            <div>
                                <span class="timer-box">25</span>
                                <span class="color-gray">Hours</span>
                            </div>
                            <div>
                                <span class="timer-box">45</span>
                                <span class="color-gray">Minutes</span>
                            </div>
                            <div>
                                <span class="timer-box">20</span>
                                <span class="color-gray">Seconds</span>
                            </div>
                        </div>
                        <div class="text-center mt-3">
                            <a href="{{route('page.registerone')}}"><button class="btn-red" data-text="Register Now">Register Now</button></a>
                        </div>
                    </div>
                </div>
                @endforeach
                
               {{--   <div class="card">
                    <img height="100" width="100" src="{{asset('assets/img/events/e2.png')}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Foot Ball Championship</h5>
                        <p class="card-text">1st Feb to 3rd Feb</p>
                        <p class="card-text">Bihta School Foot Ball Championship</p>
                        <h6 class="color-primary2">Event Starts In:</h6>
                        <div class="time-counter">
                            <div>
                                <span class="timer-box">05</span>
                                <span class="color-gray">Days</span>
                            </div>
                            <div>
                                <span class="timer-box">25</span>
                                <span class="color-gray">Hours</span>
                            </div>
                            <div>
                                <span class="timer-box">45</span>
                                <span class="color-gray">Minutes</span>
                            </div>
                            <div>
                                <span class="timer-box">20</span>
                                <span class="color-gray">Seconds</span>
                            </div>
                        </div>
                        <div class="text-center mt-3">
                            <a href="{{route('page.registerone')}}"><button class="btn-red" data-text="Register Now">Register Now</button></a>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <img height="100" width="100" src="{{asset('assets/img/events/e3.png')}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Foot Ball Championship</h5>
                        <p class="card-text">1st Feb to 3rd Feb</p>
                        <p class="card-text">Bihta School Foot Ball Championship</p>
                        <h6 class="color-primary2">Event Starts In:</h6>
                        <div class="time-counter">
                            <div>
                                <span class="timer-box">05</span>
                                <span class="color-gray">Days</span>
                            </div>
                            <div>
                                <span class="timer-box">25</span>
                                <span class="color-gray">Hours</span>
                            </div>
                            <div>
                                <span class="timer-box">45</span>
                                <span class="color-gray">Minutes</span>
                            </div>
                            <div>
                                <span class="timer-box">20</span>
                                <span class="color-gray">Seconds</span>
                            </div>
                        </div>
                        <div class="text-center mt-3">
                            <a href="{{route('page.registerone')}}"><button class="btn-red" data-text="Register Now">Register Now</button></a>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <img height="100" width="100" src="{{asset('assets/img/events/e4.png')}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Foot Ball Championship</h5>
                        <p class="card-text">1st Feb to 3rd Feb</p>
                        <p class="card-text">Bihta School Foot Ball Championship</p>
                        <h6 class="color-primary2">Event Starts In:</h6>
                        <div class="time-counter">
                            <div>
                                <span class="timer-box">05</span>
                                <span class="color-gray">Days</span>
                            </div>
                            <div>
                                <span class="timer-box">25</span>
                                <span class="color-gray">Hours</span>
                            </div>
                            <div>
                                <span class="timer-box">45</span>
                                <span class="color-gray">Minutes</span>
                            </div>
                            <div>
                                <span class="timer-box">20</span>
                                <span class="color-gray">Seconds</span>
                            </div>
                        </div>
                        <div class="text-center mt-3">
                            <a href="{{route('page.registerone')}}"><button class="btn-red" data-text="Register Now">Register Now</button></a>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <img height="100" width="100" src="{{asset('assets/img/events/e5.png')}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Foot Ball Championship</h5>
                        <p class="card-text">1st Feb to 3rd Feb</p>
                        <p class="card-text">Bihta School Foot Ball Championship</p>
                        <h6 class="color-primary2">Event Starts In:</h6>
                        <div class="time-counter">
                            <div>
                                <span class="timer-box">05</span>
                                <span class="color-gray">Days</span>
                            </div>
                            <div>
                                <span class="timer-box">25</span>
                                <span class="color-gray">Hours</span>
                            </div>
                            <div>
                                <span class="timer-box">45</span>
                                <span class="color-gray">Minutes</span>
                            </div>
                            <div>
                                <span class="timer-box">20</span>
                                <span class="color-gray">Seconds</span>
                            </div>
                        </div>
                        <div class="text-center mt-3">
                            <a href="{{route('page.registerone')}}"><button class="btn-red" data-text="Register Now">Register Now</button></a>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <img height="100" width="100" src="{{asset('assets/img/events/e6.png')}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Foot Ball Championship</h5>
                        <p class="card-text">1st Feb to 3rd Feb</p>
                        <p class="card-text">Bihta School Foot Ball Championship</p>
                        <h6 class="color-primary2">Event Starts In:</h6>
                        <div class="time-counter">
                            <div>
                                <span class="timer-box">05</span>
                                <span class="color-gray">Days</span>
                            </div>
                            <div>
                                <span class="timer-box">25</span>
                                <span class="color-gray">Hours</span>
                            </div>
                            <div>
                                <span class="timer-box">45</span>
                                <span class="color-gray">Minutes</span>
                            </div>
                            <div>
                                <span class="timer-box">20</span>
                                <span class="color-gray">Seconds</span>
                            </div>
                        </div>
                        <div class="text-center mt-3">
                            <a href="{{route('page.registerone')}}"><button class="btn-red" data-text="Register Now">Register Now</button></a>
                        </div>
                    </div>
                </div>
            </div>--}}
            
        </div>
    </div>
@endsection

    
    