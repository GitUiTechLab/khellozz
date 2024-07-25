@extends('layouts.main-app')

<!-- Home Slider -->
@section('main-content')
<div id="home-banner-carousel" class="banner-area carousel carousel-fade bg-pink" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#home-banner-carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#home-banner-carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#home-banner-carousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <div class="container-fluid display-none">
                <div class="content row">
                    <div class="left col-lg-6 default-content-text ps-5">
                        <h1>Sport Events</h1>
                        <h4>"Empowering Athletes, Inspiring Competition"</h4>
                        <h6>Join us in transforming sports culture and experience the thrill of excellence. Pushing
                            boundaries, inspiring communities, and creating unforgettable moments.</h6>
                        <a href="{{route('page.registerone')}}"><button class="btn-red" data-text="Apply Now">Apply
                                Now</button></a>
                    </div>
                    <div class="rigth col-lg-6 p-0">
                        <img src="assets/img/home/banner1.png" class="d-block w-100" alt="...">
                    </div>
                </div>
            </div>
            <div class="display-visible d-none">
                <img src="assets/img/home/banner1.png" class="w-100" alt="...">
                <div class="carousel-caption banner-content1 pt-0">
                    <h1>Sport Events</h1>
                    <h4>"Empowering Athletes, Inspiring Competition"</h4>
                    <h6>Join us in transforming sports culture and experience the thrill of excellence. Pushing
                        boundaries, inspiring communities, and creating unforgettable moments.</h6>
                    <a href="{{route('page.registerone')}}"><button class="btn-red" data-text="Apply Now">Apply Now</button></a>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <img src="assets/img/home/banner2.png" class="d-block w-100" alt="...">
            <div class="carousel-caption default-content-text banner-content2">
                <h1>Sport Events</h1>
                <h4>"Empowering Athletes, Inspiring Competition"</h4>
                <h6>Join us in transforming sports culture and experience the thrill of excellence. Pushing
                    boundaries, inspiring communities, and creating unforgettable moments.</h6>
                <a href="{{route('page.registerone')}}"><button class="btn-red" data-text="Apply Now">Apply Now</button></a>
            </div>
        </div>
        <div class="carousel-item">
            <img src="assets/img/home/banner3.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption default-content-text banner-content3">
                <h1>Sport Events</h1>
                <h4>"Empowering Athletes, Inspiring Competition"</h4>
                <h6>Join us in transforming sports culture and experience the thrill of excellence. Pushing
                    boundaries, inspiring communities, and creating unforgettable moments.</h6>
                <a href="{{route('page.registerone')}}"><button class="btn-red" data-text="Apply Now">Apply Now</button></a>
            </div>
        </div>
    </div>
</div>

<!-- End Home Slider -->

<!-- About Area -->
<div class="about-area m-0">
    <div class="container-fluid pt-5">
        <div class="content1 row">
            <div class="text col-lg-6 default-content-text">
                <p>About Us</p>
                <h2>Who we are</h2>
                <p>KHELLOZZ Sports Foundation is a dynamic and innovative sports organization based in the heart
                    of
                    Patna, dedicated to promoting and enriching the sports culture in the region. Established in
                    2021, our organization has quickly become a prominent name in the sports industry, catering
                    to
                    athletes, enthusiasts, and sports fans alike. We strive to create memorable and exhilarating
                    sports events that inspire athletes to push their limits and captivate audiences with the
                    thrill
                    of competition.</p>
                <a href="{{route('page.about')}}"><button class="btn-trans" data-text="Read More">Read More<i class="fa-solid fa-arrow-right-long ms-3"></i></button></a>
            </div>
            <div class="img col-lg-6 p-0">
                <img src="{{asset('assets/img/about/1.png')}}" alt="">
            </div>
        </div>
        <div class="content2 row">
            <div class="img col-lg-6 p-0">
                <img src="{{asset('assets/img/about/2.png')}}" alt="">
            </div>
            <div class="text col-lg-6 default-content-text">
                <p>KHELOZZ</p>
                <h2>Our Mission</h2>
                <p>At KHELLOZZ Sports Foundation, our mission is to foster a sustainable sports ecosystem by
                    organizing world-class sporting events and providing comprehensive support to athletes,
                    teams,
                    and sports organizations. We aim to make sports accessible to all, encourage active
                    participation, and contribute to the overall growth and development of sports in the region.
                </p>
                <a href="{{route('page.about')}}"><button class="btn-trans" data-text="Read More">Read More<i class="fa-solid fa-arrow-right-long ms-3"></i></button></a>
            </div>
        </div>
    </div>
