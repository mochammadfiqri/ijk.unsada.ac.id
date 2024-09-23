<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;

class AdminSliderController extends Controller
{
    public function show()
    {
        $sliders = Slider::get();
        return view('admin.slider_show', compact('sliders'));
    }

    public function create()
    {
        return view('admin.slider_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'photo' => 'required|image|mimes:jpg,jpeg,png,gif'
        ]);

        $now = time();
        $ext = $request->file('photo')->extension();
        $final_name = 'slider_'.$now.'.'.$ext;
        $request->file('photo')->move(public_path('uploads/sliders/'),$final_name);

        $slider = new Slider();
        $slider->photo = $final_name;
        $slider->title = $request->title;
        $slider->detail = $request->detail;
        $slider->url = $request->url;
        $slider->save();

        return redirect()->route('admin_slider_show')->with('success', 'Data is added successfully.');
    }

    public function edit($id)
    {
        $slider_data = Slider::where('id',$id)->first();
        return view('admin.slider_edit', compact('slider_data'));
    }

    public function update(Request $request,$id) 
    {
        $slider = Slider::where('id',$id)->first();

        if($request->hasFile('photo')) {
            $request->validate([
                'photo' => 'image|mimes:jpg,jpeg,png,gif'
            ]);

            unlink(public_path('uploads/sliders/'.$slider->photo));

            $now = time();
            $ext = $request->file('photo')->extension();
            $final_name = 'slider_'.$now.'.'.$ext;
            $request->file('photo')->move(public_path('uploads/sliders/'),$final_name);

            $slider->photo = $final_name;
        }

        $slider->title = $request->title;
        $slider->detail = $request->detail;
        $slider->url = $request->url;
        $slider->update();

        return redirect()->route('admin_slider_show')->with('success', 'Data is updated successfully.');
    }

    public function delete($id)
    {
        $slider = Slider::where('id',$id)->first();
        unlink(public_path('uploads/sliders/'.$slider->photo));
        $slider->delete();

        return redirect()->route('admin_slider_show')->with('success', 'Data is deleted successfully.');

    }

}
