<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\Archive;
use App\Models\Comment;
use App\Models\Reply;

class AdminPostController extends Controller
{
    public function index()
    {
        $all_data = Post::with('rPostCategory')->orderBy('id','asc')->get();
        return view('admin.post_show', compact('all_data'));
    }

    public function add()
    {
        $post_categories = PostCategory::get();
        return view('admin.post_add', compact('post_categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:posts',
            'short_description' => 'required',
            'description' => 'required',
            'photo' => 'required|image|mimes:jpg,jpeg,png,gif',
            'banner' => 'required|image|mimes:jpg,jpeg,png,gif'
        ]);

        $obj = new Post();

        $ext = $request->file('photo')->extension();
        $final_name = 'post_photo_'.time().'.'.$ext;
        $request->file('photo')->move(public_path('uploads/'),$final_name);
        $obj->photo = $final_name;

        $ext1 = $request->file('banner')->extension();
        $final_name1 = 'post_banner_'.time().'.'.$ext1;
        $request->file('banner')->move(public_path('uploads/'),$final_name1);
        $obj->banner = $final_name1;
        
        $obj->post_category_id = $request->post_category_id;
        $obj->title = $request->title;
        $obj->slug = $request->slug;
        $obj->short_description = $request->short_description;
        $obj->description = $request->description;
        $obj->show_comment = $request->show_comment;
        $obj->seo_title = $request->seo_title;
        $obj->seo_meta_description = $request->seo_meta_description;
        $obj->save();

        $current_month = date('m');
        $current_year = date('Y');

        $total = Archive::where('month',$current_month)->where('year',$current_year)->count();

        if($total>0) {
            $archive_data = Archive::where('month',$current_month)->where('year',$current_year)->first();
            $total_post = $archive_data->total_post;
            $total_post = $total_post+1;
            $archive_data->total_post = $total_post;
            $archive_data->update();
        } else {
            $archive_data = new Archive();
            $archive_data->month = $current_month;
            $archive_data->year = $current_year;
            $archive_data->total_post = 1;
            $archive_data->save();
        }

        return redirect()->route('admin_post_show')->with('success', 'Data is inserted successfully.');
    }

    public function edit($id)
    {
        $post_categories = PostCategory::get();
        $row_data = Post::where('id',$id)->first();
        return view('admin.post_edit',compact('row_data','post_categories'));
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'title' => 'required',
            'slug' => ['required','alpha_dash',Rule::unique('posts')->ignore($id)],
            'short_description' => 'required',
            'description' => 'required'
        ]);

        $obj = Post::where('id',$id)->first();

        if($request->hasFile('photo')) {
            $request->validate([
                'photo' => 'image|mimes:jpg,jpeg,png,gif'
            ]);
            unlink(public_path('uploads/'.$obj->photo));

            $ext = $request->file('photo')->extension();
            $final_name = 'post_photo_'.time().'.'.$ext;

            $request->file('photo')->move(public_path('uploads/'),$final_name);

            $obj->photo = $final_name;
        }

        if($request->hasFile('banner')) {
            $request->validate([
                'banner' => 'image|mimes:jpg,jpeg,png,gif'
            ]);
            unlink(public_path('uploads/'.$obj->banner));

            $ext = $request->file('banner')->extension();
            $final_name = 'post_banner_'.time().'.'.$ext;

            $request->file('banner')->move(public_path('uploads/'),$final_name);

            $obj->banner = $final_name;
        }

        $obj->post_category_id = $request->post_category_id;
        $obj->title = $request->title;
        $obj->slug = $request->slug;
        $obj->short_description = $request->short_description;
        $obj->description = $request->description;
        $obj->show_comment = $request->show_comment;
        $obj->seo_title = $request->seo_title;
        $obj->seo_meta_description = $request->seo_meta_description;
        $obj->update();

        return redirect()->route('admin_post_show')->with('success', 'Data is updated successfully.');
    }

    public function delete($id)
    {
        $row_data = Post::where('id',$id)->first();
        $current_month = $row_data->created_at->format('m');
        $current_year = $row_data->created_at->format('Y');
        unlink(public_path('uploads/'.$row_data->photo));
        unlink(public_path('uploads/'.$row_data->banner));
        $row_data->delete();
        
        $archive_data = Archive::where('month',$current_month)->where('year',$current_year)->first();
        $total_post = $archive_data->total_post;
        $total_post = $total_post-1;
        $archive_data->total_post = $total_post;
        $archive_data->update();

        return redirect()->back()->with('success', 'Data is deleted successfully.');
    }

    public function comment_pending()
    {
        $pending_comments = Comment::with('rPost')->where('status',0)->get();
        return view('admin.comment_pending', compact('pending_comments'));
    }

    public function comment_make_approved($id)
    {
        $obj = Comment::where('id',$id)->first();
        $obj->status = 1;
        $obj->update();

        return redirect()->back()->with('success', 'Comment is approved successfully.');
    }

    public function comment_approved()
    {
        $approved_comments = Comment::with('rPost')->where('status',1)->get();
        return view('admin.comment_approved', compact('approved_comments'));
    }

    public function comment_make_pending($id)
    {
        $obj = Comment::where('id',$id)->first();
        $obj->status = 0;
        $obj->update();

        return redirect()->back()->with('success', 'Comment is pending successfully.');
    }

    public function comment_delete($id)
    {
        $row_data = Comment::where('id',$id)->first();
        $row_data->delete();

        return redirect()->back()->with('success', 'Data is deleted successfully.');
    }








    public function reply_pending()
    {
        $pending_replies = Reply::with('rPost')->where('status',0)->get();
        return view('admin.reply_pending', compact('pending_replies'));
    }

    public function reply_make_approved($id)
    {
        $obj = Reply::where('id',$id)->first();
        $obj->status = 1;
        $obj->update();

        return redirect()->back()->with('success', 'Reply is approved successfully.');
    }

    public function reply_approved()
    {
        $approved_replies = Reply::with('rPost')->where('status',1)->get();
        return view('admin.reply_approved', compact('approved_replies'));
    }

    public function reply_make_pending($id)
    {
        $obj = Reply::where('id',$id)->first();
        $obj->status = 0;
        $obj->update();

        return redirect()->back()->with('success', 'Reply is pending successfully.');
    }

    public function reply_delete($id)
    {
        $row_data = Reply::where('id',$id)->first();
        $row_data->delete();

        return redirect()->back()->with('success', 'Data is deleted successfully.');
    }
}
