<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Tag;
use App\Models\Subscriber;
use App\Mail\Websitemail;
use Auth;
use DB;

class AdminPostController extends Controller
{
    public function show()
    {
        $posts = Post::all();
        return view('admin.post_show', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();        
        return view('admin.post_create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'post_title' => 'required',
            'post_detail' => 'required',
        ]);

        $q = DB::select("SHOW TABLE STATUS LIKE 'posts'");
        $ai_id = $q[0]->Auto_increment;
        if($request->hasFile('photo')){
            $now = time();
            $ext = $request->file('post_photo')->extension();
            $final_name = 'post_photo_'.$now.'.'.$ext;
            $request->file('post_photo')->move(public_path('uploads/'),$final_name);
        }else{
            $final_name = '';
        }
        $post = new Post();
        $post->category_id = $request->category_id;
        $post->post_title = $request->post_title;
        $post->post_slug = $request->post_slug;
        $post->post_title_en = $request->post_title_en;
        $post->post_slug_en = $request->post_slug_en;
        $post->post_title_jp = $request->post_title_jp;
        $post->post_slug_jp = $request->post_slug_jp;
        $post->post_detail = $request->post_detail;
        $post->post_detail_en = $request->post_detail_en;
        $post->post_detail_jp = $request->post_detail_jp;
        $post->active = $request->active;
        $post->post_photo = $final_name;
        $post->visitors = 1;
        $post->author_id = 0;
        $post->admin_id = Auth::guard('admin')->user()->id;
        $post->is_share = $request->is_share;
        $post->is_comment = $request->is_comment;
        $post->save();


        if($request->tags != '') {
            $tags_array_new = [];
            $tags_array = explode(',',$request->tags);
            for($i=0;$i<count($tags_array);$i++)
            {
                $tags_array_new[] = trim($tags_array[$i]);
            }
            $tags_array_new = array_values(array_unique($tags_array_new));
            for($i=0;$i<count($tags_array_new);$i++)
            {
                $tag = new Tag();
                $tag->post_id = $ai_id;
                $tag->tag_name = trim($tags_array_new[$i]);
                $tag->save();
            }
        }


        // Sending this post to subscribers
        if($request->subscriber_send_option == 1)
        {
            $subject = 'A new post is published';
            $message = 'Hi, A new post is published into our website. Please go to see that post:<br>';
            $message .= '<a target="_blank" href="'.route('berita_detail',$ai_id).'">';
            $message .= $request->post_title;
            $message .= '</a>';

            $subscribers = Subscriber::where('status','Active')->get();
            foreach($subscribers as $row) {
                \Mail::to($row->email)->send(new Websitemail($subject,$message));
            }
        }

        return redirect()->route('admin_post_show')->with('success', 'Data is added successfully.');
    }

    public function edit($id)
    {
        $test = Post::where('id',$id)->where('admin_id',Auth::guard('admin')->user()->id)->count();
        if(!$test) {
            return redirect()->route('admin_home');
        }


        $categories = Category::all();     
        $existing_tags = Tag::where('post_id',$id)->get();
        $post_single = Post::where('id',$id)->first();
        return view('admin.post_edit', compact('post_single','categories','existing_tags'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'post_title' => 'required',
            'post_detail' => 'required'
        ]);

        $post = Post::where('id',$id)->first();

        if($request->hasFile('post_photo')) {
            $request->validate([
                'post_photo' => 'image|mimes:jpg,jpeg,png,gif'
            ]);
            if($post->post_photo){
                unlink(public_path('uploads/'.$post->post_photo));
            }
            

            $now = time();
            $ext = $request->file('post_photo')->extension();
            $final_name = 'post_photo_'.$now.'.'.$ext;
            $request->file('post_photo')->move(public_path('uploads/'),$final_name);

            $post->post_photo = $final_name;
        }
        
        $post->category_id = $request->category_id;
        $post->post_title = $request->post_title;
        $post->post_slug = $request->post_slug;
        $post->post_title_en = $request->post_title_en;
        $post->post_slug_en = $request->post_slug_en;
        $post->post_title_jp = $request->post_title_jp;
        $post->post_slug_jp = $request->post_slug_jp;
        $post->post_detail = $request->post_detail;
        $post->post_detail_en = $request->post_detail_en;
        $post->post_detail_jp = $request->post_detail_jp;
        $post->active = $request->active;
        $post->is_share = $request->is_share;
        $post->is_comment = $request->is_comment;
        $post->update();

        if($request->tags != '') {
            $tags_array = explode(',',$request->tags);
            for($i=0;$i<count($tags_array);$i++)
            {
                $total = Tag::where('post_id',$id)->where('tag_name',trim($tags_array[$i]))->count();
                
                if(!$total) {
                    $tag = new Tag();
                    $tag->post_id = $id;
                    $tag->tag_name = trim($tags_array[$i]);
                    $tag->save();
                }
            }
        }        

        return redirect()->route('admin_post_show')->with('success', 'Data is updated successfully.');
    }

    public function delete_tag($id,$id1)
    {
        $tag = Tag::where('id',$id)->first();
        $tag->delete();
        return redirect()->route('admin_post_edit',$id1)->with('success', 'Data is deleted successfully.');
    }

    public function delete($id)
    {
        $test = Post::where('id',$id)->where('admin_id',Auth::guard('admin')->user()->id)->count();
        if(!$test) {
            return redirect()->route('admin_home');
        }
        
        $post = Post::where('id',$id)->first();
        unlink(public_path('uploads/'.$post->post_photo));
        $post->delete();

        Tag::where('post_id',$id)->delete();

        return redirect()->route('admin_post_show')->with('success', 'Data is deleted successfully.');
    }
}
