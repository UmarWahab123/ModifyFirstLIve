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
            <h3 class="kt-subheader__title">Blogs</h3>
            <span class="kt-subheader__separator kt-hidden"></span>
            <div class="kt-subheader__breadcrumbs">
                <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                <span class="kt-subheader__breadcrumbs-separator"></span>
                <a href="" class="kt-subheader__breadcrumbs-link">
                    Add Blog </a>
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
{{-- -----------------page info--------------- --}}
<div class="kt-portlet">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">Page Settings</h3>
        </div>
    </div>
    <!--begin::Form-->
    <form class="kt-form" action="{{ url('admin/postblog') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-md-6">
                <div class="form-group input-field">
                    <label>Blog Title</label>
                    <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Blog Title"
                        name="blog_title" required>

                </div>
                <div class="form-group input-field">
                    <label>Meta Title</label>
                    <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Meta Title"
                        name="meta_title"  required>
                    
                </div>

                <div class="form-group form-group-last input-field">
                    <label for="exampleTextarea">Meta Description</label>
                    <textarea class="form-control" name="meta_description" id="exampleTextarea"
                        rows="5"></textarea>
                </div>
            </div>
            <div class="col-md-6">
                <div class="profile-pic-div" id="profile-pic-div">
                    
                    <img src="" id="photoblog" class="photo">
                    <input type="file" id="fileblog" class="file" onclick="uploadImgae('fileblog','photoblog')"
                        name="blog_image">
                    <label for="fileblog" id="uploadBtn">Choose Image</label>
                </div>
            </div>
        </div>
        {{-- <div class="clearfx"></div> --}}
        <div class="row">
            <div class="form-group input-field">
                <label for="exampleInputPassword1">Blog Description</label>
                <textarea class="form-control ckeditor" name="blog_des" id="exampleTextarea" >
                </textarea>
            </div>
        </div>
        <div class="kt-portlet__foot">
            <div class="kt-form__actions">
                <input type="submit" class="btn btn-primary" value="Add"></button>
                {{-- <button type="reset" class="btn btn-secondary">Cancel</button> --}}
            </div>
        </div>
    </form>
</div>
@endsection