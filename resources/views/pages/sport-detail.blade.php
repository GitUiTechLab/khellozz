@extends('layouts.main-app')
@section('main-content')
    <div class="sports-area">
        <img class="banner-img sports-banner" src="assets/img//sports/sports-banner.png" alt="">
        <div class="container">
            <div class="content">
                <div class="text default-content-text">
                    <h2>Cricket Tournament</h2>
                    <p>KHELLOZZ Sports Foundation is a dynamic and innovative sports organization based in the heart of
                        Patna, dedicated to promoting and enriching the sports culture in the region. Established in
                        2021, our organization has quickly become a prominent name in the sports industry, catering to
                        athletes, enthusiasts, and sports fans alike. We strive to create memorable and exhilarating
                        sports events that inspire athletes to push their limits and captivate audiences with the thrill
                        of competition.</p>
                    <p>KHELLOZZ Sports Foundation is a dynamic and innovative sports organization based in the heart of
                        Patna, dedicated to promoting and enriching the sports culture in the region. Established in
                        2021, our organization has quickly become a prominent name in the sports industry, catering to
                        athletes, enthusiasts, and sports fans alike. We strive to create memorable and exhilarating
                        sports events that inspire athletes to push their limits and captivate audiences with the thrill
                        of competition.</p>
                </div>
            </div>
        </div>

        <div class="container-fluid bg-pink p-5 d-flex flex-column align-items-center">
            <h3>Upcoming Events</h3>
            <h6>1st August to 25 September</h6>
            <a href="{{route('page.registerone')}}"><button class="btn-red">Register Now</button></a>
        </div>
    </div>
@endsection

    
    