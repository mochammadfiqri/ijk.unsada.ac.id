<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeAdvertisement;
use App\Models\Setting;
use App\Models\Page;
use App\Models\Post;
use App\Models\SubCategory;
use App\Models\Banner;
use App\Models\Partner;
use App\Models\Category;
use App\Models\Language;
use App\Helper\Helpers;

class HomeController extends Controller
{
    public function index()
    {
        Helpers::read_json();

        if(!session()->get('session_short_name')) {
            $current_short_name = Language::where('is_default','Yes')->first()->short_name;
        } else {
            $current_short_name = session()->get('session_short_name');
        }    
        $current_language_id = Language::where('short_name',$current_short_name)->first()->id;
        
        $banner_data = Banner::where(['active'=> '1'])->get();
        $partner_data = Partner::where(['active'=> '1', 'type'=> '0'])->get();
        $client_data = Partner::where(['active'=> '1', 'type'=> '1'])->get();
        $home_ad_data = HomeAdvertisement::where('id',1)->first();
        $setting_data = Setting::where('id',1)->first();
        $pendidikan = Page::where('id',26)->first();
        $pendaftaran = Page::where('id',27)->first();
        $beasiswa = Page::where('id',28)->first();
        $fasilitas = Page::where('id',29)->first();
        $kegiatan = Page::where('id',30)->first();
        $kemahasiswaan = Page::where('id',31)->first();
        $alumni = Page::where('id',32)->first();
        $post_data = Post::orderBy('id','desc')->where('active', '1')->get();
        $category_data = Category::orderBy('category_order','asc')->where('active', '1')->get();
        return view('front.home', compact('pendidikan', 'pendaftaran', 'beasiswa', 'fasilitas', 'kegiatan', 'kemahasiswaan', 'alumni', 'home_ad_data', 'setting_data', 'post_data', 'category_data', 'banner_data', 'partner_data', 'client_data'));
    }

    public function get_subcategory_by_category($id)
    {
        Helpers::read_json();
        
        $sub_category_data = SubCategory::where('category_id',$id)->get();
        $response = "<option value=''>".SELECT_SUBCATEGORY."</option>";
        foreach($sub_category_data as $item) {
            $response .= '<option value="'.$item->id.'">'.$item->sub_category_name.'</option>';
        }

        return response()->json(['sub_category_data'=>$response]);
    }

    public function search(Request $request)
    {
        Helpers::read_json();
        
        $post_data = Post::with('rSubCategory')->orderBy('id','desc');
        if($request->text_item!=''){
            $post_data = $post_data->where('post_title', 'like', '%'.$request->text_item.'%');
        }
        if($request->sub_category!='') {
            $post_data = $post_data->where('sub_category_id', $request->sub_category);
        }
        $post_data = $post_data->paginate(12);

        return view('front.search_result', compact('post_data'));
    }
}
