@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(auth()->user()->email == "admin@gmail.com")
            <div class="card">
                <div class="card-header text-center"><h3>All Categories</h3></div>
                @include('inc.message')
                <div class="card-body">

            <table class="table">

                <tbody>
                    @foreach($cats as $cat)
                        <tr>

                        <td>{{$cat->category}}</td>
                        <td>

                            <a href = "{{route("categories.edit", $cat->id)}}" class = "btn btn-primary">Edit</a>

                            <form Method = "post" action = "{{route('categories.delete', $cat->id)}}" class = "float-right">
                                @csrf
                                @method('delete')

                            <button class = "btn btn-danger">Delete</button>
                            </form>

                        </td>
                        </tr>
                    @endforeach
                </tbody>

        </table>

            </div>
            @else
                <h3> Unathorized to access details of this page!</h3>
              @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
