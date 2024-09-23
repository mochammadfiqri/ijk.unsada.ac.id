<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;

class AdminMenuController extends Controller
{
    public function show()
    {
        $menus = Menu::get();
        return view('admin.menu_show', compact('menus'));
    }

    public function create()
    {
        $menus = Menu::where('active', 1)->get();
        return view('admin.menu_create', compact('menus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'menu' => 'required',
            'menu_en' => 'required',
            'menu_jp' => 'required',
        ]);
        $menu = new Menu();
        $menu->parent_id = $request->parent_id;
        $menu->menu = $request->menu;
        $menu->menu_en = $request->menu_en;
        $menu->menu_jp = $request->menu_jp;
        $menu->url = $request->url;
        $menu->save();

        return redirect()->route('admin_menu_show')->with('success', 'Data is added successfully.');
    }

    public function edit($id)
    {
        $menu_data = Menu::where('id',$id)->first();
        $menus = Menu::where('active', 1)->get();
        return view('admin.menu_edit', compact('menu_data', 'menus'));
    }

    public function update(Request $request,$id) 
    {
        $menu_data = Menu::where('id',$id)->first();
        $menu_data->parent_id = $request->parent_id;
        $menu_data->menu = $request->menu;
        $menu_data->menu_en = $request->menu_en;
        $menu_data->menu_jp = $request->menu_jp;
        $menu_data->url = $request->url;
        $menu_data->update();

        return redirect()->route('admin_menu_show')->with('success', 'Data is updated successfully.');
    }

    public function delete($id)
    {
        $menu_data = Menu::where('id',$id)->first();
        $menu_data->delete();

        return redirect()->route('admin_menu_show')->with('success', 'Data is deleted successfully.');

    }

}
