@extends('layouts.main-app')
@section('main-content')
<div class="blog-area">
    <img class="banner-img blog-banner" src="{{$record->imageUrl}}" alt="">
    <div class="container">
        <div class="content">
            <div class="text default-content-text p-0 pt-3">
                <div class="card-info">
                    <p>By Admin</p>
                    <p class="card-date"><i class="fa-solid fa-calendar"></i>
                        {{$record->date}}
                    </p>
                </div>
                <h2>{{$record->title}}</h2>
                <p>{{ $record->description }}
                </p>

            </div>
        </div>
    </div>
    <div class="container py-5">
        <div class="heading">
            <div>
                <h2>Explore More Blogs</h2>
                <h5><a href="{{route('page.blog')}}">View More</a></h5>
            </div>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi, repellendus!</p>
        </div>
        <div class="row slider1">

            @foreach ($allblog as $blog)
            <div class="col-lg-4">
                <div class="card">
                    <img height="250" src="{{$blog->imageUrl}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <div class="card-info">
                            <p>By Admin</p>
                            <p class="card-date"><i class="fa-solid fa-calendar"></i>
                                {{$blog->date}}</p>
                        </div>
                        <h5 class="card-title">{{$blog->title}}</h5>
                        <p class="card-text">{{Str::limit($blog->description,150)}}</p>
                        <a class="btn-trans w-100" href="{{route('page.blogdetail',$blog->slug)}}"><span>Read More</span><i class="fa-solid fa-arrow-right-long ms-3"></i></a>
                    </div>
                </div>
            </div>
            @endforeach



    {{-- <div class="col-lg-4">
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
                            <a class="btn-trans w-100" href="{{route('page.blogdetail',$record->slug)}}"><span>Read More</span><i class="fa-solid fa-arrow-right-long ms-3"></i></a>
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
            <a class="btn-trans w-100" href="{{route('page.blogdetail',$record->slug)}}"><span>Read More</span><i class="fa-solid fa-arrow-right-long ms-3"></i></a>
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
            <a class="btn-trans w-100" href="{{route('page.blogdetail',$record->slug)}}"><span>Read More</span><i class="fa-solid fa-arrow-right-long ms-3"></i></a>
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
            <a class="btn-trans w-100" href="{{route('page.blogdetail',$record->slug)}}"><span>Read More</span><i class="fa-solid fa-arrow-right-long ms-3"></i></a>
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
            <a class="btn-trans w-100" href="{{route('page.blogdetail',$record->slug)}}"><span>Read More</span><i class="fa-solid fa-arrow-right-long ms-3"></i></a>
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
            <a class="btn-trans w-100" href="{{route('page.blogdetail',$record->slug)}}"><span>Read More</span><i class="fa-solid fa-arrow-right-long ms-3"></i></a>
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
            <a class="btn-trans w-100" href="{{route('page.blogdetail',$record->slug)}}"><span>Read More</span><i class="fa-solid fa-arrow-right-long ms-3"></i></a>
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
            <a class="btn-trans w-100" href="{{route('page.blogdetail',$record->slug)}}"><span>Read More</span><i class="fa-solid fa-arrow-right-long ms-3"></i></a>
        </div>
    </div>
</div>
</div>--}}
</div>
</div>
@endsection