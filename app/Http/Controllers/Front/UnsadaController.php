<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Language;
use App\Helper\Helpers;

class UnsadaController extends Controller
{
    public function index()
    {
        Helpers::read_json();
        $category_data = Page::where('is_menu','5')->get();
        $page_data = Page::where('slug','unsada-untuk-bangsa')->first();
        return view('front.unsada', compact('page_data', 'category_data'));
    }

    public function detail($slug)
    {
        Helpers::read_json();
       
        $get_data = Page::where('slug', $slug)->orWhere('slug_en', $slug)->orWhere('slug_jp', $slug)->first();
        if($get_data){
            $page_data = $get_data;
            $category_data = Page::where('is_menu','5')->get();
            return view('front.unsada', compact('page_data', 'category_data'));
        }else{
            $page_data = [];
            return view('front.error', compact('page_data'));
        }

       
        
    }
}
