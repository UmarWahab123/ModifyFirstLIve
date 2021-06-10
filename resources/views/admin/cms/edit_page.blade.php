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
{{-- -----------------page info--------------- --}}
<div class="kt-portlet">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">Page Settings</h3>
        </div>
    </div>
    <!--begin::Form-->
    <form class="kt-form" action="{{ url('admin/update_page') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-md-6">
                <div class="form-group input-field">
                    <label>Page Name</label>
                    <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Page Name" name="page_name"
                        value="{{ @$page->page_name }}" required>
                
                </div>
                <div class="form-group input-field">
                    <label>Meta Title</label>
                    <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Page Name" name="page_meta_tag"
                        value="{{ @$page->meta_title }}" required>
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
                    <input type="file" id="filepage" class="file" onclick="uploadImgae('filepage','photopage')"  name="page_image">
                    <label for="filepage" id="uploadBtn">Choose Image</label>
                </div>
                
            </div>
            
        </div>

</div>
{{-- -----------------Main Section--------------- --}}
<div class="kt-portlet">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">Main Section</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group input-field">
                <label>Section Heading</label>
                <input type="text" class="form-control" aria-describedby="emailHelp" name="main_sec_heading"
                    value="{{ @$main_section->section_heading }}" required>
                <input type="hidden" name="main_section_id" value="{{ $main_section->id }}">
            </div>
            @if ($page_type=='leadership')
               <div class="form-group input-field">
                <label>Section Sub Heading</label>
                <input type="text" class="form-control" aria-describedby="emailHelp" name="main_sec_sub_heading"
                    value="{{ @$main_section->section_sub_heading }}" required>
                <input type="hidden" name="main_section_id" value="{{ $main_section->id }}">
            </div> 
            @else
            
            <div class="form-group input-field">
                <label>Button Link</label>
                <input type="text" class="form-control" aria-describedby="emailHelp" name="main_sec_btn"
                    value="{{ @$main_section->section_btn_link }}" required>
            </div>  
            @endif
            @if ($page_type=='inventory' || $page_type=='intelligent' || $page_type=='reporting' || $page_type=='craigslist' ||
            $page_type='index')
            <div class="form-group input-field">
                <label>Youtube Link</label>
                <input type="text" class="form-control" aria-describedby="emailHelp" name="main_sec_youtube"
                    value="{{ @$main_section->youtube_link }}" required>
            </div>
            @endif
            
            @if ($page_type=='intelligent' || $page_type=='crm' ||  $page_type=='reporting' || $page_type=='leadership' || $page_type='index')
                <div class="form-group input-field">
                    <label for="exampleInputPassword1">Section Description</label>
                    <textarea class="form-control ckeditor" name="main_sec_des" id="exampleTextarea" rows="10">
                    {{ html_entity_decode(htmlspecialchars_decode(@$main_section->section_description)) }}</textarea>
                </div>
            @endif

            

            @if ($page_type=='crm')
                <div class="form-group form-group-last input-field">
                    <label for="exampleTextarea">Alert</label>
                    <textarea class="form-control" name="main_sec_alert" id="exampleTextarea"
                        rows="3">{{ @$main_section->section_alert }}</textarea>
                </div>
            @endif
        </div>
        <div class="col-md-6">
            <div class="profile-pic-div" id="profile-pic-div">
                @php
                $image=@$helpers->get_image($main_section->section_image, 'img');
                @endphp
                <img src="{{ @$image }}" id="photomain" class="photo">
                <input type="file" id="filemain" class="file" onclick="uploadImgae('filemain','photomain')" name="main_sec_image">
                <label for="filemain" id="uploadBtn">Choose Image</label>
            </div>
        </div>
    </div>
</div>

