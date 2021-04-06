
@extends('layouts.app')

@section('list_menu')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Food name</th>
            <th scope="col">Price food</th>
            <th scope="col">Restaurant</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($list_menu as $key => $value_menu)
            <tr>
                <th scope="row">{{$key+1}}</th>
                <td>{{$value_menu->food_name}}</td>
                <td>{{$value_menu->price}}</td>
                <td>
                    @foreach($list_restaurant as $key => $value_restaurant)
                        {{$value_menu->restaurant_id == $value_restaurant->id ? $value_restaurant->name : ''}}
                    @endforeach
                </td>
                <td>
{{--                    <a href="{{route('menu.edit',['id'=>$value_menu->id])}}">--}}
{{--                        <input type="button" class="btn btn-primary" value="Detail">--}}
{{--                    </a>--}}
                    <a href="{{route('menu.edit',['id'=>$value_menu->id])}}">
                        <input type="button" class="btn btn-primary" value="Edit">
                    </a>
                    <a href="{{route('menu.delete',['id'=>$value_menu->id])}}">
                        <input type="button" class="btn btn-danger" value="Delete">
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
