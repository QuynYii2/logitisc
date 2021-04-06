@extends('layouts.app')

@section('add_table')
<form method="POST" action="{{route('table.save')}}" >
    @csrf
    <div class="list_wrapper">
        <div class="row">
            <div class="col-xs-3 col-sm-3 col-md-3">
                <div class="form-group">
                    Name Table
                    <input type="text" id="quantity" name="list[0][]"  class="form-control">
                </div>
            </div>
            <div class="col-xs-3 col-sm-3 col-md-3">
                <div class="form-group">
                    Restaurant
                    @if($role_id->role_id == 1)
                    <select class="form-control" id="exampleFormControlSelect1" name="list[0][]">
                        @foreach($list_restaurant as $value)
                            <option value="{{$value->id}}">{{$value->name}}</option>
                        @endforeach
                    </select>
                    @else
                        <select class="form-control" id="exampleFormControlSelect1" name="list[0][]" disabled>
                            <option value="{{$role_id->restaurant_id}}">{{$restaurants[0]->name}}</option>
                        </select>
                    @endif
                </div>
            </div>
            <div class="col-xs-3 col-sm-3 col-md-3">
                <div class="form-group">
                    Status
                    <select class="form-control" id="exampleFormControlSelect1" name="list[0][]">
                        <option value="0">Bàn trống</option>
                        <option value="1">Đã đặt</option>
                        <option value="2">Đã có khách</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-3 col-sm-3 col-md-3">
                <br>
                <button class="btn btn-primary list_add_button" type="button" style="width:100%;">+</button>
            </div>
        </div>
    </div>
    <input type="submit" value="Submit" class="btn btn-info btn-block">
</form>
<script type="text/javascript">
    $(document).ready(function () {
        role_id = {!! json_encode($role_id) !!};
        console.log(role_id)
        list_restaurant = {!! json_encode($list_restaurant) !!};
        restaurants = {!! json_encode($restaurants) !!};
        var x = 0; //Initial field counter
        var list_maxField = 10; //Input fields increment limitation
        //Once add button is clicked
        var htmlFoods = '';
        $.each(restaurants, function (index, value) {
            htmlFoods += '<option value="'+ value.id +'">'+ value.name +'</option>'
        });
        $('.list_add_button').click(function () {
            //Check maximum number of input fields
            if (x < list_maxField) {
                x++; //Increment field counter
                var list_fieldHTML = '' +
                    '<div class="row">' +
                    '<div class="col-xs-6 col-sm-6 col-md-6">' +
                    '<div class="form-group">' +
                    '<select class="form-control" id="exampleFormControlSelect' + x + '" name="list[' + x + '][0]">\n' +
                    renderOption() +
                    ' </select>' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-xs-5 col-sm-5 col-md-5">' +
                    '<div class="form-group">' +
                    '<input name="list[' + x + '][1]" type="text" placeholder="Item Quantity" class="form-control"/>' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-xs-1 col-sm-7 col-md-1">' +
                    '<a href="javascript:void(0);" class="list_remove_button btn btn-danger">-</a>' +
                    '</div>' +
                    '</div>';
                $('.list_wrapper').append(list_fieldHTML);
            }
        });
    });
</script>
@endsection
