@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row justify-content-center">

    <div class="col-md-10 col-xs-10 col-sm-10">

    @include('inc.message')

            <div class="card">

                @if(!empty($users))

                    <div class="card-header">

                       
                        <div class="float-right">
                            <img src="{{asset('storage/'.$users->profile_image)}}" Class ="rounded-circle w-25 float-right" alt="No Image">
                        </div>

                        <div class="justify-content-center">

                            <p><h5>Welcome, Dear {{$users->name}}.</h5></p>

                        </div>

                        <div class="d-flex flex-column">

                            <h5>Your Skills Set: {{$users->designation}}.</h5>

                        </div>

                        <div>
                            <p>You joined this platform on {{ Carbon\Carbon::parse($users->created_at)->format('M j, Y') }} at exactly {{ Carbon\Carbon::parse($users->created_at)->format('g:ia') }}.</p>
                            <p>Enjoy by sharing knowledge with others!</p>
                        </div>

                 </div>

                @else
                    <div class="card-header">

                            <div >
                                <h4>Welcome, {{auth()->user()->name}}! Kindly <a href="{{route('profiles.profile')}}">update</a> your profile.</h4>
                            </div>

                            <div class="float-right">
                                <img src="{{asset('storage/uploads/avatar.png')}}" Class ="rounded-circle w-25" alt="No Image">
                            </div>
                     </div>
                @endif


               

                @foreach($posts as $post)
                
                <div class="card-body">
                    
                    <div Class = "justify-content-center">
                        
                        <img src="{{asset('storage/'.$post->post_image)}}" Class ="rounded-circle w-25" alt="No Image"/>

                    </div>

                

                    <div class="text text-center">

                    <h3>{{$post->post_title}}</h3> <small>Posted by <b>{{$post->user->name }}</b> on {{ Carbon\Carbon::parse($post->created_at)->format('M j, Y') }} at exactly {{ Carbon\Carbon::parse($post->created_at)->format('g:ia') }}.</small>

                            <p><a href= "" class = "btn btn-success justify-content-center">Category - {{$post->category->category}}</a></p>
                    </div>

                    <div class = "float-left container">

                        <p class="justify-content-center">{!! Str::words($post->post_body, 70, '...') !!} 
                            
                            @if(auth()->user()->email !== 'admin@gmail.com')

                            <a href="{{route('showpost', $post->id)}}">Read more</a>

                            @endif
                        </p>
                    
                    </div>

               

                <div class="container row col-xs-12 px-4">

                    @if(auth()->user()->id==$post->user_id || auth()->user()->email == 'admin@gmail.com')

                        <div class = "text-center col-xs-4 p-1">

                    

                        <a href= "{{$post->path()}}" class = "btn btn-info ">View Details</a>

                    </div>

                    @endif


                     @if(auth()->user()->id == $post->user_id || auth()->user()->email == 'admin@gmail.com')

                    <div class = "col-xs-4 p-1">

                        <a href="{{route('editpost', $post->id)}}" class = "btn btn-primary ">Edit</a>

                    </div>

                    @endif

`                   @if(auth()->user()->id==$post->user_id || auth()->user()->email == 'admin@gmail.com')

                    <div class = "col-xs-4 p-1">

                        <a href="{{route('destroyPost', $post->id)}}" class = "btn btn-danger ">Delete</a>

                    </div>

                    @endif
             </div>
            
             <hr>
             
            </div>
            @endforeach

                    <div class = "py-2 container">
                        {{$posts->links()}}
                    </div>

             </div>
    
</div>

@endsection
