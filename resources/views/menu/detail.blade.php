
@extends('layouts.app')

@section('list_order')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Total_mount</th>
            <th scope="col">Status</th>
            <th scope="col">Process_by</th>
            <th scope="col">Table</th>
        </tr>
        </thead>
        <tbody>
        @foreach($detail as $key => $value)
{{--            @dd($value);--}}
            <tr>
                <th scope="row">{{$key+1}}</th>
                <td>{{$value->total_amount}}</td>
                <td>{{$value->total_amount}}</td>
                <td>{{$value->table}}</td>
                <td>
                    @foreach($table as $key => $id_table)
                        {{$value->table_id == $id_table->id ? $id_table->name : ''}}
                    @endforeach
                </td>
                <td>
                    <a href="{{route('order.detail',['id'=>$value->id])}}">
                        <input type="button" class="btn btn-primary" value="Detail">
                    </a>
                    <a href="{{route('order.edit',['id'=>$value->id])}}">
                        <input type="button" class="btn btn-primary" value="Edit">
                    </a>
                    <a href="{{route('order.delete',['id'=>$value->id])}}">
                        <input type="button" class="btn btn-danger" value="Delete">
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
