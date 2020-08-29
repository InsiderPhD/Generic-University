@extends('layouts.app')

@section('content')
    <div class="container text-center">
        <img src="{{asset('images/logo.png')}}" height="400"/>
        <h1>Contact IT</h1>

        <form method="GET" action="{{route("contact.submit")}}">

            <div  style="text-align: left">
                <div class="row">
                    <div class="col">
                        <label for="email">Your Email address</label>
                    </div>
                    <div class="col-10">
                        <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" name="email">
                        <small id="emailHelp" class="form-text text-muted">We need this to contact you</small>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <label for="issue">Your Issue</label>
                    </div>
                    <div class="col-10">
                        <input type="text" class="form-control" id="issue" aria-describedby="issuehelp" placeholder="Login doesn't work" name="issue">
                        <small id="issuehelp" class="form-text text-muted">Please be as clear as possible</small>
                    </div>
                </div>

            <div class="p-5">
                <button type="submit" class="btn btn-lg btn-primary">Report</button>
            </div>

        </form>
    </div>
    </div>
@endsection
