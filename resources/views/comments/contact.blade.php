@extends('layouts.app')
<title>{{ config('title', 'Contact us today') }}</title>
@section('content')

<div class="container">

    <div class="container col-md-8">

            @include('inc.message')

            <h4>Kindly fill the form below to reach us and we shall get back to you in no distant time.</h4>

            <form method = "post" action = "{{route('contact.store')}}">
                @csrf

                <div class="form-group">
                    <label for="exampleFormControlInput1">Your Name</label>
                    <input type="text" class="form-control" id="exampleFormControlTex1" placeholder="Your name" name = "name" value = "{{old('name')}}">
                    <span class = "text text-danger">{{$errors->first('name')}}<span>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Email address</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com"  name = "email" value = "{{old('email')}}">
                    <span class = "text text-danger">{{$errors->first('email')}}<span>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Subject</label>
                    <input type="text" class="form-control" id="exampleFormControlText1" placeholder="Subject of your message" name = "subject" value = "{{old('subject')}}">
                    <span class = "text text-danger">{{$errors->first('subject')}}<span>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Your Message</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"  name = "message" value = "{{old('message')}}" placeholder="Write your message here..."></textarea>
                    <span class = "text text-danger">{{$errors->first('message')}}<span>

                </div>

                <button class = "btn btn-dark">Send Message</button>
        </form>


        </div>


    </div>

</div>
@endsection






