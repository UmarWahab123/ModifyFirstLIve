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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<div class="kt-subheader   kt-grid__item" id="kt_subheader">
    <div class="kt-container  kt-container--fluid ">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">Sub Sections</h3>
            <span class="kt-subheader__separator kt-hidden"></span>
            <div class="kt-subheader__breadcrumbs">
                <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                <span class="kt-subheader__breadcrumbs-separator"></span>
                <a href="" class="kt-subheader__breadcrumbs-link">
                    Edit Sub Sections </a>
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
            <h3 class="kt-portlet__head-title">Edit Sub Sections</h3>
        </div>
    </div>
    <!--begin::Form-->
    <form class="kt-form" action="{{ url('admin/update_sub') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-md-6">
                <div class="form-group input-field" id="section_heading_div">
                    <label>Heading</label>
                    <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Section Heading"
                        value="{{ @$section->section_heading }}" name="section_heading" id="section_heading">
                    <input type="hidden" name="section_id" id="section_id" value="{{ $section->id }}">

                </div>
            </div>
            
            <div class="col-md-6">
                <div class="form-group input-field ckEditorCustom">
                    
                    <label for="exampleInputPassword1" id="label_des">Section Description</label>
                    <textarea class="form-control ckeditor" name="section_description" id="section_description" rows="10">
                    {{ html_entity_decode(htmlspecialchars_decode(@$section->section_description)) }}</textarea>

                </div>
            </div>
                
        </div>
        <div class="kt-portlet__foot">
            <div class="kt-form__actions">
                <input type="button" onclick="update()" class="btn btn-primary" value="Update">
        
            </div>
        </div>
        </form>
        <h3 class="input-field"> Why we no 1</h3>
        <div class="row">
            
        @if(!empty($sub_sections))
        @foreach ($sub_sections as $item)
        
        <div class="col-md-6">
            <div class="row">
                
                 <div class="form-group input-field col-md-6">
                    <label>Name</label>
                    <input type="text" class="form-control" placeholder="Name"
                        value="{{ @$item->section_name }}" name="name" id="name{{ $item->id }}" required>

                    <input type="hidden" name="sub_section_id" value="{{ $item->id }}">
                
                </div>
                <div class="form-group input-field col-md-3">
                    
                   <input type="button" style="margin-top:24px" onclick="change_status({{ $item->id }})" class="btn btn-success" value="Update">
                
                </div>
                
            </div>
            
                <div class="row">
                <div class="col-md-6">
                <div class="form-group input-field ">
                    <span class="kt-switch kt-switch--outline kt-switch--icon kt-switch--success input-field">
                        <span>Compitator 1</span>
                        <label>
                            <input type="checkbox" id="compitator1{{ $item->id }}"
                             {{ ($item->competitor_1==1) ? 'checked':'' }}>
                            <span></span>
                        </label>
                </span>
                </div>  
                <div class="form-group input-field">
                    <span class="kt-switch kt-switch--outline kt-switch--icon kt-switch--success input-field">
                        <span>Compitator 2</span>
                        <label>
                            <input type="checkbox" {{ ($item->competitor_2==1) ? 'checked':'' }} id="compitator2{{ $item->id }}">
                            <span></span>
                        </label>
                    </span>
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group input-field ">
                    <span class="kt-switch kt-switch--outline kt-switch--icon kt-switch--success input-field">
                        <span>Compitator 3</span>
                        <label>
                            <input type="checkbox" {{ ($item->competitor_3==1) ? 'checked':'' }}
                            id="compitator3{{ $item->id }}">
                            <span></span>
                        </label>
                    </span>
                </div>
                <div class="form-group input-field">
                    <span class="kt-switch kt-switch--outline kt-switch--icon kt-switch--success input-field">
                        <span>Dealer Gear</span>
                        <label>
                            <input type="checkbox" {{ ($item->dealer_gear==1) ? 'checked':'' }} id="dealer_gear{{ $item->id }}">
                            <span></span>
                        </label>
                    </span>
                </div>
                </div>
                </div>
                
            </div>
            
            @endforeach
            @endif
        </div>
        <div class="row" id="more_sections">
            <input type="button" class="btn button-success" value="Add More" onclick="add_more()">
            <div class="col-md-6">
            </div>
        </div>
        
</div>

