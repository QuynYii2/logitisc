@extends('layouts.app')

@section('add_user')
    <form method="POST" action="{{route('user.save')}}">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                   placeholder="Enter name" name="name">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                   placeholder="Enter email" name="email">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Password</label>
            <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                   placeholder="Enter password" name="password">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Re-Password</label>
            <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                   placeholder="Enter password" name="re-password">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Role</label>
            <select class="form-control" id="exampleFormControlSelect1" name="role">
                @foreach($list_role as $value)
                    <option value="{{$value->id}}">{{$value->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Restaurant</label>
            <select class="form-control" id="exampleFormControlSelect1" name="restaurant">
                <option value=""></option>
            @foreach($list_restaurant as $value)
                    <option value="{{$value->id}}">{{$value->name}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
