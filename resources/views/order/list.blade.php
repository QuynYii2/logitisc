
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
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($list as $key => $value)
            <tr>
                <th scope="row">{{$key+1}}</th>
                <td>{{$value->total_amount}}</td>
                <td>
                    @foreach($status as $key => $values)
                        {{$value->status == $values ? $key : ''}}
                    @endforeach
                </td>
                <td>
                    @foreach($list_user as $key => $id_user)
                        {{$value->process_by == $id_user->id ? $id_user->name : ''}}
                    @endforeach
                </td>
                <td>
                    @foreach($table as $key => $id_table)
                        {{$value->table_id == $id_table->id ? $id_table->name : ''}}
                    @endforeach
                </td>
                <td>
                    @if($value->status == 2)
                        <a href="{{route('order.edit',['id'=>$value->id])}}">
                            <input type="button" class="btn btn-primary" value="Detail" style="width:80%;" >
                        </a>
                    @endif
                    @if($value->status == 1)
                        <a href="{{route('order.edit',['id'=>$value->id])}}">
                            <input type="button" class="btn btn-primary" value="Edit"style="width:40%;">
                        </a>
                        <a href="{{route('order.delete',['id'=>$value->id])}}">
                            <input type="button" class="btn btn-danger" value="Delete"style="width:40%;">
                        </a>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
