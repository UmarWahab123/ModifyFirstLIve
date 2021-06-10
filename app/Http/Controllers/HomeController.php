<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Page_section;
use App\Models\Cms_setting;
use App\Models\Blog_post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index(){
        return view('crm');
    }
    public function crm_page(Type $var = null)
    {
        
        $page_data=Page::where('page_slug','crm')->first();
        if($page_data)
        {
            $main_section=Page_section::where('page_id',$page_data->id)->where('section_type', 1)->first();
            $sections = Page_section::where('page_id', $page_data->id)->where('section_type', 0)->orderBy('section_position', 'ASC')->get();
        }
            //echo "<pre>"; print_r($sections); exit;
        return view('crm', compact('page_data', 'main_section', 'sections'));

    }

}
