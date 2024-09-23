<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Faculty;

class AdminDepartmentController extends Controller
{
    public function index()
    {
        $pages = Department::select( 'departments.id', 'faculties.id as faculty_id', 'faculties.title as faculty_name', 'departments.id as prodi_id' , 'departments.title as prodi_name' , 'departments.photo', 'departments.info', 'departments.detail')->where('departments.active','1')->leftJoin('faculties', 'departments.faculty_id', '=', 'faculties.id')->get();
        // print_r($pages);
        // die();
        return view('admin.department_show', compact('pages'));
    }

    public function show()
    {
        $pages = Department::select( 'departments.id', 'faculties.id as faculty_id', 'faculties.title as faculty_name', 'departments.id as prodi_id' , 'departments.title as prodi_name' ,'departments.photo', 'departments.info', 'departments.detail')->where('departments.active','1')->leftJoin('faculties', 'departments.faculty_id', '=', 'faculties.id')->get();
        // print_r($pages);
        // die();
         return view('admin.department_show', compact('pages'));
    }

    public function create()
    {
        $faculties = Faculty::all();
        return view('admin.department_create', compact('faculties'));
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
            $request->file('photo')->move(public_path('uploads/pages/'),$final_name);
        }else{
            $final_name = '';
        }

        $page = new Department();
        $page->title = $request->title;
        $page->title_en = $request->title_en;
        $page->title_jp = $request->title_jp;
        $page->faculty_id = $request->faculty_id;
        $page->slug = $request->slug;
        $page->slug_en = $request->slug_en;
        $page->slug_jp = $request->slug_jp;
        $page->info = $request->info;
        $page->info_en = $request->info_en;
        $page->info_jp = $request->info_jp;
        $page->detail = $request->detail;
        $page->detail_en = $request->detail_en;
        $page->detail_jp = $request->detail_jp;
        $page->address = $request->address;
        $page->telp = $request->telp;
        $page->fax = $request->fax;
        $page->email = $request->email;
        $page->url = $request->url;
        $page->photo = $final_name;
        $page->active = $request->active;
        $page->save();

        return redirect()->route('admin_department_show')->with('success', 'Data is added successfully.');
    }

    public function edit($id)
    {
        $test = Department::where('id',$id)->count();
        if(!$test) {
            return redirect()->route('admin_department_show')->with('error', 'Data not found.');
        }
        $faculties = Faculty::all();
        $page_single = Department::where('id',$id)->first();
        return view('admin.department_edit', compact('page_single','faculties'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'detail' => 'required'
        ]);

        $page = Department::where('id',$id)->first();

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
        $page->faculty_id = $request->faculty_id;
        $page->slug = $request->slug;
        $page->slug_en = $request->slug_en;
        $page->slug_jp = $request->slug_jp;
        $page->info = $request->info;
        $page->info_en = $request->info_en;
        $page->info_jp = $request->info_jp;
        $page->detail = $request->detail;
        $page->detail_en = $request->detail_en;
        $page->detail_jp = $request->detail_jp;
        $page->address = $request->address;
        $page->telp = $request->telp;
        $page->fax = $request->fax;
        $page->email = $request->email;
        $page->url = $request->url;
        $page->active = $request->active;
        $page->update();       

        return redirect()->route('admin_department_show')->with('success', 'Data is updated successfully.');
    }


    public function delete($id)
    {
        $test = Department::where('id',$id)->count();
        if(!$test) {
            return redirect()->route('admin_department_show')->with('error', 'Data not found.');
        }
        
        $page = Department::where('id',$id)->first();
        unlink(public_path('uploads/pages/'.$page->photo));
        $page->delete();

        return redirect()->route('admin_department_show')->with('success', 'Data is deleted successfully.');
    }
}
