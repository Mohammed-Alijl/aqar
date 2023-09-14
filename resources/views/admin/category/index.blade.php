@extends('admin.layouts.master')
@section('title')
    {{__('admin/pages/categories.category')}}
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
                <h4 class="content-title mb-0 my-auto">{{__('admin/pages/categories.category')}}</h4>
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
                        <h4 class="card-title mg-b-0">{{__('admin/pages/categories.list')}}</h4>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                    <p class="tx-12 tx-gray-500 mb-2">
                    <div class="col-sm-6 col-md-4 col-xl-3 mg-t-20 mg-sm-t-0">
                        <a class="btn btn-primary-gradient btn-block" data-effect="effect-slide-in-right"
                           data-toggle="modal" href="#add-category">{{__('admin/pages/categories.add.category')}}</a>
                    </div>
                    </p>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table key-buttons text-md-nowrap">
                            <thead>
                            <tr>
                                <th class="border-bottom-0">#</th>
                                <th class="border-bottom-0">{{__('admin/pages/categories.name')}}</th>
                                <th class="border-bottom-0">{{__('admin/pages/categories.display.in.home')}}</th>
                                <th class="border-bottom-0">{{__('admin/pages/categories.display.order')}}</th>
                                <th class="border-bottom-0">{{__('admin/pages/categories.action')}}</th>
                                <th class="border-bottom-0">.</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $row = 1;
                            @endphp
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{$row++}}</td>
                                    <td>{{$category->name}}</td>
                                    <td>
                                        @if($category->display_main)
                                            <span class="text-success">{{__('admin/pages/categories.enable')}}</span>
                                        @else
                                            <span class="text-danger">{{__('admin/pages/categories.disable')}}</span>
                                        @endif
                                    </td>
                                    <td>{{$category->display_order ?? '' }}</td>
                                    <td>
                                        <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                           data-id="{{ $category->id }}" data-category_name="{{ $category->name }}"
                                           data-display_main="{{ $category->display_main }}" data-toggle="modal"
                                           data-display_order="{{$category->display_order ?? ''}}"
                                           href="#edit-category" title="{{__('admin/pages/categories.edit')}}"><i
                                                class="las la-pen"></i></a>
                                        <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                           data-id="{{ $category->id }}" data-category_name="{{ $category->name }}"
                                           data-toggle="modal" href="#delete-category"
                                           title="{{__('admin/pages/categories.delete')}}"><i
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
    <div class="modal" id="edit-category">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-content-demo">
                <form action="categories/update" method="post" data-parsley-validate>
                    @csrf
                    @method('put')
                    <div class="modal-header">
                        <h6 class="modal-title">{{__('admin/pages/categories.edit.category')}}</h6>
                        <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span
                                aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <h6>{{__('admin/pages/categories.edit.category')}}</h6>
                        <input type="hidden" name="id" id="id" value="">
                        <div class="form-group">
                            <label for="edit_category_name"
                                   class="col-form-label">{{__('admin/pages/categories.name')}} <span class="tx-danger">*</span></label>
                                <input class="form-control" name="name" id="edit_category_name" type="text" required
                                   maxlength="255" data-parsley-required-message="{{__('admin/pages/categories.name.invalid')}}">
                        </div>
                        <div class="form-group">
                            <label for="edit_display_main"
                                   class="col-form-label">{{__('admin/pages/categories.display.in.home')}} <span
                                    class="tx-danger">*</span></label>
                            <select class="form-control select2-no-search" name="display_main"
                                    id="edit_display_main">
                                <option value="1">{{__('admin/pages/categories.enable')}}</option>
                                <option value="0">{{__('admin/pages/categories.disable')}}</option>
                            </select>
                        </div>
                        <div class="form-group" id="edit_display_order_container" style="display: none">
                            <label for="edit_display_order"
                                   class="col-form-label">{{__('admin/pages/categories.display.order')}} <span
                                    class="tx-danger">*</span></label>
                            <input class="form-control" name="display_order" id="edit_display_order" type="text"
                                   oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                                   data-parsley-required-message="{{__('admin/pages/categories.display_order.required')}}">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">{{__('admin/pages/categories.edit')}}</button>
                        <button type="button" class="btn btn-secondary"
                                data-dismiss="modal">{{__('admin/pages/categories.cancel')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    <div class="modal" id="add-category">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">{{__('admin/pages/categories.add.category')}}</h6>
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <h6>{{__('admin/pages/categories.add.category')}}</h6>
                    <form action="{{ route('categories.store') }}" method="post" autocomplete="off"
                          data-parsley-validate>
                        @csrf
                        <div class="form-group">
                            <label for="add_category_name"
                                   class="col-form-label">{{__('admin/pages/categories.name')}} <span class="tx-danger">*</span></label>
                            <input class="form-control" name="name" id="add_category_name" type="text" required
                                   maxlength="255" data-parsley-required-message="{{__('admin/pages/categories.name.invalid')}}"
                            >
                        </div>
                        <div class="form-group">
                            <label for="add_category_display_main"
                                   class="col-form-label">{{__('admin/pages/categories.display.in.home')}} <span
                                    class="tx-danger">*</span></label>
                            <br>
                            <select class="form-control" name="display_main" id="add_category_display_main" required
                                    style="width: 100%">
                                <option value="1">{{__('admin/pages/categories.enable')}}</option>
                                <option value="0" selected>{{__('admin/pages/categories.disable')}}</option>
                            </select>
                        </div>
                        <div class="form-group" style="display: none" id="display_order_container">
                            <label for="add_display_order"
                                   class="col-form-label">{{__('admin/pages/categories.display.order')}} <span
                                    class="tx-danger">*</span></label>
                            <input class="form-control" name="display_order" id="add_display_order" type="text"
                                   oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*?)\..*/g, '$1');"
                                   data-parsley-required-message="{{__('admin/pages/categories.display_order.required')}}"
                            >
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">{{__('admin/pages/categories.add')}}</button>
                            <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">{{__('admin/pages/categories.cancel')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" id="delete-category">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content tx-size-sm">
                <div class="modal-body tx-center pd-y-20 pd-x-20">
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span
                            aria-hidden="true">&times;</span></button>
                    <i class="icon icon ion-ios-close-circle-outline tx-100 tx-danger lh-1 mg-t-20 d-inline-block"></i>
                    <h4 class="tx-danger mg-b-20">{{__('admin/pages/categories.are.you.sure')}}</h4>
                    <p class="mg-b-20 mg-x-20">{{__('admin/pages/categories.delete.category.confirm.message')}}</p>
                    <form action="categories/destroy" method="post" autocomplete="off">
                        @csrf
                        @method('delete')
                        <input type="hidden" name="id" id="id" value="">
                        <button type="submit"
                                class="btn ripple btn-danger pd-x-25">{{__('admin/pages/categories.delete')}}</button>
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
        //Script For Display Edit Category Modal And Put The Data
        $('#edit-category').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var category_name = button.data('category_name')
            var display_main = button.data('display_main')
            var display_order = button.data('display_order')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #edit_category_name').val(category_name);
            modal.find('.modal-body #edit_display_main').val(display_main);
            modal.find('.modal-body #edit_display_order').val(display_order);

            if(display_main == 1){
                document.getElementById('edit_display_order_container').style.cssText = 'display:block';
                document.getElementById('edit_display_order').required = true;
            }else {
                document.getElementById('edit_display_order_container').style.cssText = 'display:none';
                document.getElementById('edit_display_order').required = false;
            }
        })

        //Script For Display Delete Category Modal
        $('#delete-category').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
        })

        document.getElementById('add_category_display_main').addEventListener('change', function () {
            if (this.value == 1) {
                document.getElementById('display_order_container').style.cssText = 'display:block';
                document.getElementById('add_display_order').required = true;
            } else {
                document.getElementById('display_order_container').style.cssText = 'display:none';
                document.getElementById('add_display_order').required = false;
            }

        });

        document.getElementById('edit_display_main').addEventListener('change', function () {
            if (this.value == 1) {
                document.getElementById('edit_display_order_container').style.cssText = 'display:block';
                document.getElementById('edit_display_order').required = true;
            } else {
                document.getElementById('edit_display_order_container').style.cssText = 'display:none';
                document.getElementById('edit_display_order').required = false;
            }

        });


        @if(\Illuminate\Support\Facades\Session::has('delete-success'))
        Swal.fire(
            '{{__('admin/pages/categories.deleted')}}',
            '{{\Illuminate\Support\Facades\Session::get('delete-success')}}',
            'success'
        )
        @endif
        @if(\Illuminate\Support\Facades\Session::has('add-success'))
        Swal.fire(
            '{{__('admin/pages/categories.category.add')}}',
            '{{\Illuminate\Support\Facades\Session::get('add-success')}}',
            'success'
        )
        @endif
        @if(\Illuminate\Support\Facades\Session::has('edit-success'))
        Swal.fire(
            '{{__('admin/pages/categories.category.edit')}}',
            '{{\Illuminate\Support\Facades\Session::get('edit-success')}}',
            'success'
        )
        @endif
        @if(\Illuminate\Support\Facades\Session::has('delete-failed'))
        Swal.fire({
            title: '{{__('admin/pages/categories.category.cannot.delete')}}',
            text: '{{\Illuminate\Support\Facades\Session::get('delete-failed')}}',
            icon: 'warning',
            confirmButtonColor: '#3085d6',
            confirmButtonText: '{{__('admin/pages/categories.ok')}}'
        })
        @endif

    </script>
    <!--Internal  Parsley.min js -->
    <script src="{{URL::asset('assets/plugins/parsleyjs/parsley.min.js')}}"></script>
    <!-- Internal Form-validation js -->
    <script src="{{URL::asset('assets/js/form-validation.js')}}"></script>

@endsection
