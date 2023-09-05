<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function destroy(Request $request){

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification = array(

        'message' => 'Admin Logout Successfully',
        'alert-type' => 'success'
       );

        return redirect('/login')->with($notification);
    }

     public function profile(){
        $id = Auth::user()->id;
        $adminData = User::findOrFail($id);
        return view('admin.admin_profile_view',compact('adminData'));
    }

     public function edit(){
        $id = Auth::user()->id;
        $admin = User::findOrFail($id);

        return view('admin.admin_profile_edit', compact('admin'));
    }

    public function update(Request $request){
       $id = Auth::user()->id; 
       $admin = User::findOrFail($id);
       $admin->name = $request->name;
       $admin->username = $request->username;
       $admin->email = $request->email;
       $admin->phone = $request->phone;
       $admin->address = $request->address;
       
       if ($request->file('photo')) {
           $file = $request->file('photo');
            @unlink(public_path('upload/admin_images/'.$admin->photo));
            $fileName = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'),$fileName); 
            $admin['photo'] = $fileName;
       }
       $admin->save();

       $notification = array(

        'message' => 'Admin Profile Update Successfully',
        'alert-type' => 'success'
       );

       return redirect()->route('admin.profile')->with($notification);
    }

    public function changePassword(){

      return view('admin.change_password');
    }

    public function updatePassword(Request $request){

      $validatedata = $request->validate([
            'old_password' => 'required',
            'password'=> 'required|confirmed',
        ]);

      $hashedpassword = Auth::user()->password;
        if(Hash::check($request->old_password,$hashedpassword)){
            $admin = User::find(Auth::id());
            $admin->password = Hash::make($request->password);
            $admin->save();
            
            session()->flash('message', 'Admin Cahnge Password Successfully');
            return redirect()->back();
        }else{
            session()->flash('message', 'Old password Does Not match');
            return redirect()->back();
        }
    }
}
