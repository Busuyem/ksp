<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use App\Mail\Contact;

class ContactController extends Controller
{
    public function contact(){

        return view('comments.contact');
    }


    public function contactStore(Request $request){

       $data = $this->validate($request, [
           'name' => 'required',
           'email' => 'required|email',
           'subject' => 'required',
           'message' => 'required'

       ]);

       Mail::to('busuyem@gmail.com')->send(new Contact($data));

       return redirect('/contact')->with('contact', "Thank you for contacting us. We shall get back to you shortly.");
    }
}
