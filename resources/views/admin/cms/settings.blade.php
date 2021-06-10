@extends('admin.common.main')

@section('sub_header')
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
@section('content')
@inject('helpers', 'App\Classes\Helpers')
<div class="kt-portlet">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">Update Settings</h3>
        </div>
    </div>

    <!--begin::Form-->
    <form class="kt-form" action="{{ url('update_settings') }}" method="POST" enctype="multipart/form-data">
        <div class="kt-portlet__body">
            @csrf
            
            <div class="profile-pic-div" id="profile-pic-div">
                @php
                $image=@$helpers->get_image($settings->logo, 'img');
                @endphp
                <img src="{{ @$image }}" id="photopage" class="photo">
                <input type="file" id="filepage" class="file" onclick="uploadImgae('filepage','photopage')"
                    name="special_sec6_image">
                <label for="filepage" id="uploadBtn">Choose Image</label>
            </div>
            <div class="row" style="margin-top:20px; ">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" aria-describedby="emailHelp" placeholder="Enter email" name="email"
                            value="{{ @$settings->email }}" required>

                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Cell Number</label>
                        <input type="tel" class="form-control" id="exampleInputPassword1" placeholder="Enter Cell No" name="cell"
                            value="{{ @$settings->cell_number }}" required>
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Enter Address" name="address"
                            value="{{ @$settings->address }}" required>

                    </div>
                    <div class="form-group">
                        <label>Facebook</label>
                        <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Enter FB Link" name="facebook"
                            value="{{ @$settings->facebook }}" required>
                    
                    </div>
                </div>
                <div class="col-md-6">
                
                    <div class="form-group">
                        <label>Instagram</label>
                        <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Enter Insta Link"
                            name="instagram" value="{{ @$settings->instagram }}" required>
                
                    </div>
                    <div class="form-group">
                        <label>Twitter</label>
                        <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Enter Twitter Link"
                            name="twitter" value="{{ @$settings->twitter }}" required>
                
                    </div>
                    <div class="form-group">
                        <label>LinkdIn</label>
                        <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Enter LinkdIn Link"
                            name="linkdin" value="{{ @$settings->linkdin }}" required>
                
                    </div>
                    <div class="form-group">
                        <label>Youtube</label>
                        <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Enter Youtube Link"
                            name="youtube" value="{{ @$settings->youtube }}" required>
                
                    </div>
                </div>
            </div>
            
            
            {{-- <div class="form-group form-group-last">
                <label for="exampleTextarea">Example textarea</label>
                <textarea class="form-control" id="exampleTextarea" rows="3"></textarea>
            </div> --}}
        </div>
        <div class="kt-portlet__foot">
            <div class="kt-form__actions">
                <input type="submit" class="btn btn-primary" value="Update"></button>
                {{-- <button type="reset" class="btn btn-secondary">Cancel</button> --}}
            </div>
        </div>
    </form>

    <!--end::Form-->
</div>
@endsection
