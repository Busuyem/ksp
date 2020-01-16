@extends('layouts.app')
<title>{{ config('title', 'Add new category') }}</title>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
         @if(auth()->user()->email == "admin@gmail.com")
            <div class="card">

                <div class="card-header">Category</div>
                @include('inc.message')
                <div class="card-body">

                    <form method="POST" action="{{ route('addCategory') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="category" class="col-md-4 col-form-label text-md-right">Enter Category</label>

                            <div class="col-md-6">
                                <input id="category" type="category" class="form-control @error('category') is-invalid @enderror" name="category" value="{{ old('category') }}" required autocomplete="category" autofocus>

                                @error('category')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Add Category
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                  @else
                   <h3> You are not authorized to be here!</h3>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
