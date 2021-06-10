<?php

namespace App\Classes;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Helpers
{

    
	public function get_settings(){
        return DB::table('cms_settings')->get()->first();
    }

    public function get_image($image, $folder){
        if (!empty($image) && !empty($folder)) {
            if (file_exists(public_path('uploads/' . $folder . '/' . $image))) {
                $return_image = asset('uploads/' . $folder . '/' . $image);
            } else {
                $return_image = asset('uploads/img/default.png');
            }
        }
        return $return_image;
    }
    public function pages(){
        return DB::table('pages')->get();
    }
    public function sub_sections()
    {
        $sub_sec=DB::table('pages')->join('page_sections', 'page_sections.page_id','=', 'pages.id')
        ->where('page_sections.section_type','=',10)
        ->select('pages.*')
        ->get();
        return $sub_sec;
    }

    public function meta_tags(){
        $meta = array();
        $current_uri = request()->segment(1);

        if ($current_uri == 'property' || $current_uri == 'propertdetail') {
            $slug = 'property';
        } else if ($current_uri == 'motors' || $current_uri == 'motorsdetail') {
            $slug = 'motors';
        } else if ($current_uri == 'marketplace' || $current_uri == 'product') {
            $slug = 'marketplace';
        } else if ($current_uri == 'jobs' || $current_uri == 'job-detail') {
            $slug = 'jobs';
        } else if ($current_uri == '') {
            $slug = 'home-page';
        }
        if (isset($slug) && !empty($slug)) {

            $a = DB::table('pages')->where('page_slug', '=', $slug)->first();
            if ($a) {
                $meta['title'] = $a->meta_tag;
                $meta['description'] = $a->meta_description;
                $meta['type'] = 'jobs';
                if (!empty($a->page_image)) {
                    $meta['image'] = url('admin/public/uploads/pages/' . $a->page_image);
                    $imageinfo = getimagesize(url('admin/public/uploads/pages/' . $a->page_image));
                    if (!empty($imageinfo)) {
                        $meta['img-height'] = $imageinfo[1];
                        $meta['img-width'] = $imageinfo[0];
                    } else {
                        $meta['img-height'] = 0;
                        $meta['img-width'] = 0;
                    }
                }
            }
        }
        return $meta;
    }
}
