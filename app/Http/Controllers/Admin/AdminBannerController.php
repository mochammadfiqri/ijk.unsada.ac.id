<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;

class AdminBannerController extends Controller
{
    public function show()
    {
        $banners = Banner::get();
        return view('admin.banner_show', compact('banners'));
    }

    public function create()
    {
        return view('admin.banner_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'caption' => 'required',
            'url' => 'required',
            'photo' => 'required|image|mimes:jpg,jpeg,png,gif'
        ]);

        $now = time();
        $ext = $request->file('photo')->extension();
        $final_name = 'banner_'.$now.'.'.$ext;
        $request->file('photo')->move(public_path('uploads/banners/'),$final_name);

        $banner = new Banner();
        $banner->photo = $final_name;
        $banner->caption = $request->caption;
        $banner->url = $request->url;
        $banner->active = $request->active;
        $banner->save();

        return redirect()->route('admin_banner_show')->with('success', 'Data is added successfully.');
    }

    public function edit($id)
    {
        $banner_data = Banner::where('id',$id)->first();
        return view('admin.banner_edit', compact('banner_data'));
    }

    public function update(Request $request,$id) 
    {
        $banner = Banner::where('id',$id)->first();

        if($request->hasFile('photo')) {
            $request->validate([
                'photo' => 'image|mimes:jpg,jpeg,png,gif'
            ]);

            unlink(public_path('uploads/banners/'.$banner->photo));

            $now = time();
            $ext = $request->file('photo')->extension();
            $final_name = 'banner_'.$now.'.'.$ext;
            $request->file('photo')->move(public_path('uploads/banners/'),$final_name);

            $banner->photo = $final_name;
        }

        $banner->caption = $request->caption;
        $banner->url = $request->url;
        $banner->active = $request->active;
        $banner->update();

        return redirect()->route('admin_banner_show')->with('success', 'Data is updated successfully.');
    }

    public function delete($id)
    {
        $banner = Banner::where('id',$id)->first();
        unlink(public_path('uploads/banners/'.$banner->photo));
        $banner->delete();

        return redirect()->route('admin_banner_show')->with('success', 'Data is deleted successfully.');

    }

}