@if (!empty($alert_section) )
<div class="kt-portlet" id="sections">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h5 class="card-title">Alert Section</h5>
        </div>

    </div>

    <div class="row" id="section{{ $alert_section->id }}">
        <div class="col-md-6">

            <span class="kt-switch kt-switch--outline kt-switch--icon kt-switch--success input-field">
                <label>
                    <input value="1" onclick="section_status({{ $alert_section->id }})" type="checkbox" 
                        id="section_status{{ $alert_section->id }}"
                        {{ ($alert_section->section_status==1) ? 'checked':'' }}>
                    <span></span>
                </label>
            </span>

            <div class="form-group input-field">
                <label>Heading</label>
                <input type="text" class="form-control" aria-describedby="emailHelp" name="alert_sec_heading"
                    value="{{ $alert_section->section_heading }}"
                    required>
                <input type="hidden" name="alert_sec_id" value="{{ $alert_section->id }}">
            </div>
            <div class="form-group input-field">
                <label for="exampleInputPassword1">Section Description</label>
                <textarea class="form-control ckeditor" name="alert_sec_des" id="exampleTextarea" rows="10">
                {{ html_entity_decode(htmlspecialchars_decode(@$alert_section->section_description)) }}</textarea>
            </div>
        </div>
        <div class="col-md-6">
            <div class="profile-pic-div" id="profile-pic-div">
                @php
                $image=@$helpers->get_image($alert_section->section_image, 'img');
                @endphp
                <img src="{{ @$image }}" id="photoalert" class="photo">
                <input type="file" id="filealert" class="file" onclick="uploadImgae('filealert','photoalert')" name="alert_sec_image">
                <label for="filealert" id="uploadBtn">Choose Image</label>
            </div>
        </div>
    </div>

</div>
@endif


@if (!empty($form_section))
<div class="kt-portlet" id="sections">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h5 class="card-title">Form Section</h5>
        </div>

    </div>

    <div class="row" id="section{{ $form_section->id }}">
        <div class="col-md-6">

            <span class="kt-switch kt-switch--outline kt-switch--icon kt-switch--success input-field">
                <label>
                    <input onclick="section_status({{ $form_section->id }})" type="checkbox"
                        id="section_status{{ $form_section->id }}"
                        {{ ($form_section->section_status==1) ? 'checked':'' }}>
                    <span></span>
                </label>
            </span>
        
            <div class="form-group input-field">
                <label>Heading</label>
                <input type="text" class="form-control" aria-describedby="emailHelp" name="form_sec_heading"
                    value="{{ $form_section->section_heading }}"
                    required>
                <input type="hidden" value="{{ $form_section->id }}" name="form_sec_id">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group input-field">
                <label for="exampleInputPassword1">Section Description</label>
                <textarea class="form-control ckeditor" name="form_sec_des" id="exampleTextarea" rows="10">
                {{ html_entity_decode(htmlspecialchars_decode(@$form_section->section_description)) }}</textarea>
            </div>

        </div>

        
    </div>

</div> 
@endif
@if (!empty($special_section))
<div class="kt-portlet" id="sections">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h5 class="card-title">Speccial Section</h5>
        </div>

    </div>
   
    <div class="row" id="section{{ $special_section->id }}">
        <div class="col-md-6">
            
            <span class="kt-switch kt-switch--outline kt-switch--icon kt-switch--success input-field">
                <label>
                    <input onclick="section_status({{ $special_section->id }})" type="checkbox" id="section_status{{ $special_section->id }}"
                        {{ ($special_section->section_status==1) ? 'checked':'' }}>
                    <span></span>
                </label>
            </span>

            <div class="form-group input-field">
                <label>Heading</label>
                <input type="text" class="form-control" aria-describedby="emailHelp"
                    name="special_sec_heading" value="{{ $special_section->section_heading }}" required>
                <input type="hidden" name="special_sec_id" value="{{ $special_section->id }}">
            </div>
            <div class="form-group form-group-last input-field">
                <label for="exampleTextarea">Description</label>
                <textarea class="form-control ckeditor" name="special_sec_des"
                    id="exampleTextarea" rows="3">
                {{ html_entity_decode(htmlspecialchars_decode(@$special_section->section_description)) }}</textarea>
            </div>
            
        </div>

        {{-- <div class="col-md-6">
            <div class="profile-pic-div" id="profile-pic-div">
                @php
                $image=@$helpers->get_image($special_section->section_image, 'img');
                @endphp
                <img src="{{ @$image }}" id="photosp=" class="photo">
                <input type="file" id="filesp" class="file"
                    onclick="uploadImgae('filesp','photosp')" name="special_sec_image">
                <label for="filesp" id="uploadBtn">Choose Image</label>
            </div>
        </div> --}}
        <div class="col-md-6">
            <div class="profile-pic-div" id="profile-pic-div">
                @php
                $image=@$helpers->get_image($special_section->section_image, 'img');
                @endphp
                <img src="{{ @$image }}" id="photospp" class="photo">
                <input type="file" id="filespp" class="file" onclick="uploadImgae('filespp','photospp')" name="main_sec_image">
                <label for="filespp" id="uploadBtn">Choose Image</label>
            </div>
        </div>
    </div>
    
