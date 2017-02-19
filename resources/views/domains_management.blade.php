@extends('index')
@section('content')
    <div class="container">
        <input id="new-domain" class="form-control" type="text" placeholder="New domain name...">
        <button id="add-new-domain" class="btn btn-default" type="submit">Add</button>
        <table id="domains" class="table table-striped">
            <thead>
            <th>ID</th>
            <th>Name</th>
            <th></th>
            </thead>
            <tbody>
            @foreach($domains as $domain)
                <tr data-id="{{ $domain->id }}">
                    <td>{{ $domain->id }}</td>
                    <td>{{ $domain->name }}</td>
                    <td><button type="button" class="btn btn-danger delete-domain">Delete</button></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
