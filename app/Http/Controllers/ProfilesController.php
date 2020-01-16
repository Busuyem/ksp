<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use Auth;


class ProfilesController extends Controller
{
    public function index(){

        return view("profiles.profile");

    }

    public function addProfile(Request $request){

        $data = $this->validate($request, [

            "name" => "required",
            "designation" => "required",
            "profile_image" => "sometimes|File|Image|max:1999|mimes:jpg,jpeg,png,pdf",
            "user_id" => ""
        ]);

        if($request->hasFile('profile_image')){

            $image = $request->profile_image->store('uploads', 'public');

        }else{
            $image = "";
        }

        $profiles = new Profile;

        $profiles->name = $data['name'];

        $profiles->designation = $data['designation'];

        $profiles->profile_image = $image;

        $profiles->user_id = auth()->user()->id;
        $profiles->save();


        return redirect("dashboard")->with('pro_message', 'Profile successfully updated');
    }


}