</div> 
    
@endif
@if (!empty($special_section2))
<div class="kt-portlet" id="sections">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h5 class="card-title">Special Section</h5>
        </div>

    </div>

    <div class="row" id="section{{ $special_section2->id }}">


        <div class="col-md-6">

            <span class="kt-switch kt-switch--outline kt-switch--icon kt-switch--success">
                <label>
                    <input onclick="section_status({{ $special_section2->id }})" type="checkbox"
                        id="section_status{{ $special_section2->id }}"
                        {{ ($special_section2->section_status==1) ? 'checked':'' }}>
                    <span></span>
                </label>
            </span>

            <div class="form-group input-field">
                <label>Heading</label>
                <input type="text" class="form-control" aria-describedby="emailHelp"
                    name="special_sec2_heading" value="{{ $special_section2->section_heading }}"
                    required>
                <input type="hidden" name="special_sec2_id" value="{{ $special_section2->id }}">
            </div>
            

        </div>

        <div class="col-md-6">
            <div class="profile-pic-div" id="profile-pic-div">
                @php
                $image=@$helpers->get_image($special_section2->section_image, 'img');
                @endphp
                <img src="{{ @$image }}" id="photosp2=" class="photo">
                <input type="file" id="filesp2" class="file" onclick="uploadImgae('filesp2','photosp2')"
                    name="special_sec2_image">
                <label for="filesp2" id="uploadBtn">Choose Image</label>
            </div>
        </div>
    </div>

</div>

@endif
@if (!empty($special_section3))

    <div class="kt-portlet" id="sections">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h5 class="card-title">Special Section</h5>
            </div>
    
        </div>
    
        <div class="row" id="section{{ $special_section3->id }}">
    
    
            <div class="col-md-6">
    
                <span class="kt-switch kt-switch--outline kt-switch--icon kt-switch--success">
                    <label>
                        <input onclick="section_status({{ $special_section3->id }})" type="checkbox"
                            id="section_status{{ $special_section3->id }}"
                            {{ ($special_section3->section_status==1) ? 'checked':'' }}>
                        <span></span>
                    </label>
                </span>
    
                <div class="form-group input-field">
                    <label>Heading</label>
                    <input type="text" class="form-control" aria-describedby="emailHelp"
                        name="special_sec3_heading"
                        value="{{ $special_section3->section_heading }}" required>
                    <input type="hidden" name="special_sec3_id" value="{{ $special_section3->id }}">
                </div>
                <div class="form-group input-field">
                    <label>Button Link</label>
                    <input type="text" class="form-control" aria-describedby="emailHelp" name="special_sec3_btn"
                        value="{{ @$special_section3->section_btn_link }}" required>
                </div>
                <div class="form-group input-field">
                    <label for="exampleInputPassword1">Section Description</label>
                    <textarea class="form-control ckeditor" name="special_sec3_des" id="exampleTextarea" rows="10">
                    {{ html_entity_decode(htmlspecialchars_decode(@$special_section3->section_description)) }}</textarea>
                </div>
    
    
            </div>
    
            <div class="col-md-6">
                <div class="profile-pic-div" id="profile-pic-div">
                    @php
                    $image=@$helpers->get_image($special_section3->section_image, 'img');
                    @endphp
                    <img src="{{ @$image }}" id="photosp3" class="photo">
                    <input type="file" id="filesp3" class="file" onclick="uploadImgae('filesp3','photosp3')"
                        name="special_sec3_image">
                    <label for="filesp3" id="uploadBtn">Choose Image</label>
                </div>
            </div>
        </div>
    
    </div>

    
