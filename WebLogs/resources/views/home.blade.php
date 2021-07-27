@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row ml-10">

        <div class="col">
            <a href="logs/create" class="btn btn-primary">Add log</a>  
        </div>

        <div class="col-sm-2">
            

                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Filter
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="/filtered/low">Low</a>
                        <a class="dropdown-item" href="/filtered/medium">Medium</a>
                        <a class="dropdown-item" href="/filtered/high">High</a>
                    </div>
                </div>
        </div>

        <div class="col-xs-10 d-flex">
        <form action="/searched" method="GET" class="d-flex">
            <input type="search" class="form-control"/>   
            <input type="submit" class="btn btn-primary d-flex" value="Search">
        </form>
        </div>
    </div>

        <div class="row mt-2">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Severity</th>
                    <th scope="col">Description</th>
                    <th scope="col">Time</th>
                    <th scope="col">User</th>
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
@endsection
