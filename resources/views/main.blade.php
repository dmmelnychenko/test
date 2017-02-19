@extends('index')
@section('content')
            <table id="table" class="table table-striped">
                <thead>
                    <tr>
                        <th data-column="id" class="sort">ID</th>
                        <th data-column="ua" class="sort">User-Agent</th>
                        <th data-column="ip" class="sort">IP</th>
                        <th data-column="ref" class="sort">Ref</th>
                        <th data-column="param1" class="sort">Param1</th>
                        <th data-column="param2" class="sort">Param2</th>
                        <th data-column="error" class="sort">Errors</th>
                        <th data-column="bad_domain" class="sort">Bad domain</th>
                        <th data-column="created_at" class="sort">Created at</th>
                    </tr>
                    <tr>
                        <td><input type="text" data-column="id" class="filter"></td>
                        <td><input type="text" data-column="ua" class="filter"></td>
                        <td><input type="text" data-column="ip" class="filter"></td>
                        <td><input type="text" data-column="ref" class="filter"></td>
                        <td><input type="text" data-column="param1" class="filter"></td>
                        <td><input type="text" data-column="param2" class="filter"></td>
                        <td><input type="text" data-column="error" class="filter"></td>
                        <td><input type="text" data-column="bad_domain" class="filter"></td>
                        <td><input type="text" data-column="created_at" class="filter"></td>
                    </tr>

                </thead>
                <tbody>
                @if(!count($clicks))
                    <tr><td>There are no clicks</td></tr>
                @endif
                @foreach($clicks as $click)
                    <tr>
                        <td class="id">{{ $click->id }}</td>
                        <td class="ua">{{ $click->ua }}</td>
                        <td class="ip">{{ $click->ip }}</td>
                        <td class="ref">{{ $click->ref }}</td>
                        <td class="param1">{{ $click->param1 }}</td>
                        <td class="param2">{{ $click->param2 }}</td>
                        <td class="error">{{ $click->error }}</td>
                        <td class="bad_domain">{{ $click->bad_domain }}</td>
                        <td class="created_at">{{ $click->created_at }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
@endsection
