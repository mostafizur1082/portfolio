<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\MultiImage;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ContactController extends Controller
{
    public function Contact(){
        $multiImage = MultiImage::latest()->take(6)->get();
        return view('frontend.pages.contact',compact('multiImage'));
    }

    public function StoreMessage(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'phone' => 'required',
            'message' => 'required',
        ]);

    $contact = new Contact();
    $contact->name = $request->name;
    $contact->email = $request->email;
    $contact->subject = $request->subject;
    $contact->phone = $request->phone;
    $contact->message = $request->message;
    $contact->created_at = Carbon::now();

    $contact->save();

    $notification = array(
    'message' => 'Message Send Successfully',
        'alert-type' => 'success'
       );

       return redirect()->back()->with($notification);
    }

    public function ContactMessage(){
        $allcontact = Contact::all();
        return view('backend.pages.contact.contact_message',compact('allcontact'));
    }

    public function DeleteMessage($id){
        Contact::findOrfail($id)->delete();

        $notification = array(
        'message' => 'Contact Delete Successfully',
        'alert-type' => 'success'
       );

       return redirect()->back()->with($notification);
    }
}
