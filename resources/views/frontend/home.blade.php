@extends('frontend.layouts.master')
@section('title','دليلcom')
@section('content')
    <div class="home-page">
        <div class="slider">
            <h1 class="title">
                عروض حصرية على العقارات تنتظرك هنا
            </h1>

            <div class="search-box">
                <form action="{{ route('filter_results') }}" class="search-form" method="GET">
                    <div class="d-flex search-input-btn w-100">
                        <div class="flex-grow-1">
                            <input type="text" class="search-field" placeholder="بحث..." name="search" value="" required autocomplete="off">
                        </div>
                        <div>
                            <button class="btn" type="submit">
                                <svg>
                                    <use href="{{asset('frontend/icons.svg#search')}}"></use>
                                </svg>
                            </button>
                        </div>
                    </div>
                </form>
                <!-- Button trigger modal -->
                <button type="button" class="btn filter-btn" data-bs-toggle="modal" data-bs-target="#filterModal">
                    <svg>
                        <use href="{{asset('frontend/icons.svg#filter')}}"></use>
                    </svg>
                </button>

                <!-- Modal -->
                <div class="modal fade fillter-modal" id="filterModal" tabindex="-1" aria-labelledby="filterModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="search-box">
                                    <form action="{{ route('filter_results') }}" class="search-form" method="GET">
                                        <div class="d-flex search-input-btn w-100">
                                            <div class="flex-grow-1">
                                                <input type="text" class="search-field" placeholder="بحث..."
                                                       name="search" value="" autocomplete="off">
                                            </div>
                                            <div>
                                                <button class="btn" type="submit">
                                                    <svg>
                                                        <use href="{{asset('frontend/icons.svg#search')}}"></use>
                                                    </svg>
                                                </button>
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn filter-btn">
                                                    <svg>
                                                        <use href="{{asset('frontend/icons.svg#filter')}}"></use>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>

                                        <ul class="nav nav-tabs my-4" id="myTab" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link active" id="all-tab" data-bs-toggle="tab"
                                                        data-bs-target="#all" type="button" role="tab"
                                                        aria-controls="all"
                                                        aria-selected="true">الكل
                                                </button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="section-tab" data-bs-toggle="tab"
                                                        data-bs-target="#section" type="button" role="tab"
                                                        aria-controls="section"
                                                        aria-selected="false">القسم
                                                </button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="location-tab" data-bs-toggle="tab"
                                                        data-bs-target="#location" type="button" role="tab"
                                                        aria-controls="location"
                                                        aria-selected="false">الموقع
                                                </button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="price-tab" data-bs-toggle="tab"
                                                        data-bs-target="#price" type="button" role="tab"
                                                        aria-controls="price"
                                                        aria-selected="false">السعر
                                                </button>
                                            </li>
                                        </ul>
                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade show active" id="all" role="tabpanel"
                                                 aria-labelledby="all-tab">
                                                <div class="mb-3">
                                                    <h6>
                                                        القسم
                                                    </h6>
                                                    <div>
                                                        @foreach($categories as $category)
                                                            <label class="custom-radio">
                                                                <input type="checkbox" name="categories[]"
                                                                       value="{{$category->id}}">
                                                                <span class="check-btn">
                                                        <span class="check-icon">
                                                            <i class="fa-solid fa-check"></i>
                                                        </span>
                                                        <span> {{$category->name}} </span>
                                                    </span>
                                                            </label>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <h6>
                                                        الموقع
                                                    </h6>
                                                    <div>
                                                        @foreach($zones as $zone)
                                                            <label class="custom-radio">
                                                                <input type="checkbox" name="zones[]"
                                                                       value="{{$zone->id}}">
                                                                <span class="check-btn">
                                                        <span class="check-icon">
                                                            <i class="fa-solid fa-check"></i>
                                                        </span>
                                                        <span> {{$zone->name}} </span>
                                                    </span>
                                                            </label>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <h6>
                                                        السعر
                                                    </h6>
                                                    <div>
                                                        <label class="custom-radio">
                                                            <input type="checkbox" name="prices[]" value="{{$minPrice}}-{{$midPoint}}">
                                                            <span class="check-btn">
                                                        <span class="check-icon">
                                                            <i class="fa-solid fa-check"></i>
                                                        </span>
                                                        <span> {{$minPrice}} ريال - {{$midPoint}} ريال </span>
                                                    </span>
                                                        </label>
                                                        <label class="custom-radio">
                                                            <input type="checkbox" name="prices[]" value="{{$midPoint}}-{{$maxPrice}}">
                                                            <span class="check-btn">
                                                        <span class="check-icon">
                                                            <i class="fa-solid fa-check"></i>
                                                        </span>
                                                        <span> {{$midPoint}} ريال - {{$maxPrice}} ريال </span>
                                                    </span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="section" role="tabpanel"
                                                 aria-labelledby="section-tab">
                                                <h6>
                                                    القسم
                                                </h6>
                                                <div>
                                                    @foreach($categories as $category)
                                                        <label class="custom-radio">
                                                            <input type="checkbox" name="categories[]"
                                                                   value="{{$category->id}}">
                                                            <span class="check-btn">
                                                        <span class="check-icon">
                                                            <i class="fa-solid fa-check"></i>
                                                        </span>
                                                        <span> {{$category->name}} </span>
                                                    </span>
                                                        </label>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="location" role="tabpanel"
                                                 aria-labelledby="location-tab">
                                                <h6>
                                                    الموقع
                                                </h6>
                                                <div>
                                                    @foreach($zones as $zone)
                                                        <label class="custom-radio">
                                                            <input type="checkbox" name="zones[]" value="{{$zone->id}}">
                                                            <span class="check-btn">
                                                        <span class="check-icon">
                                                            <i class="fa-solid fa-check"></i>
                                                        </span>
                                                        <span> {{$zone->name}} </span>
                                                    </span>
                                                        </label>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="price" role="tabpanel"
                                                 aria-labelledby="price-tab">
                                                <h6>
                                                    السعر
                                                </h6>
                                                <div>
                                                    <label class="custom-radio">
                                                        <input type="checkbox" name="prices[]" value="1000-3000">
                                                        <span class="check-btn">
                                                    <span class="check-icon">
                                                        <i class="fa-solid fa-check"></i>
                                                    </span>
                                                    <span> 1000 ريال - 3000 ريال </span>
                                                </span>
                                                    </label>
                                                    <label class="custom-radio">
                                                        <input type="checkbox" name="prices[]" value="4000-6000">
                                                        <span class="check-btn">
                                                    <span class="check-icon">
                                                        <i class="fa-solid fa-check"></i>
                                                    </span>
                                                    <span> 4000 ريال - 6000 ريال </span>
                                                </span>
                                                    </label>
                                                    <label class="custom-radio">
                                                        <input type="checkbox" name="prices[]" value="7000-8000">
                                                        <span class="check-btn">
                                                    <span class="check-icon">
                                                        <i class="fa-solid fa-check"></i>
                                                    </span>
                                                    <span> 7000 ريال - 8000 ريال </span>
                                                </span>
                                                    </label>
                                                    <label class="custom-radio">
                                                        <input type="checkbox" name="prices[]" value="9000-10000">
                                                        <span class="check-btn">
                                                    <span class="check-icon">
                                                        <i class="fa-solid fa-check"></i>
                                                    </span>
                                                    <span> 9000 ريال - 10000 ريال </span>
                                                </span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @foreach(\App\Models\Category::where('display_main',1)->orderBy('display_order')->get() as $category)
            <div class="category-{{$category->id}} paddingY-section">
                <div class="container">
                    <div class="section-header mb-4">
                        <div class="d-flex align-items-center justify-content-start">
                            <svg>
                                <use href="{{asset('frontend/icons.svg#aqar')}}"></use>
                            </svg>
                            <h3 class="m-0">
                                {{$category->name}}
                            </h3>
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                            <h6 class="m-md-0 mt-3">تصفح واحصل على عقارك بكل سهولة</h6>
                            <div>
                                <button type="button" id="list-1-{{$category->id}}"
                                        class="btn list-formate-btn list-1-property">
                                    <svg>
                                        <use href="{{asset('frontend/icons.svg#listFormat1')}}"></use>
                                    </svg>
                                </button>
                                <button type="button" id="list-2-{{$category->id}}"
                                        class="btn list-formate-btn list-2-property active">
                                    <svg>
                                        <use href="{{asset('frontend/icons.svg#listFormat2')}}"></use>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="cards-list">
                        @foreach($category->aqars as $aqar)
                            <div class="aqar-card pb-2" id='1'>
                                <div class="aqar-card-img">
                                    <a href="{{route('aqar',$aqar->id)}}">
                                        <img src="{{asset("storage/attachment/" . $aqar->attachments->first()->path)}}"
                                             class="card-img-top" alt=" ">
                                    </a>
                                </div>
                                <div class="card-body">
                                    <p class="location">
                                        <svg>
                                            <use href="{{asset('frontend/icons.svg#location')}}"></use>
                                        </svg>
                                        {{\App\Models\Country::first()->name . " - " . $aqar->city->name}}
                                    </p>
                                    <a href="{{route('aqar',$aqar->id)}}" class="card-title">
                                        <h5 class="mb-3">{{$aqar->title}}</h5>
                                    </a>
                                    <p class="price">
                                        {{$aqar->price}} ريال
                                    </p>
                                    <p class="info m-0">
                                        {{$aqar->description}}
                                    </p>
                                </div>

                            </div>
                        @endforeach
                        <div class="loading w-100 text-center">
                            <div class="lds-ring">
                                <div></div>
                                <div></div>
                                <div></div>
                                <div></div>
                            </div>
                        </div>
                        <div class="mt-4 w-100">
                            <button type="button" class="btn-border btn-more">
                                المزيد
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="container">
            <div class="paddingY-section">
                <div class="contact-us">
                    <div class="d-flex align-items-center justify-content-start flex-wrap">
                        <a href="#" class="btn btn-border">
                            <svg>
                                <use href="{{asset('frontend/icons.svg#calling')}}"></use>
                            </svg>
                            تواصل معنا
                        </a>
                        <div class="mt-4 mt-md-0">
                            <h2 class="mb-4">
                                تبحث عن منزل الأحلام؟
                            </h2>
                            <h4>
                                يمكننا مساعدتك في تحقيق حلمك بمنزل جديد
                            </h4>
                        </div>
                    </div>

                    <div>
                        <img src="{{asset('frontend/img/contact.png')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="choosing paddingY-section">
            <div class="container">
                <div class="section-header mb-5 text-center">
                    <h3 class="mb-3 fw-bolder">
                        لماذا أخترتنا؟
                    </h3>
                    <h6 class="m-0">
                        ابحث واحصل على افضل العقارات
                    </h6>
                </div>
                <div class="choosing-list">
                    <div class="choose-card">
                        <div class="card-svg mb-4">
                            <svg>
                                <use href="{{asset('frontend/icons.svg#buildings')}}"></use>
                            </svg>
                        </div>

                        <h4>
                            عقارات فاخرة
                        </h4>
                        <p>
                            نحن ندرك الأفكار من البسيطة إلى المعقدة، ويصبح كل شيء سهل الاستخدام.
                        </p>
                    </div>
                    <div class="choose-card">
                        <div class="card-svg mb-4">
                            <svg>
                                <use href="{{asset('frontend/icons.svg#support')}}"></use>
                            </svg>
                        </div>
                        <h4>
                            دعم 24/7
                        </h4>
                        <p>
                            فريق تجربة العملاء لدينا متاح على
                            مدار الساعة للإجابة على
                            أسئلتك
                        </p>
                    </div>
                    <div class="choose-card">
                        <div class="card-svg mb-4">
                            <svg>
                                <use href="{{asset('frontend/icons.svg#map')}}"></use>
                            </svg>
                        </div>
                        <h4>
                            أفضل دليل
                        </h4>
                        <p>
                            يعرف مرشدنا الخبير أفضل ما يتعلق بالعقارات وسيقوم بإرشادك طوال الوقت
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        @foreach(\App\Models\Category::where('display_main',1)->orderBy('display_order')->get() as $category)
        // show more aqar
        var showMoreProperty = 1;
        $(".category-{{$category->id}} .aqar-card")
            .hide()
            .slice(0, showMoreProperty * 3)
            .show();
        $('.category-{{$category->id}} .loading').hide();
        $('.category-{{$category->id}} .btn-more').on('click', function () {
            $('.category-{{$category->id}} .loading').show();
            setTimeout(function () {
                $('.category-{{$category->id}} .loading').hide();
            }, 3000);
            showMoreProperty++;
            setTimeout(function () {
                $(".category-{{$category->id}} .aqar-card")
                    .hide()
                    .slice(0, showMoreProperty * 3)
                    .show();
            }, 3500)

        })

        // switch format card list
        $('#list-1-{{$category->id}}').on('click', function () {
            $('.category-{{$category->id}} .aqar-card').addClass('list-card');
        })
        $('#list-2-{{$category->id}}').on('click', function () {
            $('.category-{{$category->id}} .aqar-card').removeClass('list-card');
        })
        @endforeach

        // Live Search Ajax Code
        $(document).ready(function () {
            $('.search-field').on('input', function () {
                var searchText = $(this).val().trim();

                if (searchText !== '') {
                    $.ajax({
                        url: "{{ route('search_suggestions') }}",
                        type: "GET",
                        data: {search: searchText},
                        success: function (data) {
                            // The Data Is The Result Of Live Search It Should Display By The Front End
                            console.log(data)
                        }
                    });
                }else {
                    // Here Should Clear The List Because There Is No Any Result
                }
            });
        });
    </script>
@endsection
