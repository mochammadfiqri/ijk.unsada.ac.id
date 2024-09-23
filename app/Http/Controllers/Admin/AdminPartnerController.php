<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Partner;

class AdminPartnerController extends Controller
{
    public function show()
    {
        $partners = Partner::get();
        return view('admin.partner_show', compact('partners'));
    }

    public function create()
    {
        return view('admin.partner_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'caption' => 'required',
            'photo' => 'required|image|mimes:jpg,jpeg,png,gif'
        ]);

        $now = time();
        $ext = $request->file('photo')->extension();
        $final_name = 'partner_'.$now.'.'.$ext;
        $request->file('photo')->move(public_path('uploads/'),$final_name);

        $partner = new Partner();
        $partner->photo = $final_name;
        $partner->caption = $request->caption;
        $partner->url = $request->url;
        $partner->type = $request->type;
        $partner->save();

        return redirect()->route('admin_partner_show')->with('success', 'Data is added successfully.');
    }

    public function edit($id)
    {
        $partner_data = Partner::where('id',$id)->first();
        return view('admin.partner_edit', compact('partner_data'));
    }

    public function update(Request $request,$id) 
    {
        $partner = Partner::where('id',$id)->first();

        if($request->hasFile('photo')) {
            $request->validate([
                'photo' => 'image|mimes:jpg,jpeg,png,gif'
            ]);

            unlink(public_path('uploads/'.$partner->photo));

            $now = time();
            $ext = $request->file('photo')->extension();
            $final_name = 'partner_'.$now.'.'.$ext;
            $request->file('photo')->move(public_path('uploads/'),$final_name);

            $partner->photo = $final_name;
        }

        $partner->caption = $request->caption;
        $partner->url = $request->url;
        $partner->type = $request->type;
        $partner->update();

        return redirect()->route('admin_partner_show')->with('success', 'Data is updated successfully.');
    }

    public function delete($id)
    {
        $partner = Partner::where('id',$id)->first();
        unlink(public_path('uploads/'.$partner->photo));
        $partner->delete();

        return redirect()->route('admin_partner_show')->with('success', 'Data is deleted successfully.');

    }

}
