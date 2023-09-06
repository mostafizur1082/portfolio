<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\MultiImage;
use Illuminate\Http\Request;
use Image;
use Carbon\Carbon;

class AboutController extends Controller
{
    public function AboutPage(){

        $aboutpage = About::find(1);
        return view('backend.pages.about.all_about',compact('aboutpage'));
    }

    public function UpdateAboutPage(Request $request){

    $about_id = $request->id;

    if ($request->file('about_image')) {

        $image = $request->file('about_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(523,605)->save('upload/about_images/'.$name_gen);
        $save_url = 'upload/about_images/'.$name_gen;
  

    $about = About::findOrFail($about_id)->update([
        'title' => $request->title,
        'short_title' => $request->short_title,
        'short_des' => $request->short_des,
        'long_des' => $request->long_des,
        'about_image' =>  $save_url,
    ]);
    

    $notification = array(
    'message' => 'Home Slide Updated Successfully',
        'alert-type' => 'success'
       );

       return redirect()->back()->with($notification);
         }
    }

    public function About(){
        $about = About::find(1);
        $multiImage = MultiImage::latest()->take(6)->get();
        return view('frontend.pages.about',compact('about','multiImage'));
    }

    public function AboutMultiImage(){

        return view('backend.pages.about.multi_image');
    }

    public function StoreMultiImage(Request $request){

        $multi_image = $request->file('multi_image');

        foreach ($multi_image as $image) {

        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(220,220)->save('upload/multi_image/'.$name_gen);
        $save_url = 'upload/multi_image/'.$name_gen;
  

    $about = MultiImage::insert([
        
        'multi_image' =>  $save_url,
        'created_at' =>Carbon::now(),
    ]);
        }

        $notification = array(
        'message' => 'Multi Image Insert Successfully',
        'alert-type' => 'success'
       );

       return redirect()->route('all.multi.image')->with($notification);

    }

    public function AllMultiImage(){
        $multi_image = MultiImage::all();
        return view('backend.pages.about.all_multi_image',compact('multi_image'));
    }

    public function EditMultiImage($id){
        $edit_multi_image = MultiImage::findOrFail($id);
        return view('backend.pages.about.edit_multi_image',compact('edit_multi_image'));
    }

    public function UpdateMultiImage(Request $request, $id){


    if ($request->file('multi_image')) {

        $image = $request->file('multi_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(220,220)->save('upload/multi_image/'.$name_gen);
        $save_url = 'upload/multi_image/'.$name_gen;
  

    $about = MultiImage::findOrFail($id)->update([

        'multi_image' =>  $save_url,
    ]);
    

    $notification = array(
    'message' => 'Multi Image Updated Successfully',
        'alert-type' => 'success'
       );

       return redirect()->back()->with($notification);
         }
    }

    public function DeleteMultiImage($id){

        $multi_image = MultiImage::findOrFail($id);
        $image = $multi_image->multi_image;
        unlink($image);

        MultiImage::findOrFail($id)->delete();

        $notification = array(
        'message' => 'Home Slide Delete Successfully',
        'alert-type' => 'success'
       );

       return redirect()->back()->with($notification);
    }
}
