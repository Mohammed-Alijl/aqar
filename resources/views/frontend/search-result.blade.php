@extends('frontend.layouts.master')
@section('title','دليلcom')
@section('content')
    <div class="category paddingY-section home-page">
        <div class="container">
            <div class="section-header mb-4">
                <div class="d-flex align-items-center justify-content-start">
                    <svg>
                        <use href="{{asset('frontend/icons.svg#aqar')}}"></use>
                    </svg>
                    <h3 class="m-0">
                        نتائج البحث:
                    </h3>
                </div>
                <div class="d-flex align-items-center justify-content-between">
                    @if(count($results) > 0)
                    <h6 class="m-md-0 mt-3">تصفح واحصل على عقارك بكل سهولة</h6>
                    <div>
                        <button type="button" id="list-1"
                                class="btn list-formate-btn list-1-property">
                            <svg>
                                <use href="{{asset('frontend/icons.svg#listFormat1')}}"></use>
                            </svg>
                        </button>
                        <button type="button" id="list-2"
                                class="btn list-formate-btn list-2-property active">
                            <svg>
                                <use href="{{asset('frontend/icons.svg#listFormat2')}}"></use>
                            </svg>
                        </button>
                    </div>
                    @endif
                </div>
            </div>
            <div class="cards-list">
                @if(count($results) > 0)
                    @foreach($results as $aqar)
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
                @else
                    <h3>عذرا, لا يوجد أي نتائج</h3>
                @endif

            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        // show more aqar
        var showMoreProperty = 1;
        $(".category .aqar-card")
            .hide()
            .slice(0, showMoreProperty * 6)
            .show();
        $('.category .loading').hide();
        $('.category .btn-more').on('click', function () {
            $('.category .loading').show();
            setTimeout(function () {
                $('.category .loading').hide();
            }, 3000);
            showMoreProperty++;
            setTimeout(function () {
                $(".category .aqar-card")
                    .hide()
                    .slice(0, showMoreProperty * 6)
                    .show();
            }, 3500)

        })

        // switch format card list
        $('#list-1').on('click', function () {
            $('.category .aqar-card').addClass('list-card');
        })
        $('#list-2').on('click', function () {
            $('.category .aqar-card').removeClass('list-card');
        })
    </script>
@endsection
