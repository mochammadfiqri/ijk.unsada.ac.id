<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;

class AdminAboutController extends Controller
{
    public function index()
    {
        $pages = Page::where('is_menu','1')->get();
        return view('admin.about_show', compact('pages'));
    }

    public function show()
    {
        $pages = Page::where('is_menu','1')->get();
        return view('admin.about_show', compact('pages'));
    }

    public function create()
    {
        $categories =  Page::where('parent_id','0');
        return view('admin.about_create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'detail' => 'required',
        ]);

        if($request->hasFile('photo')){
            $now = time();
            $ext = $request->file('photo')->extension();
            $final_name = 'photo_'.$now.'.'.$ext;
            $request->file('photo')->move(public_path('pages/'),$final_name);
        }else{
            $final_name = '';
        }

        $page = new Page();
        $page->title = $request->title;
        $page->title_en = $request->title_en;
        $page->title_jp = $request->title_jp;
        $page->slug = $request->slug;
        $page->slug_en = $request->slug_en;
        $page->slug_jp = $request->slug_jp;
        $page->detail = $request->detail;
        $page->detail_en = $request->detail_en;
        $page->detail_jp = $request->detail_jp;
        $page->photo = $final_name;
        $page->is_menu = '1';
        $page->active = $request->active;
        $page->save();

        return redirect()->route('admin_about_show')->with('success', 'Data is added successfully.');
    }

    public function edit($id)
    {
        $test = Page::where('id',$id)->count();
        if(!$test) {
            return redirect()->route('admin_about_show')->with('error', 'Data not found.');
        }

        $page_single = Page::where('id',$id)->first();
        return view('admin.about_edit', compact('page_single'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'detail' => 'required'
        ]);

        $page = Page::where('id',$id)->first();

        if($request->hasFile('photo')) {
            $request->validate([
                'photo' => 'image|mimes:jpg,jpeg,png,gif'
            ]);
            if($page->photo){
                unlink(public_path('uploads/pages/'.$page->photo));
            }
           

            $now = time();
            $ext = $request->file('photo')->extension();
            $final_name = 'photo_'.$now.'.'.$ext;
            $request->file('photo')->move(public_path('uploads/pages/'),$final_name);

            $page->photo = $final_name;
        }

        $page->title = $request->title;
        $page->title_en = $request->title_en;
        $page->title_jp = $request->title_jp;
        $page->slug = $request->slug;
        $page->slug_en = $request->slug_en;
        $page->slug_jp = $request->slug_jp;
        $page->detail = $request->detail;
        $page->detail_en = $request->detail_en;
        $page->detail_jp = $request->detail_jp;
        $page->is_menu = '1';
        $page->active = $request->active;
        $page->update();       

        return redirect()->route('admin_about_show')->with('success', 'Data is updated successfully.');
    }


    public function delete($id)
    {
        $test = Page::where('id',$id)->count();
        if(!$test) {
            return redirect()->route('admin_about_show')->with('error', 'Data not found.');
        }
        
        $page = Page::where('id',$id)->first();
        unlink(public_path('uploads/pages/'.$page->photo));
        $page->delete();

        return redirect()->route('admin_about_show')->with('success', 'Data is deleted successfully.');
    }
}
