<!-- Header Area -->
<header class="header">
    <div class="container">
        <div class="navHeader d-flex align-items-center justify-content-between">
            <div class="logo text-center">
                <a href="{{route('home')}}">
                    <img src="{{asset('frontend/img/logo.png')}}" alt="logo">
                </a>
            </div>
            <div class="menu-list">
                <ul class="nav">
                    <li class="nav-item {{request()->route()->named(['home']) ? 'active' : ''}}">
                        <a href="{{route('home')}}">
                            الرئيسية
                        </a>
                    </li>
                    @foreach(\App\Models\Category::where('display_main',1)->orderBy('display_order')->get() as $category)
                        <li class="nav-item {{ request()->is('categories/' . $category->slug) ? 'active' : '' }}">
                            <a href="{{route('category.show',$category->slug)}}">
                                {{$category->name}}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="contact-us{{request()->route()->named('home') ? '-header' : ''}}">
                <a href="http://api.whatsapp.com/send?phone=966551800307" class="btn btn-border">
                    <svg>
                        <use href="{{asset('frontend/icons.svg#calling')}}"></use>
                    </svg>
                    تواصل معنا </a>
            </div>
            <div class="menu-btn">
                <i class="fa-solid fa-bars"></i>
            </div>
        </div>
    </div>
</header>
<!-- End Header Area -->



