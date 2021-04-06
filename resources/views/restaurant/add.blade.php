@extends('layouts.app')

@section('add_restaurant')
<form method="POST" action="{{route('restaurant.save')}}" >
    @csrf
    <div class="form-group">
        <label for="exampleInputEmail1">Name</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name" name="restaurant_name" >
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
