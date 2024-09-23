<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Faculty;
use App\Models\Department;
use App\Models\Language;
use App\Helper\Helpers;

class FakultasController extends Controller
{
    public function index()
    {
        Helpers::read_json();
        $faculties = Faculty::all();
        $page_data = Page::where('slug', 'fakultas')->first();
        return view('front.fakultas', compact('page_data','faculties'));
    }

    public function detail($slug)
    {
        Helpers::read_json();
       
        $get_data = Faculty::where('slug', $slug)->orWhere('slug_en', $slug)->orWhere('slug_jp', $slug)->first();
        if($get_data){
            $page_data = $get_data;
            $departments = Department::where('faculty_id', $get_data->id)->get();
            return view('front.fakultas_detail', compact('page_data', 'departments'));
        }else{
            $page_data = [];
            return view('front.error', compact('page_data'));
        }
        
    }

    public function prodi($fakultas, $prodi)
    {
        Helpers::read_json();
       
        $faculty = Faculty::where('slug', $fakultas)->orWhere('slug_en', $fakultas)->orWhere('slug_jp', $fakultas)->first();
        $get_data = Department::where('slug', $prodi)->orWhere('slug_en', $prodi)->orWhere('slug_jp', $prodi)->first();
        if($get_data){
            $page_data = $get_data;
            return view('front.fakultas_prodi', compact('faculty', 'page_data'));
        }else{
            $page_data = [];
            return view('front.error', compact('page_data'));
        }
        
    }
}
