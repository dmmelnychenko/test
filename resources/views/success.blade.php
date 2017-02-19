@extends('index')
@section('content')
        <div>Success! New click has been saved!</div>
        <ul>
            <li>ID: {{ $click->id }}</li>
            <li>User-Agent: {{ $click->ua }}</li>
            <li>IP: {{ $click->ip }}</li>
            <li>Ref: {{ $click->ref }}</li>
            <li>Param1: {{ $click->param1 }}</li>
            <li>Param2: {{ $click->param2 }}</li>
        </ul>
@endsection
