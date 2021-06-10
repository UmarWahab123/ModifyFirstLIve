@extends('admin.common.main')
@section('sub_header')

<style>
    .input-field {
        margin-left: 20px;
        margin-top: 10px;
        margin-right: 20px;
    }

</style>
<div class="kt-subheader   kt-grid__item" id="kt_subheader">
    <div class="kt-container  kt-container--fluid ">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">CMS</h3>
            <span class="kt-subheader__separator kt-hidden"></span>
            <div class="kt-subheader__breadcrumbs">
                <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                <span class="kt-subheader__breadcrumbs-separator"></span>
                <a href="" class="kt-subheader__breadcrumbs-link">
                    Settings </a>
                {{-- <span class="kt-subheader__breadcrumbs-separator"></span>
                <a href="" class="kt-subheader__breadcrumbs-link">
                    Navy Aside </a> --}}
                <!-- <span class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active">Active link</span> -->
            </div>
        </div>
    </div>
</div>
@endsection
@inject('helpers', 'App\Classes\Helpers')
@section('content')
<div class="kt-portlet">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">Leadership Settings</h3>
        </div>
    </div>
    <!--begin::Form-->
    <form class="kt-form" action="{{ url('admin/update_l_page') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-md-6">
                <div class="form-group input-field">
                    <label>Page Name</label>
                    <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Page Name"
                        name="page_name" value="{{ @$page->page_name }}" required>

                </div>
                <div class="form-group input-field">
                    <label>Meta Title</label>
                    <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Page Name"
                        name="page_meta_tag" value="{{ @$page->meta_title }}" required>
                    <input type="hidden" value="{{ $page->id }}" name="page_id">
                </div>
                <div class="form-group form-group-last input-field">
                    <label for="exampleTextarea">Meta Description</label>
                    <textarea class="form-control" name="page_meta_description" id="exampleTextarea"
                        rows="5">{{ @$page->meta_description }}</textarea>
                </div>
            </div>
            <div class="col-md-6">
                <div class="profile-pic-div" id="profile-pic-div">
                    @php
                    $image=@$helpers->get_image($page->page_image, 'img');
                    @endphp
                    <img src="{{ @$image }}" id="photopage" class="photo">
                    <input type="file" id="filepage" class="file" onclick="uploadImgae('filepage','photopage')"
                        name="page_image">
                    <label for="filepage" id="uploadBtn">Choose Image</label>
                </div>

            </div>

        </div>

</div>
@endsection