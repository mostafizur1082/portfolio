<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\MultiImage;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Image;

class PortfolioController extends Controller
{
    public function AllPortfolio(){
        $allPortfolio = Portfolio::all();
        return view('backend.pages.portfolio.all_portfolio',compact('allPortfolio'));
    }

    public function AddPortfolio(){
        return view('backend.pages.portfolio.add_portfolio');
    }

    public function StorePortfolio(Request $request){
        $request->validate([
            'name' => 'required',
            'title' => 'required',
            'image' => 'required',
            'description' => 'required',
        ]);

    if ($request->file('image')) {

        $image = $request->file('image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(1020,520)->save('upload/portfolio/'.$name_gen);
        $save_url = 'upload/portfolio/'.$name_gen;
    }

    $portfolio = new Portfolio();
    $portfolio->name = $request->name;
    $portfolio->title = $request->title;
    $portfolio->image = $save_url;
    $portfolio->description = $request->description;

    $portfolio->save();

    $notification = array(
    'message' => 'Portfolio Insert Successfully',
        'alert-type' => 'success'
       );

       return redirect()->route('all.portfolio')->with($notification);
    }

    public function EditPortfolio($id){

        $portfolio = Portfolio::findOrFail($id);
        return view('backend.pages.portfolio.edit_portfolio',compact('portfolio'));
    }

    public function UpdatePortfolio(Request $request, $id){

    $portfolio = Portfolio::findOrFail($id);
    $portfolio->name = $request->name;
    $portfolio->title = $request->title;
    $portfolio->description = $request->description;

    if ($request->file('image')) {

        $image = $request->file('image');
        @unlink(public_path('upload/portfolio/'.$portfolio->image));
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(1020,520)->save('upload/portfolio/'.$name_gen);
        $save_url = 'upload/portfolio/'.$name_gen;
        $portfolio['image'] = $save_url;
    }

    $portfolio->save();

    $notification = array(
    'message' => 'Portfolio Updated Successfully',
        'alert-type' => 'success'
       );

       return redirect()->route('all.portfolio')->with($notification);
    }

    public function DeletePortfolio($id){
        $portfolio = Portfolio::findOrFail($id);
        $image = $portfolio->image;
        unlink($image);

        Portfolio::findOrFail($id)->delete();

        $notification = array(
        'message' => 'Home Slide Delete Successfully',
        'alert-type' => 'success'
       );

       return redirect()->back()->with($notification);
    }

    public function PortfolioDetails($id){
        $Details = Portfolio::findOrFail($id);
        $multiImage = MultiImage::latest()->take(6)->get();
        return view('frontend.all_home.portfolio_details',compact('Details','multiImage'));
    }

    public function Portfolio(){

        $allportfolio = Portfolio::latest()->get();
        $multiImage = MultiImage::latest()->take(6)->get();
        return view('frontend.pages.portfolio',compact('allportfolio','multiImage'));
    }
}
