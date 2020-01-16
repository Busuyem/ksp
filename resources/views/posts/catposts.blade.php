@extends('layouts.app')
<title>{{ config('title', 'Categories posts') }}</title>
@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-3">
            <ul class = "list-group">
                <li class = "list-group-item text-center">Categories</li>
                @if(count($categories)>0)
                    @foreach($categories as $category)
                <li class = "list-group-item"><a href="{{route('categories.show', $category->id)}}">{{$category->category}}</a></li>
                    @endforeach
               @endif
            </ul>

        </div>

        <div class="col-md-9">
            @foreach($cats->posts as $cat)
            <div class="card my-2">
                <div class="card-header">
                <h3 class ="text-center">{{$cat->title}}</h3>
                    <h6>{{$cat->post_title}}</h6>

                 <p>{{ Carbon\Carbon::parse($cat->created_at)->format('M j, Y') }} at exactly {{ Carbon\Carbon::parse($cat->created_at)->format('g:ia') }} by</p>

                 <p>{{$cat->user->name}}</p>
                </div>



                <div class="card-body">
                    <p>{{$cat->post_body}}</p>
                </div>


                </div>
        @endforeach
        </div>




</div>


            </div>
        </div>
    </div>
</div>


    </div>




@endsection
