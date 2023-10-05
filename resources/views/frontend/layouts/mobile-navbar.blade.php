<!-- Mobile Navbar -->
<div class="mobile-navbar">
    <div class="w-100">
        <div class="close-btn d-flex align-items-center justify-content-end mb-4">
            <button class="btn">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        <div class="menu-list mb-4">
            <ul class="nav">
                <li class="nav-item {{request()->route()->named(['home']) ? 'active' : ''}}">
                    <a href="{{route('home')}}">
                        الرئيسية </a>
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
        <div class="contact-us">
            <a href="#" class="btn btn-border">
                <svg>
                    <use href="{{asset('frontend/icons.svg#calling')}}"></use>
                </svg>
                تواصل معنا </a>
        </div>
    </div>
</div>
