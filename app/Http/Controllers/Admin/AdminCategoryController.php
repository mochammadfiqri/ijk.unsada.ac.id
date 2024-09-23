<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class AdminCategoryController extends Controller
{
    public function show()
    {
        $categories = Category::all()->sortBy('category_order');
        return view('admin.category_show', compact('categories'));
    }

    public function create()
    {
        return view('admin.category_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required',
            'category_order' => 'required'
        ]);

        $category = new Category();
        $category->category_name = $request->category_name;
        $category->category_name_en = $request->category_name_en;
        $category->category_name_jp = $request->category_name_jp;
        $category->category_slug = $request->category_slug;
        $category->category_slug_en = $request->category_slug_en;
        $category->category_slug_jp = $request->category_slug_jp;
        $category->active = $request->active;
        $category->category_order = $request->category_order;
        $category->save();

        return redirect()->route('admin_category_show')->with('success', 'Data is added successfully.');
    }

    public function edit($id)
    {
        $category_single = Category::where('id',$id)->first();
        return view('admin.category_edit', compact('category_single'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'category_name' => 'required',
            'category_order' => 'required'
        ]);

        $category = Category::where('id',$id)->first();
        $category->category_name = $request->category_name;
        $category->category_name_en = $request->category_name_en;
        $category->category_name_jp = $request->category_name_jp;
        $category->category_slug = $request->category_slug;
        $category->category_slug_en = $request->category_slug_en;
        $category->category_slug_jp = $request->category_slug_jp;
        $category->active = $request->active;
        $category->category_order = $request->category_order;
        $category->update();

        return redirect()->route('admin_category_show')->with('success', 'Data is updated successfully.');
    }

    public function delete($id)
    {
        $category_single = Category::where('id',$id)->first();
        $category_single->delete();

        return redirect()->route('admin_category_show')->with('success', 'Data is deleted successfully.');
    }
}
