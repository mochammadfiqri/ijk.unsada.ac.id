<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Page;
use App\Models\Post;
use App\Models\Photo;
use App\Models\Video;
use App\Models\Faq;
use App\Models\OnlinePoll;
use App\Models\LiveChannel;
use App\Models\Subscriber;

class AdminHomeController extends Controller
{
    public function index()
    {
        $total_category = Category::count();
        $total_news = Post::count();
        $total_photo = Photo::count();
        $total_video = Video::count();
        $total_faq = Faq::count();
        $total_poll = OnlinePoll::count();
        $total_channel = LiveChannel::count();
        $total_subscriber = Subscriber::where('status','Active')->count();

        return view('admin.home', compact('total_category','total_news','total_photo','total_video','total_faq','total_poll','total_channel','total_subscriber'));
    }

    public function show()
    {
        $pages = Page::where('is_menu','0')->get();
        return view('admin.page_show', compact('pages'));
    }

    public function faqShow()
    {
        $pages = Page::where('is_menu','6')->get();
        return view('admin.page_show', compact('pages'));
    }

    public function create()
    {
        $categories =  Page::where('parent_id','0');
        return view('admin.page_create', compact('categories'));
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
        $page->is_menu = '0';
        $page->active = $request->active;
        $page->save();

        return redirect()->route('admin_home_show')->with('success', 'Data is added successfully.');
    }

    public function edit($id)
    {
        $test = Page::where('id',$id)->count();
        if(!$test) {
            return redirect()->route('admin_home_show')->with('error', 'Data not found.');
        }

        $page_single = Page::where('id',$id)->first();
        return view('admin.page_edit', compact('page_single'));
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
        $page->is_menu = '0';
        $page->active = $request->active;
        $page->update();       

        return redirect()->route('admin_home_show')->with('success', 'Data is updated successfully.');
    }


    public function delete($id)
    {
        $test = Page::where('id',$id)->count();
        if(!$test) {
            return redirect()->route('admin_home_show')->with('error', 'Data not found.');
        }
        
        $page = Page::where('id',$id)->first();
        unlink(public_path('uploads/pages/'.$page->photo));
        $page->delete();

        return redirect()->route('admin_home_show')->with('success', 'Data is deleted successfully.');
    }
}
