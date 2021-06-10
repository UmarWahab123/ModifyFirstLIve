<?php

namespace App\Http\Controllers;

use App\Models\Blog_post;
use Illuminate\Http\Request;
use App\Models\Page_section;
use App\Models\Cms_setting;
use App\Models\Page;
use DB;
use Illuminate\Support\Str;


class AdminController extends Controller
{

	// public function __construct(){
    //    $this->middleware('auth');
    // }


    public function index($value='')
    {
        return view('admin/dashboard');
    }
    public function settings(){
        $settings=DB::table('cms_settings')->first();
        return view('admin.cms.settings', compact('settings'));
    }

    public function update_settings(Request $req){
        
        $upd_arr=array();
        if ($req->hasfile('image')) {
            $file = $req->file('image');
            if ($file->isValid()) {
                $ext = $file->extension();
                $path = public_path('uploads/logo/');
                $prefix = 'logo-' . md5(time());
                $img_name = $prefix . '.' . $ext;
                if ($file->move($path, $img_name)) {
                    $upd_arr['logo'] = $img_name;
                }
            }
        }
        if(!empty($req->email))
        {
            $upd_arr['email']=$req->email;
        }
        if (!empty($req->cell)) {
            $upd_arr['cell_number'] = $req->cell;
        }
        if (!empty($req->address)) {
            $upd_arr['address'] = $req->address;
        }
        if (!empty($req->facebook)) {
            $upd_arr['facebook'] = $req->facebook;
        }
        if (!empty($req->instagram)) {
            $upd_arr['instagram'] = $req->instagram;
        }
        if (!empty($req->twitter)) {
            $upd_arr['instagram'] = $req->instagram;
        }
        if (!empty($req->linkdin)) {
            $upd_arr['linkdin'] = $req->linkdin;
        }
        if (!empty($req->youtube)) {
            $upd_arr['youtube'] = $req->youtube;
        }
        $upd=DB::table('cms_settings')->where('id', 1)->update($upd_arr);
        if($upd){
            return redirect('/settings');
        }else {
            abort(403, "Forbidden");
        }
        
    }

    public function edit_page($page_slug=""){
        if(!empty($page_slug)){
        $page=DB::table('pages')->where('page_slug', '=', $page_slug)->first();
        if($page)
        {
            $sections=DB::table('page_sections')->where('page_id', '=', $page->id)->where('section_type', '=', 0)->get();
            $main_section=DB::table('page_sections')->where('page_id', '=', $page->id)->where('section_type', '=', 1)->first();
            $special_section=DB::table('page_sections')->where('page_id', '=', $page->id)->where('section_type', '=', 2)->first();
            $form_section = DB::table('page_sections')->where('page_id', '=', $page->id)->where('section_type', '=', 3)->first();
            $alert_section = DB::table('page_sections')->where('page_id', '=', $page->id)->where('section_type', '=', 4)->first();
            $special_section2=DB::table('page_sections')->where('page_id', '=', $page->id)->where('section_type', '=', 5)->first();
            $special_section3 = DB::table('page_sections')->where('page_id', '=', $page->id)->where('section_type', '=', 6)->first();
            $special_section4 = DB::table('page_sections')->where('page_id', '=', $page->id)->where('section_type', '=', 7)->first();
            $special_section5 = DB::table('page_sections')->where('page_id', '=', $page->id)->where('section_type', '=', 8)->first();
            $special_section6 = DB::table('page_sections')->where('page_id', '=', $page->id)->where('section_type', '=', 9)->first();
            $page_slug= $page_slug;
            $page_type = $page->page_key;


            //echo "<pre>"; print_r($special_section); exit;
            return view('admin.cms.edit_page', compact('page', 'special_section6', 'sections', 'special_section5', 'page_type', 'special_section4', 'special_section3', 'main_section', 'page_slug', 'special_section','form_section', 'alert_section', 'special_section2'));
        }else {
            abort(403, 'Forbidden');
        }
        }else {
            abort(404, 'Not Found');
        }
    }
    public function section_status(Request $req){
        $upd['section_status']=$req->status;
        $status=DB::table('page_sections')->where('id','=', $req->id)->update($upd);
        if($status)
        {
            $msg = 1;
            return response()->json(['success' => $msg]);
        }
    }
    public function sub_section_status(Request $req)
    {
        $upd['section_name'] = $req->name;
        $upd['competitor_1'] = $req->comp1;
        $upd['competitor_2'] = $req->comp2;
        $upd['competitor_3'] = $req->comp3;
        $upd['dealer_gear'] = $req->d_g;
        $upd['updated_at'] = date('Y-m-d H:i:s');
        $status = DB::table('sub_sections')->where('id', '=', $req->id)->update($upd);
        if ($status) {
            $msg = 1;

            return response()->json(['success' => $msg]);
        }
    }
    public function add_sub_section(Request $req)
    {
        $i=array();
        $i['section_name']=$req->name;
        $i['competitor_1'] = $req->comp1;
        $i['competitor_2'] = $req->comp2;
        $i['competitor_3'] = $req->comp3;
        $i['dealer_gear'] = $req->d_g;
        
        $i['created_at'] = date('Y-m-d H:i:s');
        $page=DB::table('pages')->where('page_slug', '=', $req->page_slug)->first();
        $i['page_id'] = $page->id;
        $status = DB::table('sub_sections')->insert($i);
        if ($status) {
            $msg = 1;

            return response()->json(['success' => $msg]);
        }
    }
    public function update_sub(Request $req)
    {
        $upd=array();
        if(!empty($req->heading))
        {
            $upd['section_heading']=$req->heading;
        }
        if (!empty($req->des)) {
            $upd['section_description'] = $req->des;
        }
        $upd['updated_at']=date('Y-m-d H:i:s');
        $status = DB::table('page_sections')->where('id', '=', $req->id)->update($upd);
        if ($status) {
            $msg = 1;

            return response()->json(['success' => $msg]);
        }

    }
    