</div>
<!-- About Area End -->

<!-- Sports Area -->
<div class="sports-area bg-pink">
    <div class="container py-5">
        <div class="heading">
            <div>
                <h2>Sports</h2>
                <h5><a href="{{route('page.sports')}}">View More</a></h5>
            </div>
            <p>"Revolutionizing Sports Culture in Patna"</p>
        </div>
        <div class="row slider1">
            <div class="col-lg-4">
                <div class="card">
                    <img src="{{asset('assets/img/sports/1.png')}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Lorem ipsum dolor sit</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                            eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                        <a href="{{route('page.sportdetail')}}"><span class="outline">View Details</span></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <img src="{{asset('assets/img/sports/2.png')}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Lorem ipsum dolor sit</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                            eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                        <a href="{{route('page.sportdetail')}}"><span class="outline">View Details</span></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <img src="{{asset('assets/img/sports/3.png')}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Lorem ipsum dolor sit</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                            eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                        <a href="{{route('page.sportdetail')}}"><span class="outline">View Details</span></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <img src="{{asset('assets/img/sports/1.png')}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Lorem ipsum dolor sit</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                            eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                        <a href="{{route('page.sportdetail')}}"><span class="outline">View Details</span></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <img src="{{asset('assets/img/sports/2.png')}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Lorem ipsum dolor sit</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                            eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                        <a href="{{route('page.sportdetail')}}"><span class="outline">View Details</span></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <img src="{{asset('assets/img/sports/3.png')}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Lorem ipsum dolor sit</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                            eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                        <a href="{{route('page.sportdetail')}}"><span class="outline">View Details</span></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <img src="{{asset('assets/img/sports/1.png')}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Lorem ipsum dolor sit</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                            eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                        <a href="{{route('page.sportdetail')}}"><span class="outline">View Details</span></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <img src="{{asset('assets/img/sports/2.png')}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Lorem ipsum dolor sit</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                            eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                        <a href="{{route('page.sportdetail')}}"><span class="outline">View Details</span></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <img src="{{asset('assets/img/sports/3.png')}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Lorem ipsum dolor sit</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                            eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                        <a href="{{route('page.sportdetail')}}"><span class="outline">View Details</span></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center mt-5">
            <a href="{{route('page.registerone')}}"><button class="btn-red" data-text="Register Now">Register Now</button></a>
        </div>
    </div>
</div>
<!-- Sports Area End -->

<!-- Events Area -->
<div class="events-area my-1 py-5">
    <div class="container">
        <div class="heading">
            <div>
                <h2>Events</h2>
                <h5><a href="{{route('page.events')}}">View More</a></h5>
            </div>
            <p>Unleash the Excitement of Sports Events</p>
        </div>
    </div>
    <div class="container p-0">
        <div id="events-carousel" class="carousel carousel-fade slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#events-carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#events-carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#events-carousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="container-fluid">
                        <div class="content content1 row">
                            <div class="left col-lg-6 default-content-text">
                                <h3>Unleash the Power of Sports: Exciting Events Await!</h3>
                                <p>Join Us for Unforgettable Sports Moments: Where Athletes Shine and Fans
                                    Cheer.
                                    Experience the Thrill of Competition, Camaraderie, and Excellence!"</p>
                                <a href="{{route('page.registerone')}}"><button class="btn-red" data-text="Register Now">Register
                                        Now</button></a>
                            </div>
                            <div class="rigth col-lg-6 p-0 display-none">
                                <img src="{{asset('assets/img/events/1.png')}}" class="d-block w-100" alt="...">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="container-fluid">
                        <div class="content content2 row">
                            <div class="left col-lg-6 default-content-text">
                                <h3>Unleash the Power of Sports: Exciting Events Await!</h3>
                                <p>Join Us for Unforgettable Sports Moments: Where Athletes Shine and Fans
                                    Cheer.
                                    Experience the Thrill of Competition, Camaraderie, and Excellence!"</p>
                                <a href="{{route('page.registerone')}}"><button class="btn-red" data-text="Register Now">Register
                                        Now</button></a>
                            </div>
                            <div class="rigth col-lg-6 p-0 display-none">
                                <img src="{{asset('assets/img/events/2.png')}}" class="d-block w-100" alt="...">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="container-fluid">
                        <div class="content content3 row">
                            <div class="left col-lg-6 default-content-text">
                                <h3>Unleash the Power of Sports: Exciting Events Await!</h3>
                                <p>Join Us for Unforgettable Sports Moments: Where Athletes Shine and Fans
                                    Cheer.
                                    Experience the Thrill of Competition, Camaraderie, and Excellence!"</p>
                                <a href="{{route('page.registerone')}}"><button class="btn-red mb-2" data-text="Register Now">Register
                                        Now</button></a>
                            </div>
                            <div class="rigth col-lg-6 p-0 display-none">
                                <img src="{{asset('assets/img/events/3.png')}}" class="d-block w-100" alt="...">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#events-carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#events-carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</div>
<!-- Events Area End -->

<!-- Gallery Area -->
<div class="gallery-area py-5">
    <div class="container">
        <div class="heading">
            <div>
                <h2>Gallery</h2>
                <h5><a href="{{route('page.gallery')}}">View More</a></h5>
            </div>
            <p>Explore Our Exciting Sports Moments</p>
        </div>
        <div class="gallery">
            <div class="box" id="b-1">
                <img height="250" class="toZoom card-img-top" src="assets/img/gallery/1.png" alt="Gallery Images">
                <div class="idMyModal modal">
                    <span class="close">&times;</span>
                    <img class="modal-content">
                </div>
                <div class="img-data">
                    <div class="img-data-icons">
                        <i class="fa-solid fa-share-nodes left-icon"></i>
                        <i class="fa-solid fa-download right-icon"></i>
                    </div>
                </div>
            </div>
            <div class="box" id="b-2">
                <img height="250" class="toZoom card-img-top" src="assets/img/gallery/2.png" alt="Gallery Images">
                <div class="idMyModal modal">
                    <span class="close">&times;</span>
                    <img class="modal-content">
                </div>
                <div class="img-data">
                    <div class="img-data-icons">
                        <i class="fa-solid fa-share-nodes left-icon"></i>
                        <i class="fa-solid fa-download right-icon"></i>
                    </div>
                </div>
            </div>
            <div class="box" id="b-3">
                <img height="250" class="toZoom card-img-top" src="assets/img/gallery/3.png" alt="Gallery Images">
                <div class="idMyModal modal">
                    <span class="close">&times;</span>
                    <img class="modal-content">
                </div>
                <div class="img-data">
                    <div class="img-data-icons">
                        <i class="fa-solid fa-share-nodes left-icon"></i>
                        <i class="fa-solid fa-download right-icon"></i>
                    </div>
                </div>
            </div>
            <div class="box" id="b-4">
                <img height="250" class="toZoom card-img-top" src="assets/img/gallery/4.png" alt="Gallery Images">
                <div class="idMyModal modal">
                    <span class="close">&times;</span>
                    <img class="modal-content">
                </div>
                <div class="img-data">
                    <div class="img-data-icons">
                        <i class="fa-solid fa-share-nodes left-icon"></i>
                        <i class="fa-solid fa-download right-icon"></i>
                    </div>
                </div>
            </div>
            <div class="box" id="b-5">
                <img height="250" class="toZoom card-img-top" src="assets/img/gallery/5.png" alt="Gallery Images">
                <div class="idMyModal modal">
                    <span class="close">&times;</span>
                    <img class="modal-content">
                </div>
                <div class="img-data">
                    <div class="img-data-icons">
                        <i class="fa-solid fa-share-nodes left-icon"></i>
                        <i class="fa-solid fa-download right-icon"></i>
                    </div>
                </div>
            </div>
            <div class="box" id="b-6">
                <img height="250" class="toZoom card-img-top" src="assets/img/gallery/6.png" alt="Gallery Images">
                <div class="idMyModal modal">
                    <span class="close">&times;</span>
                    <img class="modal-content">
                </div>
                <div class="img-data">
                    <div class="img-data-icons">
                        <i class="fa-solid fa-share-nodes left-icon"></i>
                        <i class="fa-solid fa-download right-icon"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- Gallery Area End -->

<!-- Contestants Area -->
<div class="contestants-area">
    <div class="container">
        <div class="heading">
            <div>
                <h2>Meet our Contestants</h2>
                <h5><a href="{{route('page.contestants')}}">View More</a></h5>
            </div>
            <p>Our events feature an incredible lineup of diverse and talented athletes:</p>
        </div>
    </div>
    <div class="container-fluid bg-pink">
        <div class="center py-5">
            <div class="image-container">
                <img src="assets/img/contestants/1.png" alt="">
                <h4>Young Athletes</h4>
            </div>
            <div class="image-container">
                <img src="assets/img/contestants/1.png" alt="">
                <h4>Women in Sports</h4>
            </div>
            <div class="image-container">
                <img src="assets/img/contestants/1.png" alt="">
                <h4>All Gender Stars</h4>
            </div>
            <div class="image-container">
                <img src="assets/img/contestants/1.png" alt="">
                <h4>Sport players</h4>
            </div>
            <div class="image-container">
                <img src="assets/img/contestants/1.png" alt="">
                <h4>Professional players</h4>
            </div>
            <div class="image-container">
                <img src="assets/img/contestants/1.png" alt="">
                <h4>Women in Sports</h4>
            </div>
            <div class="image-container">
                <img src="assets/img/contestants/1.png" alt="">
                <h4>All Gender Stars</h4>
            </div>
            <div class="image-container">
                <img src="assets/img/contestants/1.png" alt="">
                <h4>Sport players</h4>
            </div>
        </div>
    </div>
</div>
<!-- Contestants Area End-->

<!-- Videos Area -->
<div class="videos-area">
    <div class="container py-5">
        <div class="heading">
            <div>
                <h2>Featured Videos</h2>
            </div>
            <p>Our Collection of Exciting and Memorable Sports Moments</p>
        </div>
        <div class="row slider1">
            <div class="col-lg-4">
                <div class="card">
                    <video height="100" src="{{asset('assets/img/videos/4.mp4')}}" controls></video>
                    <!-- <img src="assets/img/videos/1.png" alt=""> -->
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <video height="100" src="{{asset('assets/img/videos/4.mp4')}}" controls></video>
                    <!-- <img src="assets/img/videos/2.png" alt=""> -->
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <video height="100" src="{{asset('assets/img/videos/4.mp4')}}" controls></video>
                    <!-- <img src="assets/img/videos/3.png" alt=""> -->
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <video height="100" src="{{asset('assets/img/videos/4.mp4')}}" controls></video>
                    <!-- <img src="assets/img/videos/1.png" alt=""> -->
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                <video height="100" src="{{asset('assets/img/videos/4.mp4')}}" controls></video>
                    <!-- <img src="assets/img/videos/2.png" alt=""> -->
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <video height="100" src="{{asset('assets/img/videos/4.mp4')}}" controls></video>
                    <!-- <img src="assets/img/videos/3.png" alt=""> -->
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <video height="100" src="{{asset('assets/img/videos/4.mp4')}}" controls></video>
                    <!-- <img src="assets/img/videos/1.png" alt=""> -->
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <video height="100" src="{{asset('assets/img/videos/4.mp4')}}" controls></video>
                    <!-- <img src="assets/img/videos/2.png" alt=""> -->
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <video height="100" src="{{asset('assets/img/videos/4.mp4')}}" controls></video>
                    <!-- <img src="assets/img/videos/3.png" alt=""> -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Videos Area End -->

<!-- Media Area -->
<div class="media-area">
    <div class="container-fluid bg-pink py-5">
        <div class="container">
            <div class="heading">
                <div>
                    <h2>Media Coverage</h2>
                    <h5><a href="{{route('page.media')}}">View More</a></h5>
                </div>
                <p>Stay updated with our latest events and achievements through our comprehensive media
                    coverage.</p>
            </div>
        </div>
        <div class="container py-3">
            <div class="row slider1">
                <div class="col-lg-4">
                    <div class="card">
                        <img height="250" src="assets/img/media/1.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-date"><i class="fa-solid fa-calendar"></i>
                                Jan 06, 2024</p>
                            <h5 class="card-title">Newspaper name</h5>
                            <p class="card-text">Sport information... Lorem ipsum dolor sit amet, consectetur
                                adipisicing elit. Laboriosam, earum.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <img height="250" src="assets/img/media/1.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-date"><i class="fa-solid fa-calendar"></i>
                                Jan 06, 2024</p>
                            <h5 class="card-title">Newspaper name</h5>
                            <p class="card-text">Sport information... Lorem ipsum dolor sit amet, consectetur
                                adipisicing elit. Laboriosam, earum.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <img height="250" src="assets/img/media/1.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-date"><i class="fa-solid fa-calendar"></i>
                                Jan 06, 2024</p>
                            <h5 class="card-title">Newspaper name</h5>
                            <p class="card-text">Sport information... Lorem ipsum dolor sit amet, consectetur
                                adipisicing elit. Laboriosam, earum.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <img height="250" src="assets/img/media/1.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-date"><i class="fa-solid fa-calendar"></i>
                                Jan 06, 2024</p>
                            <h5 class="card-title">Newspaper name</h5>
                            <p class="card-text">Sport information... Lorem ipsum dolor sit amet, consectetur
                                adipisicing elit. Laboriosam, earum.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <img height="250" src="assets/img/media/1.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-date"><i class="fa-solid fa-calendar"></i>
                                Jan 06, 2024</p>
                            <h5 class="card-title">Newspaper name</h5>
                            <p class="card-text">Sport information... Lorem ipsum dolor sit amet, consectetur
                                adipisicing elit. Laboriosam, earum.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <img height="250" src="assets/img/media/1.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-date"><i class="fa-solid fa-calendar"></i>
                                Jan 06, 2024</p>
                            <h5 class="card-title">Newspaper name</h5>
                            <p class="card-text">Sport information... Lorem ipsum dolor sit amet, consectetur
                                adipisicing elit. Laboriosam, earum.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <img height="250" src="assets/img/media/1.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-date"><i class="fa-solid fa-calendar"></i>
                                Jan 06, 2024</p>
                            <h5 class="card-title">Newspaper name</h5>
                            <p class="card-text">Sport information... Lorem ipsum dolor sit amet, consectetur
                                adipisicing elit. Laboriosam, earum.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <img height="250" src="assets/img/media/1.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-date"><i class="fa-solid fa-calendar"></i>
                                Jan 06, 2024</p>
                            <h5 class="card-title">Newspaper name</h5>
                            <p class="card-text">Sport information... Lorem ipsum dolor sit amet, consectetur
                                adipisicing elit. Laboriosam, earum.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <img height="250" src="assets/img/media/1.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-date"><i class="fa-solid fa-calendar"></i>
                                Jan 06, 2024</p>
                            <h5 class="card-title">Newspaper name</h5>
                            <p class="card-text">Sport information... Lorem ipsum dolor sit amet, consectetur
                                adipisicing elit. Laboriosam, earum.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Media Area End -->

<!-- Blog Area -->
<div class="blog-area py-5">
    <div class="container-fluid">
        <div class="heading home-blog-heading">
            <div>
                <h2>BLOGS</h2>
                <h2>BLOGS</h2>
                <h2>BLOGS</h2>
                <h2>BLOGS</h2>
                <h2>BLOGS</h2>
                <h2>BLOGS</h2>
                <h2>BLOGS</h2>
                <h2>BLOGS</h2>
                <h2>BLOGS</h2>
                <h2>BLOGS</h2>
                <h2>BLOGS</h2>
                <h2>BLOGS</h2>
                <h2>BLOGS</h2>
                <h2>BLOGS</h2>
                <h2>BLOGS</h2>
                <h2>BLOGS</h2>
            </div>
        </div>
    </div>
    <div class="container py-3">
        <div class="row slider1">
            <div class="col-lg-4">
                <div class="card">
                    <img height="250" src="assets/img/blogs/1.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <div class="card-info">
                            <p>By Admin</p>
                            <p class="card-date"><i class="fa-solid fa-calendar"></i>
                                Jan 06, 2024</p>
                        </div>
                        <h5 class="card-title">Lorem, ipsum dolor.</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur
                            adipisicing elit. Laboriosam, earum.</p>
                        <a class="btn-trans w-100" href="{{route('page.blogdetail')}}"><span>Read More</span><i class="fa-solid fa-arrow-right-long ms-3"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <img height="250" src="assets/img/blogs/1.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <div class="card-info">
                            <p>By Admin</p>
                            <p class="card-date"><i class="fa-solid fa-calendar"></i>
                                Jan 06, 2024</p>
                        </div>
                        <h5 class="card-title">Lorem, ipsum dolor.</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur
                            adipisicing elit. Laboriosam, earum.</p>
                        <a class="btn-trans w-100" href="{{route('page.blogdetail')}}"><span>Read More</span><i class="fa-solid fa-arrow-right-long ms-3"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <img height="250" src="assets/img/blogs/1.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <div class="card-info">
                            <p>By Admin</p>
                            <p class="card-date"><i class="fa-solid fa-calendar"></i>
                                Jan 06, 2024</p>
                        </div>
                        <h5 class="card-title">Lorem, ipsum dolor.</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur
                            adipisicing elit. Laboriosam, earum.</p>
                        <a class="btn-trans w-100" href="{{route('page.blogdetail')}}"><span>Read More</span><i class="fa-solid fa-arrow-right-long ms-3"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <img height="250" src="assets/img/blogs/1.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <div class="card-info">
                            <p>By Admin</p>
                            <p class="card-date"><i class="fa-solid fa-calendar"></i>
                                Jan 06, 2024</p>
                        </div>
                        <h5 class="card-title">Lorem, ipsum dolor.</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur
                            adipisicing elit. Laboriosam, earum.</p>
                        <a class="btn-trans w-100" href="{{route('page.blogdetail')}}"><span>Read More</span><i class="fa-solid fa-arrow-right-long ms-3"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <img height="250" src="assets/img/blogs/1.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <div class="card-info">
                            <p>By Admin</p>
                            <p class="card-date"><i class="fa-solid fa-calendar"></i>
                                Jan 06, 2024</p>
                        </div>
                        <h5 class="card-title">Lorem, ipsum dolor.</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur
                            adipisicing elit. Laboriosam, earum.</p>
                        <a class="btn-trans w-100" href="{{route('page.blogdetail')}}"><span>Read More</span><i class="fa-solid fa-arrow-right-long ms-3"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <img height="250" src="assets/img/blogs/1.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <div class="card-info">
                            <p>By Admin</p>
                            <p class="card-date"><i class="fa-solid fa-calendar"></i>
                                Jan 06, 2024</p>
                        </div>
                        <h5 class="card-title">Lorem, ipsum dolor.</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur
                            adipisicing elit. Laboriosam, earum.</p>
                        <a class="btn-trans w-100" href="{{route('page.blogdetail')}}"><span>Read More</span><i class="fa-solid fa-arrow-right-long ms-3"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <img height="250" src="assets/img/blogs/1.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <div class="card-info">
                            <p>By Admin</p>
                            <p class="card-date"><i class="fa-solid fa-calendar"></i>
                                Jan 06, 2024</p>
                        </div>
                        <h5 class="card-title">Lorem, ipsum dolor.</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur
                            adipisicing elit. Laboriosam, earum.</p>
                        <a class="btn-trans w-100" href="{{route('page.blogdetail')}}"><span>Read More</span><i class="fa-solid fa-arrow-right-long ms-3"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <img height="250" src="assets/img/blogs/1.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <div class="card-info">
                            <p>By Admin</p>
                            <p class="card-date"><i class="fa-solid fa-calendar"></i>
                                Jan 06, 2024</p>
                        </div>
                        <h5 class="card-title">Lorem, ipsum dolor.</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur
                            adipisicing elit. Laboriosam, earum.</p>
                        <a class="btn-trans w-100" href="{{route('page.blogdetail')}}"><span>Read More</span><i class="fa-solid fa-arrow-right-long ms-3"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <img height="250" src="assets/img/blogs/1.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <div class="card-info">
                            <p>By Admin</p>
                            <p class="card-date"><i class="fa-solid fa-calendar"></i>
                                Jan 06, 2024</p>
                        </div>
                        <h5 class="card-title">Lorem, ipsum dolor.</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur
                            adipisicing elit. Laboriosam, earum.</p>
                        <a class="btn-trans w-100" href="{{route('page.blogdetail')}}"><span>Read More</span><i class="fa-solid fa-arrow-right-long ms-3"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Blog Area End -->

<!-- Testimonial Area -->
<div class="testimonial-area">
    <div class="container-fluid bg-pink py-5">
        <img class="quote" src="assets/img/testimonial/quote.png" alt="">
        <div class="heading justify-content-center">
            <h2>What Our Sports lover Says</h2>
        </div>
        <div class="container pt-5">
            <div class="row slider2">
                <div class="col-lg-6">
                    <div class="testimonial-card">
                        <div class="testimonial-card-content">
                            <h6>A national player in football.</h6>
                            <p>
                                "Participating in these events has been a life-changing experience. The
                                organization is top-notch, fostering a sense of camaraderie among all
                                participants. The thrill of competition is unparalleled, making every moment
                                unforgettable!"
                            </p>
                        </div>
                        <div class="arrow-down"></div>
                        <div class="testimonial-card-author">
                            <div>
                                <img src="assets/img/testimonial/pic.png" alt="">
                            </div>
                            <div class="mx-2">
                                <h5>Evana Yas</h5>
                                <p>CARMEL, HIGH SCHOOL</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 ">
                    <div class="testimonial-card">
                        <div class="testimonial-card-content">
                            <h6>A national player in football.</h6>
                            <p>
                                "Participating in these events has been a life-changing experience. The
                                organization is top-notch, fostering a sense of camaraderie among all
                                participants. The thrill of competition is unparalleled, making every moment
                                unforgettable!"
                            </p>
                        </div>
                        <div class="arrow-down"></div>
                        <div class="testimonial-card-author">
                            <div>
                                <img src="assets/img/testimonial/pic.png" alt="">
                            </div>
                            <div class="mx-2">
                                <h5>Evana Yas</h5>
                                <p>CARMEL, HIGH SCHOOL</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 ">
                    <div class="testimonial-card">
                        <div class="testimonial-card-content">
                            <h6>A national player in football.</h6>
                            <p>
                                "Participating in these events has been a life-changing experience. The
                                organization is top-notch, fostering a sense of camaraderie among all
                                participants. The thrill of competition is unparalleled, making every moment
                                unforgettable!"
                            </p>
                        </div>
                        <div class="arrow-down"></div>
                        <div class="testimonial-card-author">
                            <div>
                                <img src="assets/img/testimonial/pic.png" alt="">
                            </div>
                            <div class="mx-2">
                                <h5>Evana Yas</h5>
                                <p>CARMEL, HIGH SCHOOL</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 ">
                    <div class="testimonial-card">
                        <div class="testimonial-card-content">
                            <h6>A national player in football.</h6>
                            <p>
                                "Participating in these events has been a life-changing experience. The
                                organization is top-notch, fostering a sense of camaraderie among all
                                participants. The thrill of competition is unparalleled, making every moment
                                unforgettable!"
                            </p>
                        </div>
                        <div class="arrow-down"></div>
                        <div class="testimonial-card-author">
                            <div>
                                <img src="assets/img/testimonial/pic.png" alt="">
                            </div>
                            <div class="mx-2">
                                <h5>Evana Yas</h5>
                                <p>CARMEL, HIGH SCHOOL</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Testimonial Area End-->

<!-- Contact Area -->
<div class="contact-area py-5">
    <div class="container">
        <div class="heading mb-3">
            <div>
                <h2>Contact Us</h2>
            </div>
            <p>Any questions or remark kindly message.</p>
        </div>
        <div class="row home-content mx-1">
            <div class="col-lg-4 contact-info">
                <div class="mb-5">
                    <h6 class="mb-1">Contact Information</h6>
                    <p>Any questions or remark kindly message.</p>
                </div>
                <div class="m-4">
                    <i class="fa-solid fa-phone me-3"></i>
                    <span>+91- 9999011452</span>
                </div>
                <div class="m-4">
                    <i class="fa-solid fa-envelope me-3"></i>
                    <span>example@gmail.com</span>
                </div>
                <div class="m-4">
                    <i class="fa-solid fa-location-dot me-3"></i>
                    <span>Lorem ipsum dolor sit amet consectetur adipisicing elit.</span>
                </div>
            </div>
            <div class="col-lg-8 contact-form bg-pink">
                <form action="">
                    <div class="row">
                        <div class="col-lg-6 mb-4">
                            <input type="text" name="first_name" id="" placeholder="First Name:">
                        </div>
                        <div class="col-lg-6 mb-4">
                            <input type="text" name="last" id="" placeholder="Last Name:">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 mb-4">
                            <input type="email" name="email" id="" placeholder="Email:">
                        </div>
                        <div class="col-lg-6 mb-4">
                            <input type="tel" name="phone" id="" placeholder="Phone Number:">
                        </div>
                    </div>
                    <div class="mb-4">
                        <!-- <label for="sports">Sports</label> -->
                        <select id="sports" class="form-select bg-trans" aria-label="Default select example">
                            <option selected>Select Sports</option>
                            <option value="1">Sport1</option>
                            <option value="2">Sport2</option>
                            <option value="3">Sport3</option>
                            <option value="4">Sport4</option>
                            <option value="5">Sport5</option>
                            <option value="6">Sport6</option>
                            <option value="7">Sport7</option>
                            <option value="8">Sport8</option>
                        </select>
                    </div>
                    <div class="mb-5">
                        <label for="message">Message:</label> <br>
                        <textarea class="mt-2" rows="5" name="message" id="message" placeholder="Message:"></textarea>
                    </div>
                    <button class="btn-red" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Contact Area End -->

<!-- FAQs Area -->
<div class="faq-area">
    <div class="container-fluid bg-pink py-5">
        <div class="heading">
            <div class="justify-content-center">
                <h2>FAQ </h2>
            </div>
        </div>
        <div class="wrapper">
            <div class="container">
                <div class="question">
                    Lorem ipsum dolor sit amet consectetur?
                </div>
                <div class="answercont">
                    <div class="answer">
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Distinctio modi veniam omnis,
                        consequuntur illum nemo!
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="question">
                    Lorem ipsum dolor sit amet consectetur?
                </div>
                <div class="answercont">
                    <div class="answer">
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Distinctio modi veniam omnis,
                        consequuntur illum nemo!
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="question">
                    Lorem ipsum dolor sit amet consectetur?
                </div>
                <div class="answercont">
                    <div class="answer">
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Distinctio modi veniam omnis,
                        consequuntur illum nemo!
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="question">
                    Lorem ipsum dolor sit amet consectetur?
                </div>
                <div class="answercont">
                    <div class="answer">
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Distinctio modi veniam omnis,
                        consequuntur illum nemo!
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="question">
                    Lorem ipsum dolor sit amet consectetur?
                </div>
                <div class="answercont">
                    <div class="answer">
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Distinctio modi veniam omnis,
                        consequuntur illum nemo!
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="question">
                    Lorem ipsum dolor sit amet consectetur?
                </div>
                <div class="answercont">
                    <div class="answer">
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Distinctio modi veniam omnis,
                        consequuntur illum nemo!
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
<!-- FAQs Area End-->

<!-- Footer Area -->

<!-- Footer Area End-->