@extends('admin.common.main')
@inject('helpers', 'App\Classes\Helpers')
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
                    Edit Blog </a>
                {{-- <span class="kt-subheader__breadcrumbs-separator"></span>
                <a href="" class="kt-subheader__breadcrumbs-link">
                    Navy Aside </a> --}}
                <!-- <span class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active">Active link</span> -->
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
{{-- -----------------page info--------------- --}}
<div class="kt-portlet">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">Edit Blog</h3>
        </div>
    </div>
    <!--begin::Form-->
    <form class="kt-form" action="{{ url('admin/updateblog') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-md-6">
                <div class="form-group input-field">
                    <label>Blog Title</label>
                    <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Blog Title" value="{{ @$blog->blog_title }}"
                        name="blog_title" required>
                        <input type="hidden" name="blog_id" value="{{ $blog->id }}">

                </div>
                <div class="form-group input-field">
                    <label>Meta Title</label>
                    <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Meta Title" value="{{ @$blog->blog_meta_title }}"
                        name="meta_title" required>

                </div>

                <div class="form-group form-group-last input-field">
                    <label for="exampleTextarea">Meta Description</label>
                    <textarea class="form-control" name="meta_description" id="exampleTextarea" rows="5">{{ @$blog->blog_meta_description }}</textarea>
                </div>
                <div class="form-group input-field">
                    <label for="exampleSelect1">Status</label>
                    <select class="form-control" id="exampleSelect1" name="blog_status">
                        
                        <option value="active" {{ ($blog->status=='active') ? 'selected':'' }}>Active</option>
                        <option value="inactive" {{ ($blog->status=='inactive') ? 'selected':'' }}>Inactive</option>
                        
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="profile-pic-div" id="profile-pic-div">
                    @php
                        $image=@$helpers->get_image($blog->blog_image, 'img/blogs');
                    @endphp
                    <img src="{{ @$image }}" id="photoblog" class="photo">
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
                <textarea class="form-control ckeditor" name="blog_des" id="exampleTextarea"> 
                    {{ html_entity_decode(htmlspecialchars_decode(@$blog->blog_details)) }}
                </textarea>
            </div>
        </div>
        <div class="kt-portlet__foot">
            <div class="kt-form__actions">
                <input type="submit" class="btn btn-primary" value="Update"></button>
                {{-- <button type="reset" class="btn btn-secondary">Cancel</button> --}}
            </div>
        </div>
    </form>
</div>
@endsection