@endif


@if (!empty($special_section4))
{
<div class="kt-portlet" id="sections">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h5 class="card-title">Special Section</h5>
        </div>

    </div>

    <div class="row" id="section{{ $special_section4->id }}">


        <div class="col-md-6">

            <span class="kt-switch kt-switch--outline kt-switch--icon kt-switch--success">
                <label>
                    <input onclick="section_status({{ $special_section4->id }})" type="checkbox"
                        id="section_status{{ $special_section4->id }}"
                        {{ ($special_section4->section_status==1) ? 'checked':'' }}>
                    <span></span>
                </label>
            </span>

            <div class="form-group input-field">
                <label>Heading</label>
                <input type="text" class="form-control" aria-describedby="emailHelp"
                    name="special_sec4_heading"
                    value="{{ $special_section4->section_heading }}" required>
            </div>
            <div class="form-group input-field">
                <label>Button Link</label>
                <input type="text" class="form-control" aria-describedby="emailHelp" name="special_sec4_btn"
                    value="{{ @$special_section4->section_btn_link }}" required>
            </div>
        

        </div>

        <div class="col-md-6">
            <div class="profile-pic-div" id="profile-pic-div">
                @php
                $image=@$helpers->get_image($special_section4->section_image, 'img');
                @endphp
                <img src="{{ @$image }}" id="photosp4" class="photo">
                <input type="file" id="filesp4" class="file" onclick="uploadImgae('filesp4','photosp4')"
                    name="special_sec4_image">
                <label for="filesp4" id="uploadBtn">Choose Image</label>
            </div>
        </div>
    </div>

</div>
}

@endif
@if (!empty($special_section5))

<div class="kt-portlet" id="sections">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h5 class="card-title">Special Section</h5>
        </div>

    </div>

    <div class="row" id="section{{ $special_section5->id }}">


        <div class="col-md-6">

            <span class="kt-switch kt-switch--outline kt-switch--icon kt-switch--success input-field">
                <label>
                    <input onclick="section_status({{ $special_section5->id }})" type="checkbox"
                        id="section_status{{ $special_section5->id }}"
                        {{ ($special_section5->section_status==1) ? 'checked':'' }}>
                    <span></span>
                </label>
            </span>

            <div class="form-group input-field">
                <label>Heading</label>
                <input type="text" class="form-control" aria-describedby="emailHelp" name="special_sec5_heading"
                    value="{{ $special_section5->section_heading }}" required>
                <input type="hidden" name="special_sec5_id" value="{{ $special_section5->id }}">
            </div>
            <div class="form-group input-field">
                <label>Sub Heading</label>
                <input type="text" class="form-control" aria-describedby="emailHelp" name="special_sec5_subheading"
                    value="{{ $special_section5->section_sub_heading }}" required>
                
            </div>
            
            <div class="form-group input-field">
                <label for="exampleInputPassword1">Section Description</label>
                <textarea class="form-control ckeditor" name="special_sec5_des" id="exampleTextarea" rows="10">
                {{ html_entity_decode(htmlspecialchars_decode(@$special_section5->section_description)) }}</textarea>
            </div>


        </div>

        <div class="col-md-6">
            <div class="profile-pic-div" id="profile-pic-div">
                @php
                $image=@$helpers->get_image($special_section5->section_image, 'img');
                @endphp
                <img src="{{ @$image }}" id="photosp6" class="photo">
                <input type="file" id="filesp6" class="file" onclick="uploadImgae('filesp6','photosp6')"
                    name="special_sec5_image">
                <label for="filesp6" id="uploadBtn">Choose Image</label>
            </div>
        </div>
    </div>

</div>


@endif

