<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Helper\Helpers;

class CategoryController extends Controller
{
    public function index($slug)
    {
        Helpers::read_json();

        $category_data = Category::where('category_slug',$slug)->first();
        if($category_data){
            $post_data = Post::where('posts.category_id', $category_data->id)->leftJoin('categories', 'posts.category_id', '=', 'categories.id')->orderBy('posts.id','desc')->get();
        }else{
            return view('front.error');
        }
        
        return view('front.category', compact('category_data','post_data'));
    }
}
