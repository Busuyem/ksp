<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use App\User;


class CommentController extends Controller
{
    public function postComment(){

        $user_id = auth()->user()->id;
        $post = Post::find($user_id);
        $comments = $post->comments;

        return view('posts.postview', compact('comments'));
    }

    public function delComments($id){

        $comments = Comment::findOrFail($id);
        $comments->delete();
        return redirect()->back();

    }

    public function editComments($id){

        //$user_id = auth()->user()->id;

        $comments = Comment::find($id);

       return view('comments.comment', compact('comments'));

    }

    public function updateComments(Request $request, $id){

        $data = $this->validate($request, [

            'comment' => 'required'

        ]);


        $comments = Comment::findOrFail($id);


        $comments->comment = $data['comment'];

        $comments->update();


        return redirect()->back()->with('updateComment', 'Your comment is updated successfully. Thanks.');

        }


}