    public function delete_section(Request $req){
        $del=DB::table('page_sections')->where('id', '=', $req->id)->delete();
        if ($del) {
            $msg = 1;
            return response()->json(['success' => $msg]);
        }
    }
    
    public function update_page(Request $req){
        $page=array();
        $page_id=$req->page_id;
        if(isset($req->page_name) && !empty($req->page_name))
        {
            $page['page_name']=$req->page_name;
            $page['page_slug']=Str::slug($req->page_name);
        }
        if (isset($req->page_meta_tag) && !empty($req->page_meta_tag)) {
            $page['meta_title'] = $req->page_meta_tag;
        }
        if (isset($req->page_meta_description) && !empty($req->page_meta_description)) {
            $page['meta_description'] = $req->page_meta_description;
        }
        if ($req->hasfile('page_image')) {
            $file = $req->file('page_image');
            if ($file->isValid()) {
                $ext = $file->extension();
                $path = public_path('uploads/img/');
                $prefix = $req->page_slug.'-' . md5(time());
                $img_name = $prefix . '.' . $ext;
                if ($file->move($path, $img_name)) {
                    $page['page_image'] = $img_name;
                }
            }
        }
        Page::where('id', $page_id)->update($page);
        //exit;

        //echo "<pre>"; print_r($page); exit;
        ////////////////////////////////////////////main section ////////////    
        
        $main_section = array();
        $main_section_id=$req->main_section_id;
        if (isset($req->main_sec_heading) && !empty($req->main_sec_heading)) {
            $main_section['section_heading'] = $req->main_sec_heading;
        }
        if (isset($req->main_sec_sub_heading) && !empty($req->main_sec_sub_heading)) {
            $main_section['section_sub_heading'] = $req->main_sec_sub_heading;
        }
        if (isset($req->main_sec_btn) && !empty($req->main_sec_btn)) {
            $main_section['section_btn_link'] = $req->main_sec_btn;
        }
        if (isset($req->main_sec_alert) && !empty($req->main_sec_alert)) {
            $main_section['section_alert'] = $req->main_sec_alert;
        }
        if (isset($req->main_sec_des) && !empty($req->main_sec_des)) {
            $main_section['section_description'] = $req->main_sec_des;
        }
        if (isset($req->main_sec_youtube) && !empty($req->main_sec_youtube)) {
            $main_section['youtube_link'] = $req->main_sec_youtube;
        }
        if ($req->hasfile('main_sec_image')) {
            $file = $req->file('main_sec_image');
            if ($file->isValid()) {
                $ext = $file->extension();
                $path = public_path('uploads/img/');
                $prefix = $req->page_slug . '-section-' . md5(time());
                $img_name = $prefix . '.' . $ext;
                if ($file->move($path, $img_name)) {
                    $main_section['section_image'] = $img_name;
                }
            }
        }
        Page_section::where('id', $main_section_id)->update($main_section);
        
        //echo "<pre>"; print_r($main_section); exit;

        ////////////////////////////////////////////Alert section ////////////   

        $alert_section = array();
        $alert_section_id = $req->alert_sec_id;
        if (isset($req->alert_sec_heading) && !empty($req->alert_sec_heading)) {
            $alert_section['section_heading'] = $req->alert_sec_heading;
        }

        if (isset($req->alert_sec_des) && !empty($req->alert_sec_des)) {
            $alert_section['section_description'] = $req->alert_sec_des;
        }

        
        if ($req->hasfile('alert_sec_image')) {
            $file = $req->file('alert_sec_image');
            if ($file->isValid()) {
                $ext = $file->extension();
                $path = public_path('uploads/img/');
                $prefix = $req->page_slug . '-section-' . md5(time());
                $img_name = $prefix . '.' . $ext;
                if ($file->move($path, $img_name)) {
                    $alert_section['section_image'] = $img_name;
                }
            }
        }
        Page_section::where('id', $alert_section_id)->update($alert_section);
        //echo "<pre>"; print_r($alert_section); exit;
        ////////////////////////////////////////////form section ////////////   

        $form_section = array();
        $form_section_id = $req->form_sec_id;
        if (isset($req->form_sec_heading) && !empty($req->form_sec_heading)) {
            $form_section['section_heading'] = $req->form_sec_heading;
        }

        if (isset($req->form_sec_des) && !empty($req->form_sec_des)) {
            $form_section['section_description'] = $req->form_sec_des;
        }
        Page_section::where('id', $form_section_id)->update($form_section);
        //echo "<pre>"; print_r($alert_section); exit;
        ////////////////////////////////////////////form section ////////////   

        
        if(isset($req->special_sec_id) && !empty($req->special_sec_id)){
        $special_section = array();
        $spec_section_id = $req->special_sec_id;
        if (isset($req->special_sec_heading) && !empty($req->special_sec_heading)) {
            $special_section['section_heading'] = $req->special_sec_heading;
        }

        if (isset($req->special_sec_des) && !empty($req->special_sec_des)) {
                $special_section['section_description'] = $req->special_sec_des;
        }
            if ($req->hasfile('special_sec_image')) {
                $file = $req->file('special_sec_image');
                if ($file->isValid()) {
                    $ext = $file->extension();
                    $path = public_path('uploads/img/');
                    $prefix = $req->page_slug . '-section-' . md5(time());
                    $img_name = $prefix . '.' . $ext;
                    if ($file->move($path, $img_name)) {
                        $special_section['section_image'] = $img_name;
                    }
                }
            }
            Page_section::where('id', $spec_section_id)->update($special_section);
            //echo "<pre>"; print_r($special_section); exit;
        }
        
        if (isset($req->special_sec2_id) && !empty($req->special_sec2_id)) {
            $special_section2 = array();
            $spec_section2_id = $req->special_sec2_id;
            if (isset($req->special_sec2_heading) && !empty($req->special_sec2_heading)) {
                $special_section2['section_heading'] = $req->special_sec2_heading;
            }

            if ($req->hasfile('special_sec2_image')) {
                $file = $req->file('special_sec2_image');
                if ($file->isValid()) {
                    $ext = $file->extension();
                    $path = public_path('uploads/img/');
                    $prefix = $req->page_slug . '-section-' . md5(time());
                    $img_name = $prefix . '.' . $ext;
                    if ($file->move($path, $img_name)) {
                        $special_section2['section_image'] = $img_name;
                    }
                }
            }
            Page_section::where('id', $spec_section2_id)->update($special_section2);
            //echo "<pre>"; print_r($special_section2); exit;
        }

        if (isset($req->special_sec3_id) && !empty($req->special_sec3_id)) {
            $special_section3 = array();
            $spec_section3_id = $req->special_sec3_id;
            if (isset($req->special_sec3_heading) && !empty($req->special_sec3_heading)) {
                $special_section3['section_heading'] = $req->special_sec3_heading;
            }

            if (isset($req->special_sec3_des) && !empty($req->special_sec3_des)) {
                $special_section3['section_description'] = $req->special_sec3_des;
            }
            if (isset($req->special_sec3_btn) && !empty($req->special_sec3_btn)) {
                $special_section3['section_btn_link'] = $req->special_sec3_btn;
            }
            if ($req->hasfile('special_sec3_image')) {
                $file = $req->file('special_sec3_image');
                if ($file->isValid()) {
                    $ext = $file->extension();
                    $path = public_path('uploads/img/');
                    $prefix = $req->page_slug . '-section-' . md5(time());
                    $img_name = $prefix . '.' . $ext;
                    if ($file->move($path, $img_name)) {
                        $special_section3['section_image'] = $img_name;
                    }
                }
            }
            Page_section::where('id', $spec_section3_id)->update($special_section3);
            //echo "<pre>"; print_r($special_section3); exit;
        }

        if (isset($req->special_sec4_id) && !empty($req->special_sec4_id)) {
            $special_section4 = array();
            $spec_section4_id = $req->special_sec4_id;
            if (isset($req->special_sec4_heading) && !empty($req->special_sec4_heading)) {
                $special_section4['section_heading'] = $req->special_sec4_heading;
            }

            
            if (isset($req->special_sec4_btn) && !empty($req->special_sec4_btn)) {
                $special_section4['section_btn_link'] = $req->special_sec4_btn;
            }
            if ($req->hasfile('special_sec4_image')) {
                $file = $req->file('special_sec4_image');
                if ($file->isValid()) {
                    $ext = $file->extension();
                    $path = public_path('uploads/img/');
                    $prefix = $req->page_slug . '-section-' . md5(time());
                    $img_name = $prefix . '.' . $ext;
                    if ($file->move($path, $img_name)) {
                        $special_section4['section_image'] = $img_name;
                    }
                }
            }
            
            Page_section::where('id', $spec_section4_id)->update($special_section4);
            //echo "<pre>"; print_r($special_section4); exit;
        }

        if (isset($req->special_sec5_id) && !empty($req->special_sec5_id)) {
            $special_section5 = array();
            $spec_section5_id = $req->special_sec5_id;
            if (isset($req->special_sec5_heading) && !empty($req->special_sec5_heading)) {
                $special_section5['section_heading'] = $req->special_sec5_heading;
            }
            if (isset($req->special_sec5_subheading) && !empty($req->special_sec5_subheading)) {
                $special_section5['section_sub_heading'] = $req->special_sec5_subheading;
            }
            if (isset($req->special_sec5_des) && !empty($req->special_sec5_des)) {
                $special_section5['section_description'] = $req->special_sec5_des;
            }

            
            if ($req->hasfile('special_sec5_image')) {
                $file = $req->file('special_sec5_image');
                if ($file->isValid()) {
                    $ext = $file->extension();
                    $path = public_path('uploads/img/');
                    $prefix = $req->page_slug . '-section-' . md5(time());
                    $img_name = $prefix . '.' . $ext;
                    if ($file->move($path, $img_name)) {
                        $special_section5['section_image'] = $img_name;
                    }
                }
            }

            Page_section::where('id', $spec_section5_id)->update($special_section5);
            //echo "<pre>"; print_r($special_section5); exit;
        }
        if (isset($req->special_sec6_id) && !empty($req->special_sec6_id)) {
            $special_section6 = array();
            $spec_section6_id = $req->special_sec6_id;
            if (isset($req->special_sec6_heading) && !empty($req->special_sec6_heading)) {
                $special_section6['section_heading'] = $req->special_sec6_heading;
            }
            


            if ($req->hasfile('special_sec6_image')) {
                $file = $req->file('special_sec6_image');
                if ($file->isValid()) {
                    $ext = $file->extension();
                    $path = public_path('uploads/img/');
                    $prefix = $req->page_slug . '-section-' . md5(time());
                    $img_name = $prefix . '.' . $ext;
                    if ($file->move($path, $img_name)) {
                        $special_section6['section_image'] = $img_name;
                    }
                }
            }

            Page_section::where('id', $spec_section6_id)->update($special_section6);
            //echo "<pre>"; print_r($special_section5); exit;
        }



        ////////////////////////////////////////////////////////////////
        // if(isset($req->section) && !empty($req->section))
        // {
        // $sections = $req->section;
        
        // foreach ($sections as $key => $value) {
        //     // echo $key." ";
        //      //print_r($req->section[6]['image']) ; exit;
        //     //echo "<pre>"; print_r($_FILES['section']); echo "</pre>"; exit;
        //     if (!empty($value['heading'])) {
        //         $upd_sec['section_heading'] = $value['heading'];
        //     }
        //     if (!empty($value['description'])) {
        //         $upd_sec['section_description'] = $value['description'];
        //     }
        //     if (!empty($value['status'])) {
        //         $upd_sec['section_status'] = $value['status'];
        //     }else {
        //         $upd_sec['section_status'] = 0;
        //     }
        //     // if(isset($req->section[$key]['image']))
        //     // {

        //     // }
            
        //         // if (!empty($req->section[5]['image'])) {
        //         //     $img = $req->section[5]['image'];
        //         // //echo("1"); exit;
        //         //     $file = file($img);
        //         //     {
        //         //         // echo("1"); exit;
        //         //         // print_r($file); exit;
                        
        //         //             $ext = $img->extension();
        //         //             echo($ext); exit;
        //         //             $path = public_path('uploads/img/');
        //         //             $prefix = $req->page_slug . '-section-' . md5(time());
        //         //             $img_name = $prefix . '.' . $ext;
        //         //             if ($img->move($path, $img_name)) {
        //         //                 $upd_sec['section_image'] = $img_name;
        //         //             }
                        
        //         //     }
        //             // exit;
        //             // if ($file->isValid()) {
        //             //     $ext = $file->extension();
        //             //     $path = public_path('uploads/img/');
        //             //     $prefix = $req->page_slug . '-section-' . md5(time());
        //             //     $img_name = $prefix . '.' . $ext;
        //             //     if ($file->move($path, $img_name)) {
        //             //         $special_section4['section_image'] = $img_name;
        //             //     }
        //             // }
        //         }
        //     // if(!empty($value['image']))
        //     // {
        //     //     $file = $_FILES['section']['name'][$key];
                
        //     //         $ext = $file->extension();
        //     //         $path = public_path('uploads/sections/');
        //     //         $prefix = $req->page_slug . '-section-' . md5(time());
        //     //         $img_name = $prefix . '.' . $ext;
        //     //         if ($file->move($path, $img_name)) {
        //     //             $upd_sec['section_image'] = $img_name;
                    
        //     //     }
        //     // }else{
        //     //     //$upd_sec['section_image'] = $value->old_image;
        //     // }
            
        //     //echo "<pre>"; print_r($upd_sec); echo "</pre>";
            
        // }
        // }
        // exit;
        

    }
    public function edit_sub_sections($page_slug='')
    {
        if(!empty($page_slug))
        {
            $page = Page::where('page_slug', $page_slug)->first();
            if($page)
            {
                $section=Page_section::where('page_id',$page->id)->where('section_type', 10)->first();
                $sub_sections=DB::table('sub_sections')->where('page_id', '=', $page->id)->get();
                //echo "<pre>"; print_r($sub_sections); exit;
                return view('admin.cms.sub_sections', compact('section','page_slug', 'sub_sections'));
            }
        }else {
            abort(404,"Not Found");
        }
        

        
    }
    public function blogs_listing()
    {
        $blogs=Blog_post::all();
        //echo "<pre>"; print_r($blogs); echo "</pre>"; exit;
        return view('admin.blogs.blogs_listing', compact('blogs'));
    }
    public function delete_blog(Request $req)
    {
        if(!empty($req->id))
        {
           $del= Blog_post::where('id',$req->id)->delete();
           if($del)
           {
                $msg = 1;
                return response()->json(['success' => $msg]);
           }
        }
    }
    public function edit_blog($id='')
    {
        if(!empty($id))
        {
            $blog=Blog_post::where('id', $id)->first();
            if($blog)
            {
                return view('admin.blogs.edit_blog', compact('blog'));
            }else {
                abort(404, "Not Found");
            }
        } else {
            abort(404, "Not Found");
        }
    }
    public function add_blog()
    {
        return view('admin.blogs.add_blog');
    }
    public function post_blog(Request $req)
    {
        //$i=array();
        $blog = new Blog_post();
        if(!empty($req->blog_title))
        {
            $blog->blog_title = $req->blog_title;
            $blog->blog_slug=Str::slug($req->blog_title);
            //$i['blog_title']=$req->blog_title;
        }
        if (!empty($req->blog_des)) {
            $blog->blog_details = $req->blog_des;
            //$i['blog_details'] = $req->blog_des;
        }
        if (!empty($req->meta_title)) {
            $blog->blog_meta_title = $req->meta_title;
            //$i['blog_meta_title'] = $req->meta_title;
        }
        if (!empty($req->meta_des)) {
            $blog->blog_meta_description = $req->meta_description;
            //$i['blog_meta_description'] = $req->meta_des;
        }
        if ($req->hasfile('blog_image')) {
            $file = $req->file('blog_image');
            if ($file->isValid()) {
                $ext = $file->extension();
                $path = public_path('uploads/img/blogs/');
                $prefix = 'blog-' . md5(time());
                $img_name = $prefix . '.' . $ext;
                if ($file->move($path, $img_name)) {
                    $blog->blog_image = $img_name;
                    //$i['blog_image'] = $img_name;
                }
            }
        }
        $blog->user_id=0;
        $blog->status = 'active';
        $blog->created_at = date("Y-m-d H:i:s");

        $blog->save();
        if($blog)
        {
            return redirect('admin/blogs');
        }
       
    }

