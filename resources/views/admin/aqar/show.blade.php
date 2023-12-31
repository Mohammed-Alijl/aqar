@extends('admin.layouts.master')
@section('title')
    {{__('admin/pages/aqars.show.aqar')}}
@endsection
@section('css')
    <!-- Internal Data table css -->
    <link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet"/>
    <link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet"/>
    <link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">

    <!-- default icons used in the plugin are from Bootstrap 5.x icon library (which can be enabled by loading CSS below) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.min.css"
          crossorigin="anonymous">

    <!-- the fileinput plugin styling CSS file -->
    <link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/css/fileinput.min.css" media="all"
          rel="stylesheet" type="text/css"/>
    <!-- bootstrap.bundle.min.js below is needed if you wish to zoom and preview file content in a detail modal
        dialog. bootstrap 5.x or 4.x is supported. You can also use the bootstrap js 3.3.x versions. -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
            crossorigin="anonymous"></script>
    <!-- the main fileinput plugin script JS file -->
    <style>
        /* Set the map container size */
        #map {
            height: 400px;
            width: 100%;
        }
    </style>
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{__('admin/pages/aqars.show.aqar')}}</h4>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                    <div class="card-body">
                        <div class="main-content-label mg-b-5">
                            {{__('admin/pages/aqars.show.aqar.from.here')}}
                        </div>
                        <p class="mg-b-20">{{__('admin/pages/aqars.add.aqar.step')}}</p>
                        <div id="show-aqar">
                            <h3>{{__('admin/pages/aqars.basic.info')}}</h3>
                            <section>
                                <div class="control-group form-group">
                                    <label class="form-label" for="title">{{__('admin/pages/aqars.title')}}</label>
                                    <input type="text" class="form-control required" id="title"
                                           placeholder="{{__('admin/pages/aqars.title')}}" name="title" required
                                           value="{{$aqar->title}}" disabled
                                           data-parsley-required-message="{{__('admin/pages/aqars.title.invalid')}}">
                                </div>
                                <div class="control-group form-group">
                                    <p class="mg-b-10">{{__('admin/pages/aqars.zone')}}
                                    </p>
                                    <select class="form-control select2" name="zone_id" id="zone" disabled>
                                            <option>{{$aqar->city->zone->name}}</option>
                                    </select>
                                </div>
                                <div class="control-group form-group">
                                    <p class="mg-b-10">{{__('admin/pages/aqars.city')}}
                                    </p>
                                    <select class="form-control select2" disabled>
                                        <option>{{$aqar->city->name}}</option>
                                    </select>
                                </div>
                                <div class="control-group form-group">
                                    <p class="mg-b-10">{{__('admin/pages/aqars.category')}}
                                    </p>
                                    <select class="form-control select2" name="category_id" id="category" disabled
                                            data-parsley-required-message="{{__('admin/pages/aqars.category.invalid')}}">
                                            <option>{{$aqar->category->name}}</option>
                                    </select>
                                </div>
                                <div class="control-group form-group">
                                    <label class="form-label"
                                           for="price">{{__('admin/pages/aqars.price')}}
                                    <input class="form-control" type="text" name="price" id="price" value="{{$aqar->price}}" disabled>
                                </div>
                                <div class="control-group form-group">
                                    <label class="form-label"
                                           for="description">{{__('admin/pages/aqars.description')}}</label>
                                    <textarea class="form-control" name="description" id="description" disabled
                                              rows="5">{{$aqar->description}}</textarea>
                                </div>
                                <input id="input-pd" data-show-upload="false" name="images[]" type="file" multiple disabled>
                            </section>
                            <h3>{{__('admin/pages/aqars.location')}}</h3>
                            <section>
                                <div id="map"></div>
                            </section>
                            <h3>{{__('admin/pages/aqars.attributes')}}</h3>
                            <section class="attributesContainer">
                                @foreach($aqar->attributes as $attribute)
                                    <div class="row">
                                        <div class="mb-3 col-md-12">
                                            <label class="form-label">{{$attribute->name}}</label>
                                            <select class="form-control" id="{{$attribute->name}}" disabled>
                                                @foreach($attribute->values as $value)
                                                    <option
                                                        {{$aqar->attributeValues->contains($value->id) ? 'selected' : ''}} value="{{$value->id}}">{{$value->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                @endforeach
                            </section>
                            <h3>{{__('admin/pages/aqars.contact.us')}}</h3>
                            <section>
                                <div class="control-group form-group">
                                    <label class="form-label"
                                           for="mobile_number">{{__('admin/pages/aqars.mobile_number')}}</label>
                                    <input class="form-control" type="text" name="mobile_number" id="mobile_number" maxlength="15" value="{{$aqar->mobile_number}}" disabled
                                           placeholder="{{__('admin/pages/aqars.mobile_number')}}">
                                </div>
                                <div class="control-group form-group">
                                    <label class="form-label"
                                           for="whatsapp_number">{{__('admin/pages/aqars.whatsapp_number')}}</label>
                                    <input class="form-control" type="text" name="whatsapp_number" id="whatsapp_number" maxlength="15"
                                           value="{{$aqar->whatsapp_number}}" disabled
                                           placeholder="{{__('admin/pages/aqars.whatsapp_number')}}">
                                </div>
                                <div class="control-group form-group">
                                    <label class="form-label"
                                           for="email">{{__('admin/pages/aqars.email')}}</label>
                                    <input class="form-control" type="email" name="email" id="email" value="{{$aqar->email}}" disabled
                                           placeholder="{{__('admin/pages/aqars.email')}}">
                                </div>
                            </section>
                            <h3>{{__('admin/pages/aqars.related.aqars')}}</h3>
                            <section>
                                <select class="form-control select2" multiple="multiple" style="width: 100%" disabled>
                                    @foreach($aqar->related as $theAqar)
                                        <option selected>{{$theAqar->title}}</option>
                                    @endforeach
                                </select>
                            </section>
                        </div>
                    </div>
                <div id="translations"
                     data-next="{{__('admin/pages/aqars.next')}}"
                     data-previous="{{__('admin/pages/aqars.previous')}}"
                     data-finish="{{__('admin/pages/aqars.finish')}}"
                >
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script
        src="https://maps.googleapis.com/maps/api/js?key={{config('services.google.key')}}&libraries=places&callback=initMap"
        async defer></script>
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/fileinput.min.js"></script>


    <script>

        function initMap() {
            const myLatLng = {lat: {{$aqar->latitude}}, lng: {{$aqar->longitude}}};
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 8,
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
                    scale: 35
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




    </script>
    <!--Internal  Select2 js -->
    <script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
    <!-- Internal Jquery.steps js -->
    <script src="{{URL::asset('assets/plugins/jquery-steps/jquery.steps.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/parsleyjs/parsley.min.js')}}"></script>
    <!--Internal  Form-wizard js -->
    <script src="{{URL::asset('assets/js/form-wizard.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
    <!--Internal  jquery.maskedinput js -->
    <script src="{{URL::asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js')}}"></script>
    <!--Internal  spectrum-colorpicker js -->
    <script src="{{URL::asset('assets/plugins/spectrum-colorpicker/spectrum.js')}}"></script>
    <!--Internal Ion.rangeSlider.min js -->
    <script src="{{URL::asset('assets/plugins/ion-rangeslider/js/ion.rangeSlider.min.js')}}"></script>
    <!--Internal  jquery-simple-datetimepicker js -->
    <script src="{{URL::asset('assets/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js')}}"></script>
    <!-- Ionicons js -->
    <script src="{{URL::asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js')}}"></script>
    <!--Internal  pickerjs js -->
    <script src="{{URL::asset('assets/plugins/pickerjs/picker.min.js')}}"></script>
    <!-- Internal form-elements js -->
    <script src="{{URL::asset('assets/js/form-elements.js')}}"></script>


    <script>
        $("#input-pd").fileinput({
            // minFileCount: 1,
            overwriteInitial: true,
            initialPreview: [
                @foreach($aqar->attachments as $attachment)
                    "{{ asset('storage/attachment/' . $attachment->path) }}",
                @endforeach
            ],
            initialPreviewConfig: [
                    @foreach($aqar->attachments as $attachment)
                {
                    caption: '{{ $attachment->path }}',
                },
                @endforeach
            ],
            initialPreviewAsData: true,
            initialPreviewShowDelete: false,
        });
    </script>


@endsection
