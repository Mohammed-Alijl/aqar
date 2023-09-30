@extends('frontend.layouts.master')
@section('title','دليلcom')
@section('content')
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
                                {{"السعودية - " . $aqar->zone->name}}
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
@endsection
@section('scripts')
    <script>
        // show more aqar
        var showMoreProperty = 1;
        $(".category-{{$category->id}} .aqar-card")
            .hide()
            .slice(0, showMoreProperty * 6)
            .show();
        $('.category-{{$category->id}} .loading').hide();
        $('.category-{{$category->id}} .btn-more').on('click', function () {
            $('.category-{{$category->id}} .loading').show();
            setTimeout(function () {
                $('.category-{{$category->id}} .loading').hide();
            }, 5000);
            showMoreProperty++;
            setTimeout(function () {
                $(".category-{{$category->id}} .aqar-card")
                    .hide()
                    .slice(0, showMoreProperty * 6)
                    .show();
            }, 500)

        })

        // switch format card list
        $('#list-1-{{$category->id}}').on('click', function () {
            $('.category-{{$category->id}} .aqar-card').addClass('list-card');
        })
        $('#list-2-{{$category->id}}').on('click', function () {
            $('.category-{{$category->id}} .aqar-card').removeClass('list-card');
        })
    </script>
@endsection
