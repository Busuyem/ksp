@extends('layouts.app')
<title>{{ config('title', 'Your searched Result(s)') }}</title>

@section('content')
<div class="container">

    <div class="row justify-content-center">
    <div class="col-md-10">

    @include('inc.message')

            <div class="card">
                @if(!empty($users))
                    <div class="card-header">
                        <div class="float-right">
                            <img src="{{asset('storage/'.$users->profile_image)}}" Class ="rounded-circle w-25 float-right" alt="No Image">
                        </div>
                        <div class="text-center">Thanks for using our system, Dear {{auth()->user()->name}}.</div>
                        <div class="d-flex flex-column">Your Role is {{$users->designation}}.</div>
             </div>

                @else
                    <div class="card-header">
                        <div >Welcome! Kindly update your profile.</div>
                        <div class="float-right">
                            <img src="{{asset('storage/uploads/avatar.png')}}" Class ="rounded-circle w-25" alt="No Image">
                        </div>
                     </div>
                @endif

                @if(count($posts)>0)
                    @foreach($posts as $post)
                <div class="card-body">
                    <div Class = "float-left">
                        <img src="{{asset('storage/'.$post->post_image)}}" Class ="rounded-circle w-50" alt="No Image">
                    </div>

                </div>

                 <div class="text text-center">

                <h3 >{{$post->post_title}}</h3>


                <a href= "" class = "btn btn-success text-center mb-10">Category - {{$post->category->category}}</a>


                </div>

                <p class = "justify-content-center container">{{$post->post_body}}</p>


                <div class="container row col-xs-12 px-4">

                <div class = "text-center col-xs-4 p-1">
                    <a href= "{{route('showpost', $post->id)}}" class = "btn btn-info ">View Details</a>
                </div>


                @if(auth()->user()->id == $post->user_id || auth()->user()->email == 'admin@gmail.com')

                <div class = "col-xs-4 p-1">
                    <a href="{{route('editpost', $post->id)}}" class = "btn btn-primary ">Edit</a>
                </div>
                 @endif

`               @if(auth()->user()->id==$post->user_id || auth()->user()->email == 'admin@gmail.com')

                <div class = "col-xs-4 p-1">
                    <a href="{{route('destroyPost', $post->id)}}" class = "btn btn-danger ">Delete</a>
                </div>

                @endif
                </div>
                <hr>
                @endforeach

                @else
                <div class = "text text-center">
                    <h3 class = "text text-dark">No results found!</h3>
                <div>
                 @endif

         </div>


    </div>

</div>

@endsection
