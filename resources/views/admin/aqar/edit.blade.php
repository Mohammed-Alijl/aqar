@extends('admin.layouts.master')
@section('title')
    {{__('admin/pages/aqars.edit.aqar')}}
@endsection
@section('css')
    <!-- Internal Data table css -->
    <link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet"/>
    <link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet"/>
    <link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">


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
                <h4 class="content-title mb-0 my-auto">{{__('admin/pages/aqars.edit.aqar')}}</h4>
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
                <form action="{{route('aqars.update',$aqar->id)}}" method="post" enctype="multipart/form-data"
                      data-parsley-validate>
                    @csrf
                    @method('put')
                    <div class="card-body">
                        <div class="main-content-label mg-b-5">
                            {{__('admin/pages/aqars.edit.aqar.from.here')}}
                        </div>
                        <p class="mg-b-20">{{__('admin/pages/aqars.add.aqar.step')}}</p>
                        <div id="edit-aqar">
                            <h3>{{__('admin/pages/aqars.basic.info')}}</h3>
                            <section>
                                <div class="control-group form-group">
                                    <label class="form-label" for="title">{{__('admin/pages/aqars.title')}} <span
                                            class="tx-danger">*</span></label>
                                    <input type="text" class="form-control required" id="title"
                                           placeholder="{{__('admin/pages/aqars.title')}}" name="title" required
                                           value="{{$aqar->title}}"
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
                                            <option
                                                value="{{$zone->id}}" {{$zone->id === $aqar->city->zone->id ? 'selected' : ''}}>{{$zone->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="control-group form-group">
                                    <p class="mg-b-10">{{__('admin/pages/aqars.city')}} <span class="tx-danger">*</span>
                                    </p>
                                    <select class="form-control select2" name="city_id" id="city" required
                                            data-parsley-required-message="{{__('admin/pages/aqars.city.invalid')}}">
                                        <option disabled selected label="{{__('admin/pages/aqars.choose')}}">
                                            {{__('admin/pages/aqars.choose')}}
                                        </option>
                                        @foreach($aqar->city->zone->cities as $city )
                                            <option value="{{$city->id}}" {{$aqar->city->id === $city->id ? 'selected' : ''}}>
                                                {{$city->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="control-group form-group">
                                    <p class="mg-b-10">{{__('admin/pages/aqars.category')}} <span
                                            class="tx-danger">*</span>
                                    </p>
                                    <select class="form-control select2" name="category_id" id="category" required
                                            data-parsley-required-message="{{__('admin/pages/aqars.category.invalid')}}">
                                        <option disabled selected label="{{__('admin/pages/aqars.choose')}}">
                                            {{__('admin/pages/aqars.choose')}}
                                        </option>
                                        @foreach($categories as $category)
                                            <option
                                                value="{{$category->id}}" {{$category->id === $aqar->category->id ? 'selected' : ''}}>{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="control-group form-group">
                                    <label class="form-label"
                                           for="price">{{__('admin/pages/aqars.price')}} <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="price" id="price" required maxlength="50" value="{{$aqar->price}}"
                                           oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                                           data-parsley-required-message="{{__('admin/pages/aqars.price.required')}}"
                                           placeholder="{{__('admin/pages/aqars.price')}}">
                                </div>
                                <div class="control-group form-group">
                                    <label class="form-label"
                                           for="description">{{__('admin/pages/aqars.description')}}</label>
                                    <textarea class="form-control" name="description" id="description"
                                              rows="5">{{$aqar->description}}</textarea>
                                </div>
                                <input id="input-pd" data-show-upload="false" name="images[]" type="file" multiple>
                            </section>
                            <br>
                            <br>
                            <br>
                            <h3>{{__('admin/pages/aqars.location')}}</h3>
                            <section>
                                <div id="map"></div>
                                <input type="hidden" name="latitude" id="latitude" value="{{$aqar->latitude}}">
                                <input type="hidden" name="longitude" id="longitude" value="{{$aqar->longitude}}">
                            </section>
                            <br>
                            <br>
                            <br>
                            <h3>{{__('admin/pages/aqars.attributes')}}</h3>
                            <section class="attributesContainer">
                                <div class="control-group form-group">
                                    <p class="mg-b-10">{{__('admin/pages/aqars.attributes')}}</p>
                                    <select id="inputAttributes" class="form-control select2" style="width: 100%">
                                        <option disabled selected label="{{__('admin/pages/aqars.choose')}}">
                                            {{__('admin/pages/aqars.choose')}}
                                        </option>
                                        @foreach($attributes as $attribute)
                                            <option value="{{$attribute->id}}">{{$attribute->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @foreach($aqar->attributes as $attribute)
                                    <div class="row">
                                        <div class="mb-3 col-md-9">
                                            <label class="form-label">{{$attribute->name}}</label>
                                            <input class="form-control" type="text" autocomplete="off" required name="values[]" value="{{$attribute->values->whereIn('id',$aqar->attributeValues->pluck('id'))->first()->name}}">
                                            <input type="hidden" name="attributes[]" value="{{$attribute->id}}">
                                        </div>
                                        <div class="mb-3 col-md-3">
                                            <button class="btn btn-danger delete-attribute"
                                                    data-attribute-id="{{$attribute->id}}"
                                                    data-attribute-name="{{$attribute->name}}"
                                                    style="margin-top: 32px;"><i class="fas fa-times"></i></button>
                                        </div>
                                    </div>
                                @endforeach
                            </section>
                            <br>
                            <br>
                            <br>
                            <h3>{{__('admin/pages/aqars.contact.us')}}</h3>
                            <section>
                                <div class="control-group form-group">
                                    <label class="form-label"
                                           for="mobile_number">{{__('admin/pages/aqars.mobile_number')}}</label>
                                    <input class="form-control" type="text" name="mobile_number" id="mobile_number" maxlength="15" value="{{$aqar->mobile_number}}"
                                           oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*?)\..*/g, '$1');"
                                           placeholder="{{__('admin/pages/aqars.mobile_number')}}">
                                </div>
                                <div class="control-group form-group">
                                    <label class="form-label"
                                           for="whatsapp_number">{{__('admin/pages/aqars.whatsapp_number')}}</label>
                                    <input class="form-control" type="text" name="whatsapp_number" id="whatsapp_number" maxlength="15"
                                           oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*?)\..*/g, '$1');"
                                           value="{{$aqar->whatsapp_number}}"
                                           placeholder="{{__('admin/pages/aqars.whatsapp_number')}}">
                                </div>
                                <div class="control-group form-group">
                                    <label class="form-label"
                                           for="email">{{__('admin/pages/aqars.email')}}</label>
                                    <input class="form-control" type="email" name="email" id="email" value="{{$aqar->email}}"
                                           placeholder="{{__('admin/pages/aqars.email')}}">
                                </div>
                            </section>
                            <br>
                            <br>
                            <br>
                            <h3>{{__('admin/pages/aqars.related.aqars')}}</h3>
                            <section>
                                <select class="form-control select2" multiple="multiple" style="width: 100%" name="related_aqars[]">
                                    @foreach($aqars as $theAqar)
                                        @continue($theAqar->id == $aqar->id)
                                        <option
                                            value="{{$theAqar->id}}" {{ $aqar->related->contains($theAqar->id) ? 'selected' : ''}}>{{$theAqar->title}}</option>
                                    @endforeach
                                </select>
                            </section>
                        </div>
                        <br>
                        <br>
                        <input class="btn btn-primary" type="submit" value="{{__('admin/pages/aqars.edit')}}">
                    </div>
                </form>
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
            map.addListener('click', function (event) {
                marker.setPosition(event.latLng);
                outerCircleMarker.setPosition(event.latLng);
                document.getElementById('latitude').value = event.latLng.lat();
                document.getElementById('longitude').value = event.latLng.lng();
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
{{--    <script src="{{URL::asset('assets/js/form-wizard.js')}}"></script>--}}
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

        $(document).ready(function () {
            var container = document.querySelector(".attributesContainer");
            var selectedAttributes = [];
            @foreach($aqar->attributes as $aparAttribute)
            selectedAttributes.push('{{$aparAttribute->id}}')
            @endforeach
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
                    let selectedAttributeBox = document.createElement('input');
                    selectedAttributeBox.autocomplete = 'off';
                    selectedAttributeBox.required = true;
                    selectedAttributeBox.classList.add('form-control','attributeValue');
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
            $(document).ready(function () {
                $('.delete-attribute').on('click', function (event) {
                    event.preventDefault();

                    var attributeId = $(this).data('attribute-id').toString();
                    var attributeName = $(this).data('attribute-name').toString();

                    var index = selectedAttributes.indexOf(attributeId);
                    if (index > -1) {
                        selectedAttributes.splice(index, 1);
                        $(this).closest('.row').remove();
                        document.getElementById(`${attributeName}_${attributeId}`).closest('.row').remove();
                    }
                });
            });
        });


        //Ajax Code To Get The Cities From Zone
        $(document).ready(function() {
            $('#zone').on('change', function() {
                var zoneId = $(this).val();
                if (zoneId) {
                    $.ajax({
                        url: "{{ URL::to('admin/zone-cities') }}/" + zoneId,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('#city').empty();
                            $.each(data, function(key, value) {
                                $('#city').append('<option value="' +
                                    key + '">' + value + '</option>');
                            });
                        },
                    });

                } else {
                    console.log('AJAX load did not work');
                }
            });

        });
    </script>


@endsection
