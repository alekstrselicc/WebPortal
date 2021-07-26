@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="logs/create">Add log</a>
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Severity</th>
                    <th scope="col">Description</th>
                    <th scope="col">Time</th>
                    <th scope="col">Owner</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($logs as $log)
                    <tr>
                    <td>{{ $log->severity }}</td>
                    <td>{{ $log->description }}</td>
                    <td>{{ $log->created_at }}</td>
                    <td>{{ $log->owner }}</td>
                    </tr>
                    @endforeach
                </tbody>
        </table>




        </div>
    </div>
</div>
@endsection
