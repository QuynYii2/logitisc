
@extends('layouts.app')

@section('list_menu')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Restaurant</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($list_table as $key => $value)
            <tr>
                <th scope="row">{{$key+1}}</th>
                <td>{{$value->name}}</td>
                <td>
                    @foreach($list_restaurant as $id_restaurant)
                        {{$value->restaurant_id == $id_restaurant->id ? $id_restaurant->name : ''}}
                    @endforeach
                </td>

                <td>
                    @foreach($status as $key => $name_status)
                        {{$value->status == $key ? $name_status : ''}}
                    @endforeach
                </td>
                <td>
                    <a href="{{route('table.edit',['id'=>$value->id])}}">
                        <input type="button" class="btn btn-primary" value="Edit">
                    </a>
                    <a href="{{route('table.delete',['id'=>$value->id])}}">
                        <input type="button" class="btn btn-danger" value="Delete">
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
