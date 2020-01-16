<?php

namespace App\Http\Controllers;

use App\Like;


use App\Post;
use App\Comment;

use App\Dislike;
use App\Profile;
use App\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index(){

       $categories = Category::all();

        return view("posts.post", compact('categories'));

    }

    public function addPost(Request $request){

        $data = $this->validate($request, [
            'post_title' => 'required',
            'post_body' => 'required',
            'post_image' => 'sometimes|File|Image|mimes:jpeg, jpg, png, pdf',
            'category_id' => 'required',
            

        ]);

        if($request->hasFile('post_image')){
            $image =  $request->post_image->store('posts', 'public');

        }else{

            $image = "";
        }



        $posts = new Post;
        $posts->post_title = $data['post_title'];
        $posts->post_body = $data[('post_body')];
        $posts->category_id = $data['category_id'];
        $posts->post_image = $image;
        $posts->user_id = auth()->user()->id;
        $posts->save();
        return redirect('/dashboard')->with('post_message', 'Post successfully published.');

    }


    public function showpost($id){

        $categories = Category::all();

        $posts = Post::findOrFail($id);
        //$likePost = Post::find($id);
        $countLike = $posts->likes->count();
        $countDisLike = $posts->dislikes->count();
        $countComments = $posts->comments->count();
        $comments = $posts->comments;
       // $countLike = Like::where(['post_id'=>$likePost->id])->count();

        return view("posts.postview", compact('posts', 'categories', 'countLike', 'countDisLike', 'countComments', 'comments'));

    }

    public function editpost($id){

        $categories = Category::all();
        $posts = Post::find($id);
        $category = Category::find($posts->category_id);
        return view("posts.edit", compact('categories', 'posts', 'category'));

    }

    public function updatePost(Request $request, $id){

        $data = $this->validate($request, [
            'post_title' => 'required',
            'post_body' => 'required',
            'post_image' => 'sometimes|File|Image|mimes:jpeg, jpg, png, pdf',
            'category_id' => 'required'
        ]);



        $posts = Post::findOrFail($id);
        $posts->post_title = $data['post_title'];
        $posts->post_body = $data['post_body'];
        $posts->category_id = $data['category_id'];

        if($request->hasFile('post_image')){

            $posts->post_image = $request->post_image->store('posts', 'public');

        }

        $posts->user_id = auth()->user()->id;
        $posts->update();


        return redirect('/dashboard')->with('upDatePost', 'Your post has been updated successfully.');
    }


    public function destroyPost($id){

        $posts = Post::find($id);

        $posts->delete();

        return redirect('/dashboard')->with('delPost', 'The post has been successfully deleted.');

    }

    public function like($id){
        $user_id = auth()->user()->id;
        //$like_user = Like::where(['user_id' => $user_id, 'post_id' => $id])->first();
        //$posts = Post::find($id);
        $liked_user = Like::where(['user_id' => $user_id, 'post_id' => $id])->first();

        //$posts = $posts->likes->first();

        if(empty($liked_user->user_id)){
            $user_id = auth()->user()->id;
            $post_id = $id;
            $email = auth()->user()->email;
            $disLike = new Like;
            $disLike->user_id = auth()->user()->id;
            $disLike->post_id = $id;
            $disLike->email = auth()->user()->email;
            $disLike->save();
            return back();
        };

        return back();

    }

    public function disLike($id){
        $user_id = auth()->user()->id;
        //$like_user = Like::where(['user_id' => $user_id, 'post_id' => $id])->first();
        //$posts = Post::find($id);
        $disLiked_user = Dislike::where(['user_id' => $user_id, 'post_id' => $id])->first();
        //$posts = $posts->likes->first();

        if(empty($disLiked_user->user_id)){

            $user_id = auth()->user()->id;
            $post_id = $id;
            $email = auth()->user()->email;
            $disLike = new Dislike;
            $disLike->user_id = auth()->user()->id;
            $disLike->post_id = $id;
            $disLike->email = auth()->user()->email;
            $disLike->save();
            return back();
        };

        return back();

    }

    public function addComments(Request $request, $id)
    {



        $data = $this->validate($request, [


            'comment' => 'required'

        ]);

        $comment = new Comment;
        $comment->user_id = auth()->user()->id;
        $comment->post_id = $id;
        $comment->comment = $data['comment'];
        $comment->save();
        return back();

    }

    public function search(Request $request){


        $user_id = auth()->user()->id;
        $users = Profile::find($user_id);
        $keyWord = $request->input('search');
        $posts = Post::where('post_title', 'LIKE', '%'.$keyWord.'%')->orWhere('post_body', 'LIKE', '%'.$keyWord.'%')->get();


           return view("posts.search", compact('users', 'posts'));
    }

}
