@extends('layouts.app')

<title>{{ config('title', 'Create your post') }}</title>

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
           
            <div class="card">
                <div class="card-header">Write a post now</div>

                <div class="card-body">
                    
                <form method="POST" action="{{ route('posts.post') }}" enctype = "multipart/form-data">
                       

                        <div class="form-group row">
                            <label for="post_title" class="col-md-4 col-form-label text-md-right">{{ __('Post Title') }}</label>

                            <div class="col-md-6">
                                <input id="post_title" type="text" class="form-control @error('post_title') is-invalid @enderror" name="post_title" value="{{ old('post_title') }}" required autocomplete="post_title" autofocus>

                                @error('post_title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="post_body" class="col-md-4 col-form-label text-md-right">{{ __('Write your post') }}</label>

                            <div class="col-md-6">

                                <textarea  type="text" id="post_body" class="form-control @error('post_body') is-invalid @enderror" name="post_body" value="{{ old('post_body') }}" required autocomplete="post_body" autofocus rows = 7></textarea>

                                @error('post_body')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="post_image" class="col-md-4 col-form-label text-md-right">{{ __('Feature Image') }}</label>

                            <div class="col-md-6">
                                <input id="post_image" type="file" class="form-control @error('post_image') is-invalid @enderror" name="post_image" value="{{ old('post_image') }}" required autocomplete="post_body" autofocus>

                                @error('post_image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">

                            <label for="category_id" type="category_id" class="col-md-4 col-form-label text-md-right">{{ __('Select Category') }}</label>
                            <div class="col-md-6">
                                <select name="category_id" id="category_id">
                                            <option value="">Select</option>
                                        @if(count($categories)> 0)
                                            @foreach($categories as $category)

                                         <option value="{{ $category->id }}">{{$category->category}}</option>
                                            @endforeach
                                        @endif
                                </select>

                                @error('category_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Publish Post') }}
                                </button>
                            </div>
                        </div>
                         @csrf
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection

