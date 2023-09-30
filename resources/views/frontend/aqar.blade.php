@extends('frontend.layouts.master')
@section('title','دليلcom')
@section('head')
    <style>
        /* Set the map container size */
        #map {
            height: 400px;
            width: 100%;
        }
    </style>
@endsection
@section('content')
    <!-- page content -->
    <div class="aqar-page">
        <div class="container">
            <div class="photos pb-4 pt-5">
                <div>
                    <img src="{{asset('frontend/img/product-1.png')}}" alt="">
                </div>
                <div>
                    <div class="mb-md-4">
                        <img src="{{asset('frontend/img/product-1.png')}}" alt="">
                    </div>
                    <div class="">
                        <img src="{{asset('frontend/img/product-1.png')}}" alt="">
                    </div>
                </div>
                <div class="photos-num">
                    <span>
                        {{$aqar->attachments->count()}} صور
                    </span>
                    <svg>
                        <use href="{{asset('frontend/icons.svg#gallery')}}"></use>
                    </svg>
                </div>
            </div>
            <div class="info mb-5">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <p class="m-0 location">
                        <svg>
                            <use href="{{asset('frontend/icons.svg#location')}}"></use>
                        </svg>
                        {{\App\Models\Country::first()->name . ' ' . $aqar->city->name}}
                    </p>

                    <p class="m-0">
                        <span class="me-3">
                            <svg>
                                <use href="{{asset('frontend/icons.svg#eye')}}"></use>
                            </svg>
                            {{$aqar->watches}}
                        </span>
                        <a href="#" id="share-button">
                            <svg>
                                <use href="{{asset('frontend/icons.svg#share')}}"></use>
                            </svg>
                        </a>
                    </p>
                </div>
                <h3 class="price mb-4">
                    {{$aqar->price}} ريال
                </h3>
                <h2 class="name">
                    {{$aqar->title}}
                </h2>
                <p>
                    {{$aqar->description}}
                </p>
            </div>
            <div class="details">
                <h5>
                    التفاصيل
                </h5>
                <ul class="details-list">
                    @foreach($aqar->attributeValues as $value)
                        <li>
                        <span>
                            <i class="fa-solid fa-circle"></i>
                            {{$value->attribute->name}}
                        </span>
                            <span>{{$value->name}}</span>
                        </li>
                    @endforeach
                </ul>

            </div>
            @if($aqar->email || $aqar->whatsapp_number || $aqar->mobile_number)
                <div class="contact-us paddingY-section">
                    <h4 class="mb-4">
                        تواصل معنا
                    </h4>
                    <ul class="contact-list">
                        @if($aqar->mobile_number)
                            <li>
                                <a href="tel:{{$aqar->mobile_number}}" class="calling">
                                    <svg>
                                        <use href="{{asset('frontend/icons.svg#calling')}}"></use>
                                    </svg>
                                </a>
                            </li>
                        @endif
                        @if($aqar->email)
                            <li>
                                <a href="mailto:{{$aqar->email}}" class="gmail">
                                    <svg>
                                        <use href="{{asset('frontend/icons.svg#gmail')}}"></use>
                                    </svg>
                                </a>
                            </li>
                        @endif
                        @if($aqar->whatsapp_number)
                            <li>
                                <a href="https://wa.me/{{$aqar->whatsapp_number}}" target="_blank" class="whatsapp">
                                    <svg>
                                        <use href="{{asset('frontend/icons.svg#whatsapp')}}"></use>
                                    </svg>
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>
            @endif
            <div class="location paddingY-section">
                <h4 class="mb-4">
                    الموقع
                </h4>
                <div id="map"></div>
            </div>
            <div class="more-adver paddingY-section">
                <h4 class="mb-4">
                    اعلانات مشابهة
                </h4>
                <div class="cards-list">
                    @foreach($aqar->related as $relatedAqar)
                        <div class="aqar-card pb-2" id='1'>
                            <div class="aqar-card-img">
                                <a href="{{route('aqar',$relatedAqar->id)}}">
                                    <img
                                        src="{{asset('storage/attachment/' . $relatedAqar->attachments->first()->path)}}"
                                        class="card-img-top" alt="related aqar">
                                </a>
                            </div>
                            <div class="card-body">
                                <p class="location">
                                    <svg>
                                        <use href="{{asset('frontend/icons.svg#location')}}"></use>
                                    </svg>
                                    السعودية - {{$aqar->zone->name}}
                                </p>
                                <a href="{{route('aqar',$relatedAqar->id)}}" class="card-title">
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

                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script
        src="https://maps.googleapis.com/maps/api/js?key={{config('services.google.key')}}&libraries=places&callback=initMap"
        async defer></script>
    <script>
    // Display Google Map And Marker In Page
        function initMap() {
            const myLatLng = {lat: {{$aqar->latitude}}, lng: {{$aqar->longitude}}};
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 50,
                center: myLatLng,
            });

            var outerCircleMarker = new google.maps.Marker({
                position: myLatLng,
                map: map,
                icon: {
                    path: google.maps.SymbolPath.CIRCLE,
                    fillColor: 'black',
                    strokeColor: 'black',
                    strokeOpacity: 0.1,
                    scale: 50
                }
            });

            var marker = new google.maps.Marker({
                position: myLatLng,
                map: map,
                icon: {
                    path: google.maps.SymbolPath.CIRCLE,
                    fillColor: 'white',
                    strokeColor: 'black',
                    strokeWeight: 8,
                    scale: 8
                }
            });
        }

        window.initMap = initMap;

        // Make Native Share
        const shareButton = document.getElementById('share-button');
        if (navigator.share) {
            shareButton.addEventListener('click', async () => {
                try {
                    await navigator.share({
                        title: 'شارك هذا العقار!',
                        text: 'شارك هذا العقار مع الاخرين الان!',
                        url: '{{route('aqar',$aqar->id)}}'
                    });
                } catch (error) {
                    console.error('Error sharing:', error);
                }
            });
        } else {
            shareButton.addEventListener('click', () => {
                alert('عذرا هذا المتصفح لا يدعم المشاركة الرجاء استخدام متصفح اخر');
            });
        }
    </script>
@endsection
