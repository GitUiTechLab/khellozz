<div class="preloader">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="pre-img">
                <img src="{{asset('assets/img/logo.png')}}" alt="Logo">
            </div>
            <div class="spinner">
                <div class="circle1"></div>
                <div class="circle2"></div>
                <div class="circle3"></div>
            </div>
        </div>
    </div>
</div>
<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{route('page.homepage')}}"><img src="{{asset('assets/img/logo.png')}}" alt=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item" {{Request::is('/') ? 'active' : ''}}>
                        <a class="nav-link" aria-current="page" href="{{route('page.homepage')}}">Home</a>
                    </li>
                    <li class="nav-item" {{ Request::is('about') ? 'active' : '' }}>
                        <a class="nav-link" href="{{route('page.about')}}">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('page.sports')}}">Sports</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('page.events')}}">Events</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('page.contestants')}}">Contestants</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('page.playerAchievement')}}">Player Achievements</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('page.blog')}}">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('page.contact')}}">Contact</a>
                    </li>
                </ul> -->
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item ">
                    <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" aria-current="page" href="{{ route('page.homepage') }}">Home</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link {{ Request::is('about') ? 'active' : '' }}" href="{{ route('page.about') }}">About</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link {{ Request::is('sport') ? 'active' : '' }}" href="{{ route('page.sports') }}">Sports</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link {{ Request::is('event') ? 'active' : '' }}" href="{{ route('page.events') }}">Events</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link {{ Request::is('contestant') ? 'active' : '' }}" href="{{ route('page.contestants') }}">Contestants</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link {{ Request::is('playerAchievement') ? 'active' : '' }}" href="{{ route('page.playerAchievement') }}">Player Achievements</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('blog') ? 'active' : '' }}" href="{{ route('page.blog') }}">Blog</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link {{ Request::is('contact') ? 'active' : '' }}" href="{{ route('page.contact') }}">Contact</a>
                </li>
            </ul>

            <a href="{{route('page.registerone')}}"><button class="btn-white px-4 mb-1" data-text="Apply Now">Apply
                    Now</button></a>
        </div>
    </div>
</nav>