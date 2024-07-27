@extends('layouts.main-app')
@section('main-content')
    <div class="sports-area">
        <img class="banner-img sports-banner" src="{{$record->imageUrl}}" alt="">
        <div class="container">
            <div class="content">
                <div class="text default-content-text">
                    <h2>{{ $record->title }} Tournament</h2>
                    <p> {{$record->description}}</p>
                   
                        
                </div>
            </div>
        </div>

        <div class="container-fluid bg-pink p-5 d-flex flex-column align-items-center">
            <h3>Upcoming Events</h3>
            <h6>1st August to 25 September</h6>
            <a href="{{route('page.registerone',$record->slug)}}"><button class="btn-red">Register Now</button></a>
        </div>
    </div>
@endsection

    
    