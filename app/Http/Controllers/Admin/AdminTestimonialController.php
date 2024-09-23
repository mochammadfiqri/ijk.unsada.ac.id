<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Tag;
use App\Models\Subscriber;
use App\Mail\Websitemail;
use Auth;
use DB;

class AdminTestimonialController extends Controller
{
    public function show()
    {
        $testimonials = Testimonial::all();
        return view('admin.testimonial_show', compact('testimonials'));
    }

    public function create()
    {     
        return view('admin.testimonial_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'testimonial_author' => 'required',
            'testimonial_company'=> 'required',
            'testimonial_title' => 'required',
            'testimonial_detail' => 'required',
        ]);

        $q = DB::select("SHOW TABLE STATUS LIKE 'testimonials'");
        $ai_id = $q[0]->Auto_increment;
        if($request->hasFile('photo')){
            $now = time();
            $ext = $request->file('testimonial_photo')->extension();
            $final_name = 'testimonial_photo_'.$now.'.'.$ext;
            $request->file('testimonial_photo')->move(public_path('uploads/testimonials/'),$final_name);
        }else{
            $final_name = '';
        }
        $testimonial = new Testimonial();
        $testimonial->testimonial_author = $request->testimonial_author;
        $testimonial->testimonial_title = $request->testimonial_title;
        $testimonial->testimonial_company = $request->testimonial_company;
        $testimonial->testimonial_detail = $request->testimonial_detail;
        $testimonial->active = $request->active;
        $testimonial->testimonial_photo = $final_name;
        $testimonial->save();

        return redirect()->route('admin_testimonial_show')->with('success', 'Data is added successfully.');
    }

    public function edit($id)
    {
        $test = Testimonial::where('id',$id)->count();
        if(!$test) {
            return redirect()->route('admin_home');
        }

        $testimonial_single = Testimonial::where('id',$id)->first();
        return view('admin.testimonial_edit', compact('testimonial_single'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'testimonial_author' => 'required',
            'testimonial_title' => 'required',
            'testimonial_company' => 'required',
            'testimonial_detail' => 'required'
        ]);

        $testimonial = Testimonial::where('id',$id)->first();

        if($request->hasFile('testimonial_photo')) {
            $request->validate([
                'testimonial_photo' => 'image|mimes:jpg,jpeg,png,gif'
            ]);
            if($testimonial->testimonial_photo){
                unlink(public_path('uploads/testimonials/'.$testimonial->testimonial_photo));
            }
            

            $now = time();
            $ext = $request->file('testimonial_photo')->extension();
            $final_name = 'testimonial_photo_'.$now.'.'.$ext;
            $request->file('testimonial_photo')->move(public_path('uploads/testimonials/'),$final_name);

            $testimonial->testimonial_photo = $final_name;
        }
        
        $testimonial->testimonial_author = $request->testimonial_author;
        $testimonial->testimonial_title = $request->testimonial_title;
        $testimonial->testimonial_company = $request->testimonial_company;
        $testimonial->testimonial_detail = $request->testimonial_detail;
        $testimonial->active = $request->active;
        $testimonial->update();      

        return redirect()->route('admin_testimonial_show')->with('success', 'Data is updated successfully.');
    }

    public function delete($id)
    {
        $test = Testimonial::where('id',$id)->count();
        if(!$test) {
            return redirect()->route('admin_home');
        }
        
        $testimonial = Testimonial::where('id',$id)->first();
        unlink(public_path('uploads/testimonials/'.$testimonial->testimonial_photo));
        $testimonial->delete();

        return redirect()->route('admin_testimonial_show')->with('success', 'Data is deleted successfully.');
    }
}