<script>
    var i=100;
    function add_more() {
        var html='<div class="col-md-6">'+
            '<div class="row">'+
        
                '<div class="form-group input-field col-md-6">'+
                    '<label>Name</label>'+
                    '<input type="text" class="form-control" placeholder="Name" name="name" id="name'+i+'" required>'+
                '</div>'+
                '<div class="form-group input-field col-md-3">'+
        
                    '<input type="button" style="margin-top:24px" onclick="save_new('+i+')" class="btn btn-success" value="Save">'+
        
                '</div>'+
        
            '</div>'+
        
            '<div class="row">'+
                '<div class="col-md-6">'+
                    '<div class="form-group input-field ">'+
                        '<span class="kt-switch kt-switch--outline kt-switch--icon kt-switch--success input-field">'+
                            '<span>Compitator 1</span>'+
                            '<label>'+
                                '<input type="checkbox" id="compitator1'+i+'">'+
                                '<span></span>'+
                            '</label>'+
                        '</span>'+
                    '</div>'+
                    '<div class="form-group input-field">'+
                        '<span class="kt-switch kt-switch--outline kt-switch--icon kt-switch--success input-field">'+
                            '<span>Compitator 2</span>'+
                            '<label>'+
                                '<input type="checkbox" id="compitator2'+i+'">'+
                                '<span></span>'+
                            '</label>'+
                        '</span>'+
                    '</div>'+
                '</div>'+
                '<div class="col-md-6">'+
                    '<div class="form-group input-field ">'+
                        '<span class="kt-switch kt-switch--outline kt-switch--icon kt-switch--success input-field">'+
                            '<span>Compitator 3</span>'+
                            '<label>'+
                                '<input type="checkbox" id="compitator3'+i+'">'+
                                '<span></span>'+
                            '</label>'+
                        '</span>'+
                    '</div>'+
                    '<div class="form-group input-field">'+
                        '<span class="kt-switch kt-switch--outline kt-switch--icon kt-switch--success input-field">'+
                            '<span>Dealer Gear</span>'+
                            '<label>'+
                                '<input type="checkbox" id="dealer_gear'+i+'">'+
                                '<span></span>'+
                            '</label>'+
                        '</span>'+
                    '</div>'+
                '</div>'+
            '</div>'+
        
        '</div>'
        $('#more_sections').append(html);
        i++;
        
    }
    function save_new(id) {
      var name=document.getElementById("name"+id).value;
      //alert(name);  
        if(name=="")
        {
        document.getElementById("name"+id).style.border = "1px solid red";
        return false;
        }else{
        document.getElementById("name"+id).style.border = "none";
        }
        if($("#compitator1"+id).prop('checked') == true){
        var comp1=1;
        }
        if($("#compitator1"+id).prop('checked') == false){
        var comp1=0;
        }
        if($("#compitator2"+id).prop('checked') == true){
        var comp2=1;
        }
        if($("#compitator2"+id).prop('checked') == false){
        var comp2=0;
        }
        if($("#compitator3"+id).prop('checked') == true){
        var comp3=1;
        }
        if($("#compitator3"+id).prop('checked') == false){
        var comp3=0;
        }
        if($("#dealer_gear"+id).prop('checked') == true){
        var d_g=1;
        }
        if($("#dealer_gear"+id).prop('checked') == false){
        var d_g=0;
        }
        $.ajax({
        type: "POST",
        url: '{{url("admin/add_sub_section")}}',
        data:{'id':id,
        'comp1':comp1,
        'comp2':comp2,
        'comp3':comp3,
        'd_g':d_g,
        'name':name,
        'page_slug':"{{ @$page_slug }}",
        
        "_token": "{{ csrf_token() }}"},
        dataType: 'json',
        success: function(data){
        
        if(data.success==1)
        {
        Swal.fire("Added");
        }
        
        }
        });
    }
    function change_status(id) {
    var name=document.getElementById("name"+id).value;

    
    if(name=="")
    {
    document.getElementById("name"+id).style.border = "1px solid red";
    return false;
    }else{
        document.getElementById("name"+id).style.border = "none";
    }

    if($("#compitator1"+id).prop('checked') == true){
        var comp1=1;
    }
    if($("#compitator1"+id).prop('checked') == false){
        var comp1=0;
    }
    if($("#compitator2"+id).prop('checked') == true){
    var comp2=1;
    }
    if($("#compitator2"+id).prop('checked') == false){
    var comp2=0;
    }
    if($("#compitator3"+id).prop('checked') == true){
    var comp3=1;
    }
    if($("#compitator3"+id).prop('checked') == false){
    var comp3=0;
    }
    if($("#dealer_gear"+id).prop('checked') == true){
    var d_g=1;
    }
    if($("#dealer_gear"+id).prop('checked') == false){
    var d_g=0;
    }
    
    $.ajax({
    type: "POST",
    url: '{{url("admin/sub_section_status")}}',
    data:{'id':id,
          'comp1':comp1,
          'comp2':comp2,
          'comp3':comp3,
          'd_g':d_g,
          'name':name,
          
          "_token": "{{ csrf_token() }}"},
    dataType: 'json',
        success: function(data){
        
            if(data.success==1)
            {
                Swal.fire("Updated");
            }
    
        }
        });
    }
    
    </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function update() {
        var heading=document.getElementById("section_heading").value;
        
        //var des=document.getElementById("section_description").value;
        var desc = CKEDITOR.instances['section_description'].getData();
        
        //alert(desc);
        var id=document.getElementById("section_id").value;
        if(heading=="")
        {
        document.getElementById("section_heading").style.border = "1px solid red";
        return false;
        }
        if(desc=="")
        {
        
        document.getElementById("label_des").style.border = "1px solid red";
        return false;
        }
        $.ajax({
        type: "POST",
        url: '{{url("admin/update_sub")}}',
        data:{  'id':id,
                'heading':heading,
                'des':desc,
                "_token": "{{ csrf_token() }}"},
        dataType: 'json',
        success: function(data){
        
        if(data.success==1)
        {
            Swal.fire(
            'Updated'
            )
        }
        }
        });
        }
        </script>
        
@endsection