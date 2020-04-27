@extends('layouts.app')

@section('content')
<div class="container text-center">
    <img src="{{asset('images/logo.png')}}" height="400"/>
    <h1>UNDER CONSTRUCTION</h1>
    <p><img src="https://media.giphy.com/media/fZ2YagbBRmL2qIWKnR/giphy.gif"></p>
    <p>Made by <span id="creator"></span></p>


    <script>
        $.ajax({
            url: "{{route('api.users.show', ['6'])}}",
            type: 'GET',
            dataType: 'json',
            success: function (json) {
                console.log(json);
                $( "#creator" ).text(json['name']);
            }
        });
    </script>

    </div>
</div>
@endsection
