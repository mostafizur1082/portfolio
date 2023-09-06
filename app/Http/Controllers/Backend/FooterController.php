<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Footer;
use Illuminate\Http\Request;

class FooterController extends Controller
{
     public function AllFooter(){
        $allfooter = Footer::find(1);
        return view('backend.pages.footer.all_footer',compact('allfooter'));
    }

    public function UpdateFooter(Request $request){
        $request->validate([
            'number' => 'required',
            'description' => 'required',
            'address' => 'required',
            'email' => 'required',
            'facebook' => 'required',
            'twitter' => 'required',
            'copyright' => 'required',
        ]);

    $footer_id = $request->id;

    Footer::findOrFail($footer_id)->update([
        'number' => $request->number,
        'description' => $request->description,
        'address' => $request->address,
        'email' => $request->email,
        'facebook' => $request->facebook,
        'twitter' => $request->twitter,
        'copyright' => $request->copyright,
    ]);
    

    $notification = array(
    'message' => 'Footer Updated Successfully',
        'alert-type' => 'success'
       );

       return redirect()->back()->with($notification);
    }

}
