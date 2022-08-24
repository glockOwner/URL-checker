@extends('layouts.main')
@section('content')
    <table class="table table-dark table-striped">
        <thead>
        <tr>
            <th scope="col">URL</th>
            <th scope="col">Status code</th>
            <th scope="col">Date</th>
        </tr>
        </thead>
        <tbody>
        @foreach($checks as $check)
            <tr>
                <td>{{$check->url->url}}</td>
                <td class="{{$check->http_code < 300 ? 'text-success' : 'text-danger'}}">{{$check->http_code}}</td>
                <td>{{$check->created_at}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="mt-1">
        {{$checks->links()}}
    </div>
@endsection
