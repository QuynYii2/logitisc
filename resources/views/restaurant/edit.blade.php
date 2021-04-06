@extends('layouts.app')

@section('edit_restaurant')
    <form method="POST" action="{{route('restaurant.update')}}" >
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input hidden name="id" value="{{$list->id}}">
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name" name="restaurant_name" value="{{$list->name}}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
