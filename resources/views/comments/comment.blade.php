@extends('layouts.app')

@section('content')
<div class="container">

        <div class="container col-md-5">

        @include('inc.message')


         <form action="{{route('updateComments', $comments->id)}}" method="post" class="text-center">
            @method('put')
             <div>
                <h4 for="comment">Update your comment here</h4>
            </div>

            <div>

                <textarea name="comment" id="" cols="50" rows="10">{{$comments->comment}}</textarea>
            </div>
            <button type="submit" class="btn btn-info">Update</button>
            @csrf
        </form>

        </div>


    </div>

</div>
@endsection
