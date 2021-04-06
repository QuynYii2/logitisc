
@extends('layouts.app')

@section('list_restaurant')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Managers</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($list as $key => $value)
            <tr>
                <th scope="row">{{$key+1}}</th>
                <td>{{$value->name}}</td>
                <td>
                    @foreach($value->users as $manger)
                        @if($manger->role_id == 2)
                            {{$manger->name}}
                        @endif
                    @endforeach
                </td>
                <td>
                    <a href="{{route('restaurant.edit',['id'=>$value->id])}}">
                        <input type="button" class="btn btn-primary" value="Edit">
                    </a>
                    <a href="{{route('restaurant.delete',['id'=>$value->id])}}">
                        <input type="button" class="btn btn-danger" value="Delete">
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
