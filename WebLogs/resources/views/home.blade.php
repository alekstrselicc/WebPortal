@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <a href="logs/create">Add log</a>


            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">description</th>
                    <th scope="col">severity</th>
                    <th scope="col">Time</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($logs as $log)
                    <tr>
                    <td>{{ $log->description }}</td>
                    <td>{{ $log->severity }}</td>
                    <td>@mdo</td>
                    </tr>
           @endforeach
                </tbody>
        </table>




        </div>
    </div>
</div>
@endsection
