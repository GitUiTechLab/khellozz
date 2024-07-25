@extends('layouts.main-app')
@section('main-content')
    <div class="sports-area">
        <div class="container pt-3">
            <div class="heading">
                <div>
                    <h2>Explore Our Sports Section</h2>
                </div>
                <p>Discover a world of excitement with our diverse range of 15 games. Each sport offers a unique challenge and thrilling experience for athletes and enthusiasts alike. Join us to explore:</p>
            </div>
            <div class="card-container">
                <div class="card">
                    <img src="{{asset('assets/img/sports/1.png')}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Lorem ipsum dolor sit</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                        <a href="{{route('page.sportdetail')}}"><span class="outline">View Details</span></a>
                    </div>
                </div>
                <div class="card">
                    <img src="{{asset('assets/img/sports/2.png')}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Lorem ipsum dolor sit</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                        <a href="{{route('page.sportdetail')}}"><span class="outline">View Details</span></a>
                    </div>
                </div>
                <div class="card">
                    <img src="{{asset('assets/img/sports/3.png')}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Lorem ipsum dolor sit</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                        <a href="{{route('page.sportdetail')}}"><span class="outline">View Details</span></a>
                    </div>
                </div>
                <div class="card">
                    <img src="{{asset('assets/img/sports/1.png')}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Lorem ipsum dolor sit</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                        <a href="{{route('page.sportdetail')}}"><span class="outline">View Details</span></a>
                    </div>
                </div>
                <div class="card">
                    <img src="{{asset('assets/img/sports/2.png')}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Lorem ipsum dolor sit</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                        <a href="{{route('page.sportdetail')}}"><span class="outline">View Details</span></a>
                    </div>
                </div>
                <div class="card">
                    <img src="{{asset('assets/img/sports/3.png')}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Lorem ipsum dolor sit</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                        <a href="{{route('page.sportdetail')}}"><span class="outline">View Details</span></a>
                    </div>
                </div>
                <div class="card">
                    <img src="{{asset('assets/img/sports/1.png')}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Lorem ipsum dolor sit</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                        <a href="{{route('page.sportdetail')}}"><span class="outline">View Details</span></a>
                    </div>
                </div>
                <div class="card">
                    <img src="{{asset('assets/img/sports/2.png')}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Lorem ipsum dolor sit</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                        <a href="{{route('page.sportdetail')}}"><span class="outline">View Details</span></a>
                    </div>
                </div>
                <div class="card">
                    <img src="{{asset('assets/img/sports/3.png')}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Lorem ipsum dolor sit</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                        <a href="{{route('page.sportdetail')}}"><span class="outline">View Details</span></a>
                    </div>
                </div>
            </div>
            <div class="text-center mt-5">
                <a href="{{route('page.registerone')}}"><button class="btn-red" data-text="Register Now">Register Now</button></a>
            </div>
        </div>
    </div>
@endsection
   

    
    