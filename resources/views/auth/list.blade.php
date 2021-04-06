@extends('layouts.app')

@section('list_user')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
            <th scope="col">Restaurant</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($list_user as $key => $value)
            <tr>
                <th scope="row">{{$key+1}}</th>
                <td>{{$value->name}}</td>
                <td>{{$value->email}}</td>
                <td>
                    @foreach($list_role as $key => $id_role)
                        {{$value->role_id == $id_role->id ? $id_role->name : ''}}
                    @endforeach
                </td>
                <td>
                    @foreach($list_restaurant as $key => $id_restaurant)
                        {{$value->restaurant_id == $id_restaurant->id ? $id_restaurant->name : ''}}
                    @endforeach
                </td>
                <td>
                    <a href="{{route('user.edit',['id'=>$value->id])}}">
                        <input type="button" class="btn btn-primary" value="Edit">
                    </a>
                    <a href="{{route('user.delete',['id'=>$value->id])}}">
                        <input type="button" class="btn btn-danger" value="Delete">
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
