<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;

class AdminFaqController extends Controller
{
    public function show()
    {
        $faq_data = Page::where(['is_menu'=>'6', 'active'=>'1'])->get();
        return view('admin.faq_show', compact('faq_data'));
    }

    public function create()
    {
        return view('admin.faq_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'detail' => 'required'
        ]);

        $faq = new Page();
        $faq->title = $request->title;
        $faq->slug = $request->slug;
        $faq->detail = $request->detail;
        $faq->title_en = $request->title_en;
        $faq->slug_en = $request->slug_en;
        $faq->detail_en = $request->detail_en;
        $faq->title_jp = $request->title_jp;
        $faq->slug_jp = $request->slug_jp;
        $faq->detail_jp = $request->detail_jp;
        $faq->is_menu = 6;
        $faq->active = 1;
        $faq->save();

        return redirect()->route('admin_faq_show')->with('success', 'Data is added successfully.');
    }

    public function edit($id)
    {
        $faq_data = Page::where('id',$id)->first();
        return view('admin.faq_edit', compact('faq_data'));
    }

    public function update(Request $request,$id) 
    {
        $request->validate([
            'faq_title' => 'required',
            'faq_detail' => 'required'
        ]);

        $faq = Page::where('id',$id)->first();
        $faq->title = $request->title;
        $faq->slug = $request->slug;
        $faq->detail = $request->detail;
        $faq->title_en = $request->title_en;
        $faq->slug_en = $request->slug_en;
        $faq->detail_en = $request->detail_en;
        $faq->title_jp = $request->title_jp;
        $faq->slug_jp = $request->slug_jp;
        $faq->detail_jp = $request->detail_jp;
        $faq->active = $request->active;
        $faq->update();

        return redirect()->route('admin_faq_show')->with('success', 'Data is updated successfully.');
    }

    public function delete($id)
    {
        $faq = Page::where('id',$id)->first();
        $faq->delete();

        return redirect()->route('admin_faq_show')->with('success', 'Data is deleted successfully.');

    }
}
