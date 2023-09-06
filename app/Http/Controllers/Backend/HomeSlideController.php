<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\HomeSlide;
use Illuminate\Http\Request;
use Image;

class HomeSlideController extends Controller
{
   public function HomeSlide(){

    $homesliders = HomeSlide::latest()->get();
    return view('backend.pages.homeslider.all_home_slider',compact('homesliders'));
   }

   public function AddHomeSlide(){

    return view('backend.pages.homeslider.add_home_slider');
   }

   public function StoreHomeSlide(Request $request){

    $request->validate([
            'title' => 'required',
            'short_title' => 'required',
            'video_url' => 'required',
            'slider_img' => 'required',
        ]);

    if ($request->file('slider_img')) {

        $image = $request->file('slider_img');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(636,852)->save('upload/home_sliders/'.$name_gen);
        $save_url = 'upload/home_sliders/'.$name_gen;
    }

    $home_slider = new HomeSlide();
    $home_slider->title = $request->title;
    $home_slider->short_title = $request->short_title;
    $home_slider->video_url = $request->video_url;
    $home_slider->slider_img = $save_url;

    $home_slider->save();

    $notification = array(
    'message' => 'Home Slide Insert Successfully',
        'alert-type' => 'success'
       );

       return redirect()->route('home.slider')->with($notification);
   }

   public function EditHomeSlide($id){

    $home_slider = HomeSlide::findOrFail($id);
    return view('backend.pages.homeslider.edit_home_slider',compact('home_slider'));
   }
    public function UpdateHomeSlide(Request $request, $id){

    $home_slider = HomeSlide::findOrFail($id);
    $home_slider->title = $request->title;
    $home_slider->short_title = $request->short_title;
    $home_slider->video_url = $request->video_url;

    if ($request->file('slider_img')) {

        $image = $request->file('slider_img');
        @unlink(public_path('upload/home_sliders/'.$home_slider->slider_img));
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(636,852)->save('upload/home_sliders/'.$name_gen);
        $save_url = 'upload/home_sliders/'.$name_gen;
        $home_slider['slider_img'] = $save_url;
    }

    $home_slider->save();

    $notification = array(
    'message' => 'Home Slide Updated Successfully',
        'alert-type' => 'success'
       );

       return redirect()->route('home.slider')->with($notification);
   
    }

    public function DeleteHomeSlide($id){

        $slide = HomeSlide::findOrFail($id);
        $image = $slide->slider_img;
        unlink($image);

        HomeSlide::findOrFail($id)->delete();

        $notification = array(
        'message' => 'Home Slide Delete Successfully',
        'alert-type' => 'success'
       );

       return redirect()->back()->with($notification);

    }
}
