@extends('admin.layouts.master')
@section('title')
    {{__('admin/pages/zones.zones')}}
@endsection
@section('css')
    <!-- Internal Data table css -->
    <link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet"/>
    <link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet"/>
    <link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{__('admin/pages/zones.zones')}}</h4>
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

    <div class="row row-sm">

        <!--div-->
        <div class="col-xl-12">
            <div class="card mg-b-20">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mg-b-0">{{__('admin/pages/zones.list')}}</h4>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                    <p class="tx-12 tx-gray-500 mb-2">
                    <div class="col-sm-6 col-md-4 col-xl-3 mg-t-20 mg-sm-t-0">
                        <a class="btn btn-primary-gradient btn-block" data-effect="effect-slide-in-right"
                           data-toggle="modal" href="#add-zone">{{__('admin/pages/zones.add.zone')}}</a>
                    </div>
                    </p>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table key-buttons text-md-nowrap">
                            <thead>
                            <tr>
                                <th class="border-bottom-0">#</th>
                                <th class="border-bottom-0">{{__('admin/pages/zones.name')}}</th>
                                <th class="border-bottom-0">{{__('admin/pages/zones.action')}}</th>
                                <th class="border-bottom-0">.</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $row = 1;
                            @endphp
                            @foreach($zones as $zone)
                                <tr>
                                    <td>{{$row++}}</td>
                                    <td>{{$zone->name}}</td>
                                    <td>
                                        <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                           data-id="{{ $zone->id }}" data-zone_name="{{ $zone->name }}"
                                            data-toggle="modal"
                                           href="#edit-zone" title="{{__('admin/pages/zones.edit')}}"><i
                                                class="las la-pen"></i></a>
                                        <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                           data-id="{{ $zone->id }}"
                                           data-toggle="modal" href="#delete-zone"
                                           title="{{__('admin/pages/zones.delete')}}"><i
                                                class="las la-trash"></i></a>
                                    </td>
                                    <td>.</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--/div-->
    </div>
    <div class="modal" id="add-zone">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">{{__('admin/pages/zones.add.zone')}}</h6>
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <h6>{{__('admin/pages/zones.add.zone')}}</h6>
                    <form action="{{ route('zones.store') }}" method="post" autocomplete="off"
                          data-parsley-validate>
                        @csrf
                        <div class="form-group">
                            <label for="country"
                                   class="col-form-label">{{__('admin/pages/zones.country')}}</label>
                            <input class="form-control" id="country" type="text" value="{{\App\Models\Country::first()->name}}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="add_zone_name"
                                   class="col-form-label">{{__('admin/pages/zones.name')}} <span class="tx-danger">*</span></label>
                            <input class="form-control" name="name" id="add_zone_name" type="text" required
                                   maxlength="255" data-parsley-required-message="{{__('admin/pages/zones.name.invalid')}}"
                            >
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">{{__('admin/pages/zones.add')}}</button>
                            <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">{{__('admin/pages/zones.cancel')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" id="edit-zone">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-content-demo">
                <form action="zones/update" method="post" data-parsley-validate>
                    @csrf
                    @method('put')
                    <div class="modal-header">
                        <h6 class="modal-title">{{__('admin/pages/zones.edit.zone')}}</h6>
                        <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span
                                aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <h6>{{__('admin/pages/zones.edit.zone')}}</h6>
                        <input type="hidden" name="id" id="id" value="">
                        <div class="form-group">
                            <label for="country"
                                   class="col-form-label">{{__('admin/pages/zones.country')}}</label>
                            <input class="form-control" id="country" type="text" value="{{\App\Models\Country::first()->name}}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="edit_zone_name"
                                   class="col-form-label">{{__('admin/pages/zones.name')}} <span class="tx-danger">*</span></label>
                                <input class="form-control" name="name" id="edit_zone_name" type="text" required
                                   maxlength="255" data-parsley-required-message="{{__('admin/pages/zones.name.invalid')}}">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">{{__('admin/pages/zones.edit')}}</button>
                        <button type="button" class="btn btn-secondary"
                                data-dismiss="modal">{{__('admin/pages/zones.cancel')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal" id="delete-zone">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content tx-size-sm">
                <div class="modal-body tx-center pd-y-20 pd-x-20">
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span
                            aria-hidden="true">&times;</span></button>
                    <i class="icon icon ion-ios-close-circle-outline tx-100 tx-danger lh-1 mg-t-20 d-inline-block"></i>
                    <h4 class="tx-danger mg-b-20">{{__('admin/pages/zones.are.you.sure')}}</h4>
                    <p class="mg-b-20 mg-x-20">{{__('admin/pages/zones.delete.zone.confirm.message')}}</p>
                    <form action="zones/destroy" method="post" autocomplete="off">
                        @csrf
                        @method('delete')
                        <input type="hidden" name="id" id="id" value="">
                        <button type="submit"
                                class="btn ripple btn-danger pd-x-25">{{__('admin/pages/zones.delete')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <script>
        //Script For Display Edit zone Modal And Put The Data
        $('#edit-zone').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var zone_name = button.data('zone_name')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #edit_zone_name').val(zone_name);
        })

        //Script For Display Delete zone Modal
        $('#delete-zone').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
        })


        @if(\Illuminate\Support\Facades\Session::has('delete-success'))
        Swal.fire(
            '{{__('admin/pages/zones.deleted')}}',
            '{{\Illuminate\Support\Facades\Session::get('delete-success')}}',
            'success'
        )
        @endif
        @if(\Illuminate\Support\Facades\Session::has('add-success'))
        Swal.fire(
            '{{__('admin/pages/zones.zone.add')}}',
            '{{\Illuminate\Support\Facades\Session::get('add-success')}}',
            'success'
        )
        @endif
        @if(\Illuminate\Support\Facades\Session::has('edit-success'))
        Swal.fire(
            '{{__('admin/pages/zones.zone.edit')}}',
            '{{\Illuminate\Support\Facades\Session::get('edit-success')}}',
            'success'
        )
        @endif
        @if(\Illuminate\Support\Facades\Session::has('delete-failed'))
        Swal.fire({
            title: '{{__('admin/pages/zones.zone.cannot.delete')}}',
            text: '{{\Illuminate\Support\Facades\Session::get('delete-failed')}}',
            icon: 'warning',
            confirmButtonColor: '#3085d6',
            confirmButtonText: '{{__('admin/pages/zones.ok')}}'
        })
        @endif

    </script>
    <!--Internal  Parsley.min js -->
    <script src="{{URL::asset('assets/plugins/parsleyjs/parsley.min.js')}}"></script>
    <!-- Internal Form-validation js -->
    <script src="{{URL::asset('assets/js/form-validation.js')}}"></script>

@endsection