@if (!empty($special_section6))

<div class="kt-portlet" id="sections">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h5 class="card-title">Special Section</h5>
        </div>

    </div>

    <div class="row" id="section{{ $special_section6->id }}">


        <div class="col-md-6">

            <span class="kt-switch kt-switch--outline kt-switch--icon kt-switch--success">
                <label>
                    <input onclick="section_status({{ $special_section6->id }})" type="checkbox"
                        id="section_status{{ $special_section6->id }}"
                        {{ ($special_section6->section_status==1) ? 'checked':'' }}>
                    <span></span>
                </label>
            </span>

            <div class="form-group input-field">
                <label>Heading</label>
                <input type="text" class="form-control" aria-describedby="emailHelp" name="special_sec6_heading"
                    value="{{ $special_section6->section_heading }}" required>
                <input type="hidden" name="special_sec6_id" value="{{ $special_section6->id }}">
            </div>
            


        </div>

        <div class="col-md-6">
            <div class="profile-pic-div" id="profile-pic-div">
                @php
                $image=@$helpers->get_image($special_section6->section_image, 'img');
                @endphp
                <img src="{{ @$image }}" id="photospp6" class="photo">
                <input type="file" id="filespp6" class="file" onclick="uploadImgae('filespp6','photospp6')"
                    name="special_sec6_image">
                <label for="filespp6" id="uploadBtn">Choose Image</label>
            </div>
        </div>
    </div>

</div>


@endif
{{-- -----------------sections loop--------------- --}}
@if ($page_type!='leadership')

<div class="kt-portlet" id="sections">
    <div class="kt-portlet__head">
       
        <div class="kt-portlet__head-label">
           
            <h5 class="card-title">Sections </h5>
        </div>
        <a class="btn btn-info pull-right section-add" href="javascript:;" onclick="div_append()">
            <i class="fa fa-plus"></i>
        </a>
        
    </div>
    
    {{-- ------------------------------------- --}}
   
        
    
    <div class='main-section-wrapper'>
        @foreach ($sections as $key => $item)
            <div class="row" id="section{{ $item->id }}" style="border-bottom: 1px solid #a8b1cc;">

                <div class="col-md-12">
                    <div class="delete-section-wrapper" style="float:right;margin-right: 25px;">
                        <span  onclick="delete_section({{ $item->id }})">
                            <a href="javascript:;" class="section-remove btn btn-danger">
                                <i class="fa fa-trash"></i>
                            </a>
                        </span>
                    </div>
                </div>
            
                <div class="col-md-6">

                    <div class="form-group input-field">
                        <label>Heading</label>
                        <input type="text" class="form-control" aria-describedby="emailHelp" name="section[{{ $item->id }}][heading]"
                            value="{{ $item->section_heading }}" required>
                    </div>
                    <div class="form-group form-group-last input-field">
                        <label for="exampleTextarea">Description</label>
                        <textarea class="form-control ckeditor" name="section[{{ $item->id }}][description]" id="exampleTextarea" rows="3">
                        {{ html_entity_decode(htmlspecialchars_decode(@$item->section_description)) }}</textarea>
                    </div>
                    <div class="form-group input-field">
                        <label>Position</label>
                        <input type="text" class="form-control" aria-describedby="emailHelp" name="section[{{ $item->id }}][heading]"
                            value="{{ $item->section_heading }}" required>
                    </div>

                    <div class="form-group input-field">
                        <span class="kt-switch kt-switch--outline kt-switch--icon kt-switch--success">
                            <label>
                                <input name="section[{{ $item->id }}][status]" value="1" onclick="section_status({{ $item->id }})"
                                    type="checkbox" id="section_status{{ $item->id }}" {{ ($item->section_status==1) ? 'checked':'' }}>
                                <span></span>
                            
                            </label>
                        </span>
                    </div>
                    
                </div>
                <div class="col-md-6">
                    <div class="profile-pic-div" id="profile-pic-div">
                        @php
                        $image=@$helpers->get_image($item->section_image, 'img');
                        @endphp
                        <img src="{{ @$image }}" id="photo{{ $key }}" class="photo">
                        <input type="file" id="file{{ $key }}" class="file" onclick="uploadImgae('file{{ $key }}','photo{{ $key }}')" name="section[{{ $item->id }}][image]">
                        <label for="file{{ $key }}" id="uploadBtn">Choose Image</label>
                    </div>  
                </div>
            </div>
        @endforeach
    </div>
   
     
    <!--end::Form-->
