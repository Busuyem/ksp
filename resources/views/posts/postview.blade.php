@extends('layouts.app')
<title>{{ config('title', 'Reading '.$posts->user->name."'s post") }}</title>
@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-3">
            <ul class = "list-group">
                <li class = "list-group-item text-center">Categories</li>

                    @foreach($categories as $category)
                <li class = "list-group-item"><a href="{{route('categories.show', $category->id)}}">{{$category->category}}</a></li>
                    @endforeach

            </ul>

        </div>

        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <h3 class ="text-center">{{$posts->post_title}}</h3>
                    <h6>Posted on {{ Carbon\Carbon::parse($posts->created_at)->format('M j, Y') }} at exactly {{ Carbon\Carbon::parse($posts->created_at)->format('g:ia') }} by</h6>
                    {{$posts->user->name}}
                </div>

                <div class="card-body">
                    <p>{!! $posts->post_body !!}</p>
                </div>
            </div>


                 <a href="{{route('like', $posts->id)}}" class ="col-md-6" ><b><i class="fas fa-thumbs-up"></i> ({{$countLike}})</b></a>
                 <a href="{{route('dislike', $posts->id)}}" class ="col-md-6" ><b><i class="far fa-thumbs-down"></i> ({{$countDisLike}})</b></a>




            <a href="" class ="col-md-6" ><b><i class="far fa-comments"></i> {{$countComments}}</b></a>

            <hr>

            <form action="{{route('addComments', $posts->id)}}" method="post" class="text-center">
             <div>
                <h4 for="comment">Write your comment here</h4>
            </div>

            <div>

                <textarea name="comment" id="" cols="50" rows="10"></textarea>
            </div>
        <button type="submit" class="btn btn-info">Submit</button>
        @csrf
        </form>
        <hr>
        <div class="container col-md-5">
                <h3><u class class="text text-center"><strong>COMMENTS</strong></u></h3>
            @foreach($comments as $comment)
                    <div class = "card-body">{{$comment->comment}} <br>by <small>{{auth()->user()->name}} on {{date('M j, Y.', strtotime($comment->updated_at))}}</small></div>
                    <small>
                        <a href = "{{route('delComments', $comment->id)}}">Delete</a> | <a href = "{{route('editComments', $comment->id)}}">Edit</a>
                    </small>
                    <hr>
            @endforeach


        </div>

        </div>



    </div>
    </div>

</div>
@endsection
