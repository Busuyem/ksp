@component('mail::message')
<strong>Thank You for Your Message!</strong>

<p>Name : {{$data['name']}}</P>
<p>Email : {{$data['email']}}</P>

<strong>Message:</strong>
<p>{{$data['message']}}</P>
@endcomponent