</div>
@endif
<div class="kt-portlet__foot input-field">
    <div class="kt-form__actions">
        <input type="submit" class="btn btn-primary" value="Update"></button>
        {{-- <button type="reset" class="btn btn-secondary">Cancel</button> --}}
    </div>
</div>
</form>


    <script>
        function section_status(id) {
            if($("#section_status"+id).prop('checked') == true){
            var status=1;
            }
            if($("#section_status"+id).prop('checked') == false){
            var status=0;
            }
            $.ajax({
            type: "POST",
            url: '{{url("admin/section_status")}}',
            data:{'id':id, 'status':status, "_token": "{{ csrf_token() }}"},
            dataType: 'json',
                success: function(data){
                
                if(data.success==1)
                {
                    if(status==1)
                    {
                        $("#section_status-"+id).removeAttr('checked');
                    }
                    if(status==0)
                    {
                        $("#section_status-"+id).addAttr('checked');
                    }
                
                }
                
                
                }
            });
        }

         function delete_section(id) {
            
            $.ajax({
            type: "POST",
            url: '{{url("admin/delete_section")}}',
            data:{'id':id, "_token": "{{ csrf_token() }}"},
            dataType: 'json',
                success: function(data){
                if(data.success==1)
                {
                    $("#section"+id).remove();
                }
                }
            });

            
        }

        var i = 1;
        function div_append(itenm_id="") {

            var sectiondiv = '<div class="row" id="section'+i+'" style="border-bottom: 1px solid #a8b1cc;">'+
            '<div class="col-md-12">'+
                   ' <div class="delete-section-wrapper" style="float:right;margin-right: 25px;">'+
                       '<span onclick="deleteSection('+i+')">'+
                            '<a href="javascript:;" class="section-remove btn btn-danger">'+
                               ' <i class="fa fa-trash"></i>'+
                            '</a>'+
                        '</span>'+
                   ' </div>'+
                '</div>'+
            
               ' <div class="col-md-6">'+
                    '<div class="form-group input-field">'+
                        '<label>Heading</label>'+
                       ' <input type="text" class="form-control" aria-describedby="emailHelp" name="more_section['+i+'][heading]"  required>'+
                    '</div>'+
                   ' <div class="form-group form-group-last input-field">'+
                      '  <label for="exampleTextarea">Description</label>'+
                       ' <textarea class="form-control ckeditor" name="more_section['+i+'][description]" id="exampleTextarea" rows="3">'+
                       ' </textarea>'+
                   ' </div>'+
                  
            
                   ' <div class="form-group input-field">'+
                       ' <span class="kt-switch kt-switch--outline kt-switch--icon kt-switch--success">'+
                          '  <label>'+
                              '  <input name="section[]" value="1" name="more_section['+i+'][status]" type="checkbox"   > '+
                               ' <span></span>'+
            
                           ' </label>'+
                       ' </span>'+
                    '</div>'+
            
               ' </div>'+
            
               ' <div class="col-md-6">'+
                   ' <div class="profile-pic-div" id="profile-pic-div">'+
                   
                        '<img src="" id="photomore" class="photo">'+
                       ' <input type="file" id="filemore" class="file" onclick="uploadImgae(\'photomore\' , \'filemore\')" name="more_section['+i+'][image]">'+
                       ' <label for="filemore" id="uploadBtn">Choose Image</label>'+
                   ' </div>'+
               ' </div>'+
            '</div>';


            $('.main-section-wrapper').append(sectiondiv);
            i++;
            
        }

        function deleteSection(key) {
            $('#section'+key).remove();
        }
        </script>
@endsection