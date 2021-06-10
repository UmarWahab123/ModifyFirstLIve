@extends('admin.common.main')
@inject('helpers', 'App\Classes\Helpers')
@section('sub_header')
<div class="kt-subheader   kt-grid__item" id="kt_subheader">
    <div class="kt-container  kt-container--fluid ">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">Dashboard</h3>
            <span class="kt-subheader__separator kt-hidden"></span>
            <div class="kt-subheader__breadcrumbs">
                <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                <span class="kt-subheader__breadcrumbs-separator"></span>
                <a href="" class="kt-subheader__breadcrumbs-link">
                    Dashboards </a>
                <span class="kt-subheader__breadcrumbs-separator"></span>
                <a href="" class="kt-subheader__breadcrumbs-link">
                    Navy Aside </a>

                <!-- <span class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active">Active link</span> -->
            </div>
        </div>

    </div>
</div>
@endsection
@section('content')
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    
        <div class="kt-portlet kt-portlet--mobile">
            <div class="kt-portlet__head kt-portlet__head--lg">
                
                <div class="kt-portlet__head-toolbar">
                    <div class="kt-portlet__head-wrapper">
    
                        &nbsp;
                        <a href="{{ url('admin/add-blog') }}" class="btn btn-brand btn-bold btn-upper btn-font-sm">
                            <i class="la la-plus"></i>
                            New Blog
                        </a>
                    </div>
                </div>
            </div>
            <div class="kt-portlet__body">
    
                <!--begin: Search Form -->
                <div class="kt-form kt-fork--label-right kt-margin-t-20 kt-margin-b-10">
                    <div class="row align-items-center">
                        <div class="col-xl-8 order-2 order-xl-1">
                            <div class="row align-items-center">
                                <div class="col-md-4 kt-margin-b-20-tablet-and-mobile">
                                    <div class="kt-input-icon kt-input-icon--left">
                                        <input type="text" class="form-control" placeholder="Search..." id="generalSearch">
                                        <span class="kt-input-icon__icon kt-input-icon__icon--left">
                                            <span><i class="la la-search"></i></span>
                                        </span>
                                    </div>
                                </div>
                                {{-- <div class="col-md-4 kt-margin-b-20-tablet-and-mobile">
                                    <div class="kt-form__group kt-form__group--inline">
                                        <div class="kt-form__label">
                                            <label>Status:</label>
                                        </div>
                                        <div class="kt-form__control">
                                            <select class="form-control bootstrap-select" id="kt_form_status">
                                                <option value="">All</option>
                                                <option value="1">Pending</option>
                                                <option value="2">Delivered</option>
                                                <option value="3">Canceled</option>
                                                <option value="4">Success</option>
                                                <option value="5">Info</option>
                                                <option value="6">Danger</option>
                                            </select>
                                        </div>
                                    </div>
                                </div> --}}
                                {{-- <div class="col-md-4 kt-margin-b-20-tablet-and-mobile">
                                    <div class="kt-form__group kt-form__group--inline">
                                        <div class="kt-form__label">
                                            <label>Type:</label>
                                        </div>
                                        <div class="kt-form__control">
                                            <select class="form-control bootstrap-select" id="kt_form_type">
                                                <option value="">All</option>
                                                <option value="1">Online</option>
                                                <option value="2">Retail</option>
                                                <option value="3">Direct</option>
                                            </select>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                        <div class="col-xl-4 order-1 order-xl-2 kt-align-right">
                            <a href="#" class="btn btn-default kt-hidden">
                                <i class="la la-cart-plus"></i> New Order
                            </a>
                            <div class="kt-separator kt-separator--border-dashed kt-separator--space-lg d-xl-none"></div>
                        </div>
                    </div>
                </div>
    
                <!--end: Search Form -->
            </div>
            <div class="kt-portlet__body kt-portlet__body--fit">
    
                <!--begin: Datatable -->
                <table class="kt-datatable" id="html_table" width="100%">
                    <thead>
                        <tr>
                            <th title="Field #1">#</th>
                            <th title="Field #2"> Title</th>
                            <th title="Field #3">Blog Image</th>
                            <th title="Field #4">Blog Status</th>
                            <th title="Field #4">Actions</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($blogs as $key => $item)
                            <tr id="blog{{ $item->id }}">
                                <td style="width: 50px"> {{ $key+1 }}</td>
                                <td>{{ $item->blog_title }}</td>
                                <td>
                                    @php
                                    $image=@$helpers->get_image($item->blog_image, 'img/blogs');
                                    @endphp
                                    <img style="width: 100px;" src="{{ @$image }}">
                                
                                </td>
                                <td>{{ $item->status }}</td>
                                <td>
                                    <a href="{{ url('admin/edit_blog/'.$item->id) }}">Edit | <a href="#" onclick="delete_blog({{ $item->id }})">Delete</td>
                                
                            </tr>
                        @endforeach
                        
                    </tbody>
                </table>
    
                <!--end: Datatable -->
            </div>
        </div>
    </div>
    <script>
        $('#html_table').DataTable();
        function delete_blog(id) {
        //alert('jhadi');
        $.ajax({
        type: "POST",
        url: '{{url("admin/delete_blog")}}',
        data:{'id':id, "_token": "{{ csrf_token() }}"},
        dataType: 'json',
        success: function(data){
        if(data.success==1)
        {
        $("#blog"+id).remove();
        Swal.fire('Blog Successfully Deleted');
        }
        }

        });
        
        }
    </script>
@endsection