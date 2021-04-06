@extends('layouts.app')

@section('edit_user')
    <form method="POST" action="{{route('user.update')}}">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input hidden name="id" value="{{$list->id}}">
            <input hidden name="name_old" value="{{$list->name}}">
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                   placeholder="Enter name" name="name" value="{{$list->name}}">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input hidden name="email_old" value="{{$list->email}}">
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                   placeholder="Enter email" name="email" value="{{$list->email}}">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Password</label>
            <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                   placeholder="Enter password" name="password" value="{{$list->password}}">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Re-Password</label>
            <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                   placeholder="Enter password" name="re-password" value="{{$list->password}}">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Role</label>
            <select class="form-control" id="exampleFormControlSelect1" name="role">
                <option value="{{$list->role_id}}">
                    @foreach($list_role as $key => $id_role)
                        {{$list->role_id == $id_role->id ? $id_role->name : ''}}
                    @endforeach
                </option>
                @foreach($list_role as $value)
                    <option value="{{$value->id}}">{{$value->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Restaurant</label>
            <select class="form-control" id="exampleFormControlSelect1" name="restaurant">
                <option value="{{$list->role_id}}">
                    @foreach($list_restaurant as $key => $id_restaurant)
                        {{$list->restaurant_id == $id_restaurant->id ? $id_restaurant->name : ''}}
                    @endforeach
                </option>
                @foreach($list_restaurant as $value)
                    <option value="{{$value->id}}">{{$value->name}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
