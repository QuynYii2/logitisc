@extends('layouts.app')

@section('edit_material')
    <form method="POST" action="{{route('material.update')}}" >
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input hidden name="id" value="{{$list_material->id}}">
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name" name="name" value="{{$list_material->name}}">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Count</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name" name="count" value="{{$list_material->count}}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
