<!doctype html>
<html lang="ar" dir="rtl">
<head>
    @include('frontend.layouts.head')
</head>

<body>
@include('frontend.layouts.header')
@yield('content')
<div class="contact">
    <a href="#">
        <img src="{{asset('frontend/img/whatsapp.svg')}}" alt="">
    </a>
</div>
@include('frontend.layouts.footer')
@include('frontend.layouts.footer-scripts')
</body>
</html>
