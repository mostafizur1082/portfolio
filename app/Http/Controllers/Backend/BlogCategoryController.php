<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    public function AllblogCategory(){
        $allblogcategories = BlogCategory::all();
        return view('backend.pages.category.all_blog_category',compact('allblogcategories'));
    }

    public function AddblogCategory(){
        return view('backend.pages.category.add_blog_category');
    }

    public function StoreblogCategory(Request $request){
        $request->validate([
            'blog_category' => 'required',
        ]);

    $blog_category = new BlogCategory();
    $blog_category->blog_category = $request->blog_category;

    $blog_category->save();

    $notification = array(
    'message' => 'Blog Category Insert Successfully',
        'alert-type' => 'success'
       );

       return redirect()->route('all.blog.category')->with($notification);
    }

    public function EditblogCategory($id){

        $blogcategory = BlogCategory::findOrFail($id);
        return view('backend.pages.category.edit_blog_category',compact('blogcategory'));
    }

    public function UpdateBlogCategory(Request $request, $id){

    BlogCategory::findOrFail($id)->update([
        'blog_category' => $request->blog_category,
    ]);

    $notification = array(
    'message' => 'Blog Category Updated Successfully',
        'alert-type' => 'success'
       );

       return redirect()->route('all.blog.category')->with($notification);
    }

    public function DeleteBlogCategory($id){
        

        BlogCategory::findOrFail($id)->delete();

        $notification = array(
        'message' => 'Blog Category Delete Successfully',
        'alert-type' => 'success'
       );

       return redirect()->back()->with($notification);
    }
}
