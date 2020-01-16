@extends('layouts.app')
<title>{{ config('title', 'Edit '.$posts->user->name."'s post") }}</title>
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header">Post Update</div>

                <div class="card-body">
                <form method="POST" action="{{ route('updatePost', $posts->id) }}" enctype = "multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="post_title" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="post_title" type="text" class="form-control @error('post_title') is-invalid @enderror" name="post_title" value="{{ $posts->post_title }}" required autocomplete="post_title" autofocus>

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
                                
                                <textarea id="post_body" type="text" class="form-control @error('post_body') is-invalid @enderror" name="post_body" value="{{ old('post_body') }}" required autocomplete="post_body" autofocus rows = 7>{!! ($posts->post_body) !!}</textarea>

                                @error('post_body')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="post_image" class="col-md-4 col-form-label text-md-right">{{ __('Select your photo') }}</label>

                            <div class="col-md-6">
                                <input id="post_image" type="file" class="form-control @error('post_image') is-invalid @enderror" name="post_image" value="{{ old('post_image') }}"  autofocus>

                                @error('post_image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">

                            <label for="category_id" type="category_id" class="col-md-4 col-form-label text-md-right">{{ __('Feature Image') }}</label>
                            <div class="col-md-6">
                                <select name="category_id" id="category_id">
                                            <option value="{{$category->id}}">{{$category->category}}</option>
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
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
