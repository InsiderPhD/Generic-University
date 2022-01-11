@foreach($vulnerabilities as $vuln)
    <p><a href="">vuln:  {{$vuln->issue}}</a></p>
    <p><a href="">vuln: {!! $vuln->issue !!}</a></p>
@endforeach
