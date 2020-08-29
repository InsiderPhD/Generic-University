@extends('layouts.app')

@section('content')
    <div class="container text-center">
        <img src="{{asset('images/logo.png')}}" height="400"/>
        <h1>Contact IT</h1>

        <p>Thanks for Submitting your issue: {!! $input['issue'] !!}</p>
        <p>We will follow up with an email to: {!! $input['email'] !!}</p>
    </div>
    </div>
@endsection
