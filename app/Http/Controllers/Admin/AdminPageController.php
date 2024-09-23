<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;

class AdminPageController extends Controller
{
    public function about()
    {
        $page_data = Page::where('slug', 'about')->get();
        return view('admin.page_about', compact('page_data'));
    }

    public function about_update(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'detail' => 'required'
        ]);

        $page = Page::where('id',$request->id)->first();
        $page->title = $request->title;
        $page->slug = $request->slug;
        $page->detail = $request->detail;
        $page->title_en = $request->title_en;
        $page->slug_en = $request->slug_en;
        $page->detail_en = $request->detail_en;
        $page->title_jp = $request->title_jp;
        $page->slug_jp = $request->slug_jp;
        $page->detail_jp = $request->detail_jp;
        $page->active = $request->active;
        $page->update();

        return redirect()->route('admin_page_about')->with('success', 'Data is updated successfully.');

    }



    public function faq()
    {
        $page_data = Page::where('slug', 'faq')->get();
        return view('admin.page_faq', compact('page_data'));
    }

    public function faq_update(Request $request)
    {
        $request->validate([
            'title' => 'required'
        ]);

        $page = Page::where('id',$request->id)->first();
        $page->title = $request->title;
        $page->slug = $request->slug;
        $page->detail = $request->detail;
        $page->title_en = $request->title_en;
        $page->slug_en = $request->slug_en;
        $page->detail_en = $request->detail_en;
        $page->title_jp = $request->title_jp;
        $page->slug_jp = $request->slug_jp;
        $page->detail_jp = $request->detail_jp;
        $page->active = $request->active;
        $page->update();

        return redirect()->route('admin_page_faq')->with('success', 'Data is updated successfully.');

    }


    public function terms()
    {
        $page_data = Page::where('slug', 'term')->get();
        return view('admin.page_terms', compact('page_data'));
    }

    public function terms_update(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'detail' => 'required'
        ]);

        $page = Page::where('id',$request->id)->first();
        $page->title = $request->title;
        $page->slug = $request->slug;
        $page->detail = $request->detail;
        $page->title_en = $request->title_en;
        $page->slug_en = $request->slug_en;
        $page->detail_en = $request->detail_en;
        $page->title_jp = $request->title_jp;
        $page->slug_jp = $request->slug_jp;
        $page->detail_jp = $request->detail_jp;
        $page->active = $request->active;
        $page->update();

        return redirect()->route('admin_page_terms')->with('success', 'Data is updated successfully.');

    }

    public function laporan()
    {
        $page_data = Page::where('slug', 'laporan-tahunan')->first();
        return view('admin.page_laporan', compact('page_data'));
    }

    public function laporan_update(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'detail' => 'required'
        ]);

        if($request->hasFile('photo')){
            $now = time();
            $ext = $request->file('photo')->extension();
            $final_name = 'photo_'.$now.'.'.$ext;
            $request->file('photo')->move(public_path('pages/'),$final_name);
        }else{
            $final_name = '';
        }

        $page = Page::where('id',$request->id)->first();
        $page->title = $request->title;
        $page->slug = $request->slug;
        $page->detail = $request->detail;
        $page->title_en = $request->title_en;
        $page->slug_en = $request->slug_en;
        $page->detail_en = $request->detail_en;
        $page->title_jp = $request->title_jp;
        $page->slug_jp = $request->slug_jp;
        $page->detail_jp = $request->detail_jp;
        $page->photo = $final_name;
        $page->active = $request->active;
        $page->update();

        return redirect()->route('admin_page_laporan')->with('success', 'Data is updated successfully.');

    }

    public function penjamin()
    {
        $page_data = Page::where('slug', 'lembaga-penjamin-mutu')->first();
        return view('admin.page_penjamin', compact('page_data'));
    }

    public function penjamin_update(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'detail' => 'required'
        ]);

        if($request->hasFile('photo')){
            $now = time();
            $ext = $request->file('photo')->extension();
            $final_name = 'photo_'.$now.'.'.$ext;
            $request->file('photo')->move(public_path('pages/'),$final_name);
        }else{
            $final_name = '';
        }

        $page = Page::where('id',$request->id)->first();
        $page->title = $request->title;
        $page->slug = $request->slug;
        $page->detail = $request->detail;
        $page->title_en = $request->title_en;
        $page->slug_en = $request->slug_en;
        $page->detail_en = $request->detail_en;
        $page->title_jp = $request->title_jp;
        $page->slug_jp = $request->slug_jp;
        $page->detail_jp = $request->detail_jp;
        $page->photo = $final_name;
        $page->active = $request->active;
        $page->update();

        return redirect()->route('admin_page_penjamin')->with('success', 'Data is updated successfully.');

    }


    public function privacy()
    {
        $page_data = Page::where('slug', 'privacy')->get();
        return view('admin.page_privacy', compact('page_data'));
    }

    public function privacy_update(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'detail' => 'required'
        ]);

        $page = Page::where('id',$request->id)->first();
        $page->title = $request->title;
        $page->slug = $request->slug;
        $page->detail = $request->detail;
        $page->title_en = $request->title_en;
        $page->slug_en = $request->slug_en;
        $page->detail_en = $request->detail_en;
        $page->title_jp = $request->title_jp;
        $page->slug_jp = $request->slug_jp;
        $page->detail_jp = $request->detail_jp;
        $page->active = $request->active;
        $page->update();

        return redirect()->route('admin_page_privacy')->with('success', 'Data is updated successfully.');

    }


    public function disclaimer()
    {
        $page_data = Page::where('slug', 'disclaimer')->get();
        return view('admin.page_disclaimer', compact('page_data'));
    }

    public function disclaimer_update(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'detail' => 'required'
        ]);

        $page = Page::where('id',$request->id)->first();
        $$page->title = $request->title;
        $page->slug = $request->slug;
        $page->detail = $request->detail;
        $page->title_en = $request->title_en;
        $page->slug_en = $request->slug_en;
        $page->detail_en = $request->detail_en;
        $page->title_jp = $request->title_jp;
        $page->slug_jp = $request->slug_jp;
        $page->detail_jp = $request->detail_jp;
        $page->active = $request->active;
        $page->update();

        return redirect()->route('admin_page_disclaimer')->with('success', 'Data is updated successfully.');

    }


    public function login()
    {
        $page_data = Page::where('slug', 'login')->get();
        return view('admin.page_login', compact('page_data'));
    }

    public function login_update(Request $request)
    {
        $request->validate([
            'title' => 'required'
        ]);

        $page = Page::where('id',$request->id)->first();
        $page->title = $request->title;
        $page->slug = $request->slug;
        $page->detail = $request->detail;
        $page->title_en = $request->title_en;
        $page->slug_en = $request->slug_en;
        $page->detail_en = $request->detail_en;
        $page->title_jp = $request->title_jp;
        $page->slug_jp = $request->slug_jp;
        $page->detail_jp = $request->detail_jp;
        $page->active = $request->active;
        $page->update();

        return redirect()->route('admin_page_login')->with('success', 'Data is updated successfully.');

    }


    public function contact()
    {
        $page_data = Page::where('slug', 'contact')->get();
        return view('admin.page_contact', compact('page_data'));
    }

    public function contact_update(Request $request)
    {
        $request->validate([
            'title' => 'required'
        ]);

        $page = Page::where('id',$request->id)->first();
        $page->title = $request->title;
        $page->slug = $request->slug;
        $page->detail = $request->detail;
        $page->title_en = $request->title_en;
        $page->slug_en = $request->slug_en;
        $page->detail_en = $request->detail_en;
        $page->title_jp = $request->title_jp;
        $page->slug_jp = $request->slug_jp;
        $page->detail_jp = $request->detail_jp;
        $page->active = $request->active;
        $page->update();

        return redirect()->route('admin_page_contact')->with('success', 'Data is updated successfully.');

    }
}
