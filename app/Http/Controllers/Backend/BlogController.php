<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\MultiImage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;

class BlogController extends Controller
{
    public function AllBlog(){

        $allblogs = Blog::latest()->get();
        return view('backend.pages.blog.all_blog',compact('allblogs'));
    }

    public function AddBlog(){

        $blog_categories = BlogCategory::all();

        // $blog_categories = BlogCategory::orderBy('blog_category','ASC')->get();

        return view('backend.pages.blog.add_blog',compact('blog_categories'));
    }

    public function StoreBlog(Request $request){
        $request->validate([
            'blog_category_id' => 'required',
            'title' => 'required',
            'image' => 'required',
            'tags' => 'required',
            'description' => 'required',
        ]);

    if ($request->file('image')) {

        $image = $request->file('image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(850,430)->save('upload/blogs/'.$name_gen);
        $save_url = 'upload/blogs/'.$name_gen;
    }

    $blog = new Blog();
    $blog->blog_category_id = $request->blog_category_id;
    $blog->title = $request->title;
    $blog->tags = $request->tags;
    $blog->image = $save_url;
    $blog->description = $request->description;

    $blog->save();

    $notification = array(
    'message' => 'Blog Insert Successfully',
        'alert-type' => 'success'
       );

       return redirect()->route('all.blog')->with($notification);
    }

    public function EditBlog($id){
        $blog = Blog::findOrFail($id);
        $blog_category = BlogCategory::all();

        return view('backend.pages.blog.edit_blog',compact('blog','blog_category'));
        
    }

    public function UpdateBlog(Request $request,$id){
         

    $blog = Blog::findOrFail($id);
    $blog->blog_category_id = $request->blog_category_id;
    $blog->title = $request->title;
    $blog->tags = $request->tags;
    $blog->description = $request->description;

    if ($request->file('image')) {

        $image = $request->file('image');
        @unlink(public_path('upload/blogs/'.$blog->image));
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(850,430)->save('upload/blogs/'.$name_gen);
        $save_url = 'upload/blogs/'.$name_gen;
        $blog['image'] = $save_url;
    }

    $blog->save();

    $notification = array(
    'message' => 'Blog Updated Successfully',
        'alert-type' => 'success'
       );

       return redirect()->route('all.blog')->with($notification);

    }

    public function DeleteBlog($id){
        
        $blog = Blog::findOrFail($id);
        $image = $blog->image;
        unlink($image);

        Blog::findOrFail($id)->delete();

        $notification = array(
        'message' => 'Blog Delete Successfully',
        'alert-type' => 'success'
       );

       return redirect()->back()->with($notification);
        
    }

    public function BlogDetails($id){
        $allblog = Blog::latest()->limit(5)->get(); 
        $blog = Blog::findOrFail($id);
        $multiImage = MultiImage::latest()->take(6)->get();
        $categories = BlogCategory::orderby('blog_category','ASC')->get();
        return view('frontend.all_home.blog_details',compact('blog','multiImage','allblog','categories'));
    }

    public function CategoryBlog($id){
        $categoryblog = Blog::where('blog_category_id',$id)->orderBy('id','DESC')->get();
        $multiImage = MultiImage::latest()->take(6)->get();
        $categories = BlogCategory::orderby('blog_category','ASC')->get();
        $allblog = Blog::latest()->limit(5)->get(); 
        $catname = BlogCategory::find($id);
        return view('frontend.category_blog_details',compact('categoryblog','multiImage','categories','allblog','catname'));
    }

    public function Blog(){
        $blogs = Blog::all();
        $multiImage = MultiImage::latest()->take(6)->get();
        $categories = BlogCategory::orderby('blog_category','ASC')->get();
        $allblog = Blog::latest()->limit(5)->get(); 

        return view('frontend.pages.blog',compact('blogs','multiImage','categories','allblog'));
    }
}