    public function update_blog(Request $req)
    {
        //$i=array();
        //$blog = new Blog_post();
        $blog= Blog_post::find($req->blog_id);
        if (!empty($req->blog_title)) {
            $blog->blog_title = $req->blog_title;
            $blog->blog_slug = Str::slug($req->blog_title);
            //$i['blog_title']=$req->blog_title;
        }
        if (!empty($req->blog_des)) {
            $blog->blog_details = $req->blog_des;
            //$i['blog_details'] = $req->blog_des;
        }
        if (!empty($req->meta_title)) {
            $blog->blog_meta_title = $req->meta_title;
            //$i['blog_meta_title'] = $req->meta_title;
        }
        if (!empty($req->meta_des)) {
            $blog->blog_meta_description = $req->meta_description;
            //$i['blog_meta_description'] = $req->meta_des;
        }
        if ($req->hasfile('blog_image')) {
            $file = $req->file('blog_image');
            if ($file->isValid()) {
                $ext = $file->extension();
                $path = public_path('uploads/img/blogs/');
                $prefix = 'blog-' . md5(time());
                $img_name = $prefix . '.' . $ext;
                if ($file->move($path, $img_name)) {
                    $blog->blog_image = $img_name;
                    //$i['blog_image'] = $img_name;
                }
            }
        }
        $blog->user_id = 0;
        
        
        $blog->status = $req->blog_status;
        $blog->updated_at = date("Y-m-d H:i:s");

        $blog->save();
        if ($blog) {
            return redirect('admin/blogs');
        }
    }
}
