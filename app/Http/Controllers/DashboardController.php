<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Category;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()

    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        return view('dashboard');
    }

    public function dash(){

       

        $posts =    Post::orderBy("created_at", "desc")->paginate(5);
    
        $user_id = auth()->user()->id;

        $users = User::find($user_id);

        $users = $users->profile;
        
        return view("dashboard", compact('users', 'posts'));

        //dd($users);
        
        //$prof = $user->profile->name;

        

    }

    public function allUsers(){

        $users = User::all();

        return view("profiles.user", compact('users'));

    }

    public function delUsers(User $user){

        $user->posts()->delete();

        $user->delete();

        return back()->with('delUser', 'User has been successfully deleted.');

    }

}
