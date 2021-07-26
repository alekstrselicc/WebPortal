@extends('layouts.app')

@section('content')


<div class="container">
   <form action="/logs" method="POST">
   @csrf

   <div class="row">
    <div class="col-8 offset-2 ">
        <div class="row pl-3 ">
            <h1>Adding log</h1>
        </div>
        <div class="form-group row col-md-6 ">
            <label for="">Severity:</label>
            <select id="severityId" class="form-control" name="severity">
                    <option selected>Choose...</option>
                    <option value="low">Low</option>
                    <option value="medium">Medium</option>
                    <option value="high">High</option>
                </select>
            </div>

        <div class="form-group row col-md-6">
            <label for="Description" >Description: </label>
                <input id="Description" type="text" class="form-control @error('Description') is-invalid @enderror" name="Description" value="{{ old('Description') }}" autocomplete="Description" autofocus>
        </div>

        <div class="row pl-3 pt-2">
            <button class="btn btn-primary" >Add log</button>
        </div>


        </div>
    </div>
   </form>
</div>

@endsection