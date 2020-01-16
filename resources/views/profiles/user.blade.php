@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(auth()->user()->email == "admin@gmail.com")
            <div class="card">
                <div class="card-header text-center"><h3>List of all Users</h3></div>
                @include('inc.message')
                <div class="card-body">

            <table class="table">

                <thead>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>

                </thead>

                <tbody>
                    @foreach($users as $user)
                        <tr>

                        <td>{{$user->name}}</td>
                       
                        <td>{{$user->email}}</td>

                        <td>

                        <form action="{{route('delUsers', $user->id)}}" method="post">
                                @method('delete')
                                <button type="submit">Delete</button>
                                @csrf
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
