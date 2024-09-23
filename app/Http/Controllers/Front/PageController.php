<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Language;
use App\Helper\Helpers;

class PageController extends Controller
{
    public function index()
    {
        Helpers::read_json();
        return view('front.error');
    }

    public function detail($slug)
    {
        Helpers::read_json();
       
        $get_data = Page::where('slug', $slug)->orWhere('slug_en', $slug)->orWhere('slug_jp', $slug)->first();
        if($get_data){
            $page_data = $get_data;
            $related_page_array = Page::where('parent_id', $get_data->id)->get();
            return view('front.page', compact('page_data', 'related_page_array'));
        }else{
            $page_data = [];
            return view('front.error', compact('page_data'));
        }

       
        
    }
}
