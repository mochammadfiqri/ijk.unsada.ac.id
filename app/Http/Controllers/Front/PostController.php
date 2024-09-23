<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Admin;
use App\Models\Author;
use App\Helper\Helpers;

class PostController extends Controller
{

    public function index(Request $request)
    {
        Helpers::read_json();
        if ($request->has('q')) {
            $search = $request->input('q');
            $post_data = Post::where('posts.post_title','LIKE',"%{$search}%")->leftJoin('categories', 'posts.category_id', '=', 'categories.id')->orderBy('posts.id','desc')->get();
            $category_data = Category::orderBy('category_order','asc')->where('active', '1')->get();
            $tag_data = Tag::orderBy('id','desc')->get();
         }else{
            $post_data = Post::where('posts.active', '1')->leftJoin('categories', 'posts.category_id', '=', 'categories.id')->orderBy('posts.id','desc')->get();
            $category_data = Category::orderBy('category_order','asc')->where('active', '1')->get();
            $tag_data = Tag::orderBy('id','desc')->get();
         }
       
        return view('front.post_index', compact('post_data', 'category_data', 'tag_data'));
    }

    public function detail($slug)
    {
        Helpers::read_json();
        
        $post_detail = Post::where('posts.post_slug', $slug)->leftJoin('categories', 'posts.category_id', '=', 'categories.id')->first();
        if($post_detail)
        {
            $user_data = Admin::where('id',$post_detail->admin_id)->first();
            $tag_data = Tag::where('post_id',$post_detail->id)->get();
        } else{
            return view('front.error');
        }

        // Update page view count
        $new_value = $post_detail->visitors+1;
        $post_detail->visitors = $new_value;
        $post_detail->update();
        $related_post_array = Post::where('posts.active', '1')->leftJoin('categories', 'posts.category_id', '=', 'categories.id')->orderBy('posts.id','desc')->where('posts.category_id',$post_detail->category_id)->get();
        
        return view('front.post_detail', compact('post_detail', 'user_data', 'tag_data','related_post_array'));
    }
}
