@extends('index')
@section('content')
        <div>Error! Click with next params already exists!</div>
        <ul>
            <li>User-Agent: {{ $click->ua }}</li>
            <li>IP: {{ $click->ip }}</li>
            <li>Ref: {{ $click->ref }}</li>
            <li>Param1: {{ $click->param1 }}</li>
        </ul>

        @if($click->bad_domain)
            <script>
                $(document).ready(function(){
                    var redirect = function (){
                        location.href = 'http://google.com';
                    };
                    setTimeout(redirect, 5000);
                });
            </script>
        @endif
@endsection
