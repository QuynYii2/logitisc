@extends('layouts.app')

@section('add_material')
<form method="POST" action="{{route('material.save')}}" >
    @csrf
    <div class="form-group">
        <label for="exampleInputEmail1">Name</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name" name="name" >
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Count</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name" name="count" >
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
