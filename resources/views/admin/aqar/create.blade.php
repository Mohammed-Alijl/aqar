@extends('admin.layouts.master')
@section('title')
    {{__('admin/pages/aqars.add.aqar')}}
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
    <!-- if using RTL (Right-To-Left) orientation, load the RTL CSS file after fileinput.css by uncommenting below -->
    <!-- link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/css/fileinput-rtl.min.css" media="all" rel="stylesheet" type="text/css" /-->
    <!-- the jQuery Library -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
    <!-- buffer.min.js and filetype.min.js are necessary in the order listed for advanced mime type parsing and more correct
         preview. This is a feature available since v5.5.0 and is needed if you want to ensure file mime type is parsed
         correctly even if the local file's extension is named incorrectly. This will ensure more correct preview of the
         selected file (note: this will involve a small processing overhead in scanning of file contents locally). If you
         do not load these scripts then the mime type parsing will largely be derived using the extension in the filename
         and some basic file content parsing signatures. -->
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/plugins/buffer.min.js"
            type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/plugins/filetype.min.js"
            type="text/javascript"></script>
    <!-- piexif.min.js is needed for auto orienting image files OR when restoring exif data in resized images and when you
        wish to resize images before upload. This must be loaded before fileinput.min.js -->
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/plugins/piexif.min.js"
            type="text/javascript"></script>
    <!-- sortable.min.js is only needed if you wish to sort / rearrange files in initial preview.
        This must be loaded before fileinput.min.js -->
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/plugins/sortable.min.js"
            type="text/javascript"></script>
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
                <h4 class="content-title mb-0 my-auto">{{__('admin/pages/aqars.add.aqar')}}</h4>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <form action="{{route('aqars.store')}}" method="post" enctype="multipart/form-data" data-parsley-validate>
                    @csrf
                    <div class="card-body">
                        <div class="main-content-label mg-b-5">
                            {{__('admin/pages/aqars.add.aqar.from.here')}}
                        </div>
                        <p class="mg-b-20">{{__('admin/pages/aqars.add.aqar.step')}}</p>
                        <div id="add-aqar">
                            <h3>{{__('admin/pages/aqars.basic.info')}}</h3>
                            <section>
                                <div class="control-group form-group">
                                    <label class="form-label" for="title">{{__('admin/pages/aqars.title')}} <span
                                            class="tx-danger">*</span></label>
                                    <input type="text" class="form-control required" id="title"
                                           placeholder="{{__('admin/pages/aqars.title')}}" name="title" required
                                           data-parsley-required-message="{{__('admin/pages/aqars.title.invalid')}}">
                                </div>
                                <div class="control-group form-group">
                                    <p class="mg-b-10">{{__('admin/pages/aqars.zone')}} <span class="tx-danger">*</span>
                                    </p>
                                    <select class="form-control select2" name="zone_id" id="zone" required
                                            data-parsley-required-message="{{__('admin/pages/aqars.zone.invalid')}}">
                                        <option disabled selected label="{{__('admin/pages/aqars.choose')}}">
                                            {{__('admin/pages/aqars.choose')}}
                                        </option>
                                        @foreach($zones as $zone)
                                            <option value="{{$zone->id}}">{{$zone->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="control-group form-group">
                                    <p class="mg-b-10">{{__('admin/pages/aqars.category')}} <span class="tx-danger">*</span>
                                    </p>
                                    <select class="form-control select2" name="category_id" id="category" required
                                            data-parsley-required-message="{{__('admin/pages/aqars.category.invalid')}}">
                                        <option disabled selected label="{{__('admin/pages/aqars.choose')}}">
                                            {{__('admin/pages/aqars.choose')}}
                                        </option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="control-group form-group">
                                    <label class="form-label"
                                           for="description">{{__('admin/pages/aqars.description')}}</label>
                                    <textarea class="form-control" name="description" id="description"
                                              rows="5"></textarea>
                                </div>
                                <input id="input-b3" name="attachments[]" type="file" class="file" multiple required
                                       data-show-upload="false" data-show-caption="true"
                                       data-msg-placeholder="{{__('admin/pages/aqars.add.images.videos')}}">
                            </section>
                            <h3>{{__('admin/pages/aqars.location')}}</h3>
                            <section>
                                <div id="map"></div>
                                <input type="hidden" name="latitude" id="latitude">
                                <input type="hidden" name="longitude" id="longitude">
                            </section>
                            <h3>{{__('admin/pages/aqars.attributes')}}</h3>
                            <section class="attributesContainer">
                                <div class="control-group form-group">
                                    <p class="mg-b-10">{{__('admin/pages/aqars.attributes')}}</p>
                                    <select id="inputAttributes" class="form-control select2"  style="width: 100%">
                                        <option disabled selected label="{{__('admin/pages/aqars.choose')}}">
                                            {{__('admin/pages/aqars.choose')}}
                                        </option>
                                        @foreach($attributes as $attribute)
                                            <option value="{{$attribute->id}}">{{$attribute->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </section>
                            <h3>{{__('admin/pages/aqars.related.aqars')}}</h3>
                            <section>
                                <select class="form-control select2" multiple="multiple" style="width: 100%">
                                    @foreach($aqars as $aqar)
                                    <option value="{{$aqar->id}}">{{$aqar->title}}</option>
                                    @endforeach
                                </select>
                            </section>
                        </div>
                    </div>
                </form>
                <div id="translations"
                     data-next="{{__('admin/pages/aqars.next')}}"
                     data-previous="{{__('admin/pages/aqars.previous')}}">
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script
        src="https://maps.googleapis.com/maps/api/js?key={{config('services.google.key')}}&libraries=places&callback=initMap"
        async defer></script>

    <script>
        $("#input-b3").fileinput({
            minFileCount: 1,
            theme: 'fas',
            allowedFileExtensions: ["jpg", "jpeg", "png", "svg", 'mp4', 'mpeg'],
            showUpload: false,
            browseOnZoneClick: true,
        });

        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: 23.8859, lng: 45.0792},
                zoom: 8
            });

            var marker = new google.maps.Marker({
                map: map,
            });

            map.addListener('click', function (event) {
                marker.setPosition(event.latLng);
                document.getElementById('latitude').value = event.latLng.lat();
                document.getElementById('longitude').value = event.latLng.lng();
            });
        }




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

    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/fileinput.min.js"></script>

    <script>
        $(document).ready(function () {
            var container = document.querySelector(".attributesContainer");
            var selectedAttributes = [];
            $('#inputAttributes').on('change', function () {
                var selectedAttributeId = $(this).val();
                var selectedAttributeName = $(this).find('option:selected').text();

                // Check if the selected option is already added to the container
                if (selectedAttributeId && selectedAttributeName && !selectedAttributes.includes(selectedAttributeId)) {
                    var row = document.createElement("div");
                    row.classList.add("row");

                    let selectedAttributeContainer = document.createElement('div');
                    selectedAttributeContainer.classList.add('mb-3', 'col-md-9');
                    let selectedAttributeLabel = document.createElement('label');
                    selectedAttributeLabel.textContent = selectedAttributeName;
                    selectedAttributeLabel.classList.add('form-label');
                    selectedAttributeLabel.setAttribute('for', `${selectedAttributeName}${selectedAttributeId}`)
                    let selectedAttributeBox = document.createElement('select');
                    selectedAttributeBox.classList.add('form-control');
                    selectedAttributeBox.name = 'values[]';
                    selectedAttributeBox.id = `${selectedAttributeName}${selectedAttributeId}`;
                    let attributeId = document.createElement('input');
                    attributeId.type = 'hidden';
                    attributeId.name = 'attributes[]';
                    attributeId.setAttribute('value', selectedAttributeId);
                    selectedAttributeContainer.appendChild(selectedAttributeLabel);
                    selectedAttributeContainer.appendChild(selectedAttributeBox);
                    selectedAttributeContainer.appendChild(attributeId);



                    let removeAttributeButtonContainer = document.createElement('div');
                    removeAttributeButtonContainer.classList.add('mb-3', 'col-md-3');
                    let removeAttributeButton = document.createElement("button");
                    removeAttributeButton.classList.add("btn", "btn-danger", "delete-discount");
                    removeAttributeButton.innerHTML = '<i class="fas fa-times"></i>';
                    removeAttributeButton.style.cssText = 'margin-top:30px';
                    removeAttributeButtonContainer.appendChild((removeAttributeButton));

                    row.appendChild(selectedAttributeContainer);
                    row.appendChild(removeAttributeButtonContainer);
                    container.appendChild(row);
                    selectedAttributes.push(selectedAttributeId)
                    getAttributeValues(selectedAttributeId,selectedAttributeName + selectedAttributeId);


                    removeAttributeButton.addEventListener('click', function (event) {
                        event.preventDefault();
                        var index = selectedAttributes.indexOf(selectedAttributeId);
                        if (index > -1) {
                            row.remove();
                            selectedAttributes.splice(index, 1);
                        }
                    });
                }
            });
        });
        function getAttributeValues(attributeId,selectId) {
            $.ajax({
                url: "{{ URL::to('admin/attribute-values') }}/" + attributeId,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    $.each(data, function (key, value) {
                        var option = document.createElement('option');
                        option.value = key;
                        option.textContent = value;
                        document.getElementById(selectId).append(option);
                    });
                },
            });
        }
    </script>


@endsection
