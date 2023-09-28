@extends('admin.layouts.master')
@section('title')
    {{__('admin/pages/aqars.aqars')}}
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
                <h4 class="content-title mb-0 my-auto">{{__('admin/pages/aqars.aqars')}}</h4>
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
                        <h4 class="card-title mg-b-0">{{__('admin/pages/aqars.list')}}</h4>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                    <p class="tx-12 tx-gray-500 mb-2">
                    <div class="col-sm-6 col-md-4 col-xl-3 mg-t-20 mg-sm-t-0">
                        <a class="btn btn-primary-gradient btn-block"
                           href="{{route('aqars.create')}}">{{__('admin/pages/aqars.add.aqar')}}</a>
                    </div>
                    </p>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table key-buttons text-md-nowrap">
                            <thead>
                            <tr>
                                <th class="border-bottom-0">#</th>
                                <th class="border-bottom-0">{{__('admin/pages/aqars.title')}}</th>
                                <th class="border-bottom-0">{{__('admin/pages/aqars.category')}}</th>
                                <th class="border-bottom-0">{{__('admin/pages/aqars.zone')}}</th>
                                <th class="border-bottom-0">{{__('admin/pages/aqars.price')}}</th>
                                <th class="border-bottom-0">{{__('admin/pages/aqars.latitude')}}</th>
                                <th class="border-bottom-0">{{__('admin/pages/aqars.longitude')}}</th>
                                <th class="border-bottom-0">{{__('admin/pages/aqars.action')}}</th>
                                <th class="border-bottom-0">.</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $row = 1;
                            @endphp
                            @foreach($aqars as $aqar)
                                <tr>
                                    <td>{{$row++}}</td>
                                    <td>
                                        <a href="{{route('aqars.show',$aqar->id)}}">
                                            {{$aqar->title}}
                                        </a>
                                    </td>
                                    <td>{{$aqar->category->name}}</td>
                                    <td>{{$aqar->zone->name}}</td>
                                    <td>{{$aqar->price}}</td>
                                    <td>{{$aqar->latitude}}</td>
                                    <td>{{$aqar->longitude}}</td>
                                    <td>
                                        <a href="{{route('aqars.edit',$aqar->id)}}" class="btn btn-sm btn-info" title="{{__('admin/pages/aqars.edit')}}"><i
                                                class="las la-pen"></i></a>
                                        <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                           data-id="{{ $aqar->id }}"
                                           data-toggle="modal" href="#delete-aqar"
                                           title="{{__('admin/pages/aqars.delete')}}"><i
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
    <div class="modal" id="delete-aqar">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content tx-size-sm">
                <div class="modal-body tx-center pd-y-20 pd-x-20">
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span
                            aria-hidden="true">&times;</span></button>
                    <i class="icon icon ion-ios-close-circle-outline tx-100 tx-danger lh-1 mg-t-20 d-inline-block"></i>
                    <h4 class="tx-danger mg-b-20">{{__('admin/pages/attributes.are.you.sure')}}</h4>
                    <p class="mg-b-20 mg-x-20">{{__('admin/pages/attributes.delete.attribute.confirm.message')}}</p>
                    <form action="aqars/destroy" method="post" autocomplete="off">
                        @csrf
                        @method('delete')
                        <input type="hidden" name="id" id="id" value="">
                        <button type="submit"
                                class="btn ripple btn-danger pd-x-25">{{__('admin/pages/aqars.delete')}}</button>
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

        //Script For Display Delete aqar Modal
        $('#delete-aqar').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
        })


        @if(\Illuminate\Support\Facades\Session::has('delete-success'))
        Swal.fire(
            '{{__('admin/pages/aqars.deleted')}}',
            '{{\Illuminate\Support\Facades\Session::get('delete-success')}}',
            'success'
        )
        @endif
        @if(\Illuminate\Support\Facades\Session::has('add-success'))
        Swal.fire(
            '{{__('admin/pages/aqars.aqar.add')}}',
            '{{\Illuminate\Support\Facades\Session::get('add-success')}}',
            'success'
        )
        @endif
        @if(\Illuminate\Support\Facades\Session::has('edit-success'))
        Swal.fire(
            '{{__('admin/pages/aqars.aqar.edit')}}',
            '{{\Illuminate\Support\Facades\Session::get('edit-success')}}',
            'success'
        )
        @endif
        @if(\Illuminate\Support\Facades\Session::has('delete-failed'))
        Swal.fire({
            title: '{{__('admin/pages/aqars.aqar.cannot.delete')}}',
            text: '{{\Illuminate\Support\Facades\Session::get('delete-failed')}}',
            icon: 'warning',
            confirmButtonColor: '#3085d6',
            confirmButtonText: '{{__('admin/pages/aqars.ok')}}'
        })
        @endif

    </script>
    <!--Internal  Parsley.min js -->
    <script src="{{URL::asset('assets/plugins/parsleyjs/parsley.min.js')}}"></script>
    <!-- Internal Form-validation js -->
    <script src="{{URL::asset('assets/js/form-validation.js')}}"></script>

@endsection
