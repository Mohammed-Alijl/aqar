<!doctype html>
<html lang="ar" dir="rtl">
<head>
    @include('frontend.layouts.head')
</head>

<body>

<div class="overlay">
</div>
@include('frontend.layouts.mobile-navbar')
<div class="home-page">
    <div class="header-page">
        @include('frontend.layouts.header')
        @yield('slider')
    </div>
@yield('content')
</div>
<div class="contact">
    <a href="http://api.whatsapp.com/send?phone=966551800307">
        <img src="{{asset('frontend/img/whatsapp.svg')}}" alt="">
    </a>
</div>
@include('frontend.layouts.footer')
@include('frontend.layouts.footer-scripts')
</body>
</html>
