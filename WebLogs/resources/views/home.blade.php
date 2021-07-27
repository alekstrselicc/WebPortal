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

        <div class="col-xs-10 d-flex mr-3">
        <form action="/searched" method="GET" class="d-flex">
            <input type="search" class="form-control"/>   
            <input type="submit" class="btn btn-primary d-flex" value="Search">
        </form>
        </div>
        <a href="/download">
            <button type="button" class="btn btn-success" class="mr-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down" viewBox="0 0 16 16" color="black">
                        <path fill-rule="evenodd" d="M8 1a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 13.293V1.5A.5.5 0 0 1 8 1z"></path>
                </svg>
               
            </button></a>
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
