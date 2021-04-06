@extends('layouts.app')

@section('add_order')
    <form method="POST" action="{{route('order.save')}}">
        @csrf
        <div class="list_wrapper">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        Table
                        <select class="form-control" id="exampleFormControlSelect1" name="number_table">
                            @foreach($table as $value)
                                <option value="{{$value->id}}">{{$value->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        Item Name
                        <select class="form-control" id="exampleFormControlSelect1" name="list[0][]">
                            @foreach($food[0]->foods as $value)
                                <option value="{{$value->id}}">{{$value->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-xs-5 col-sm-5 col-md-5">
                    <div class="form-group">
                        Quantity
                        <input type="number" id="quantity" name="list[0][]" min="1" class="form-control">
                    </div>
                </div>
                <div class="col-xs-1 col-sm-1 col-md-1">
                    <br>
                    <button class="btn btn-primary list_add_button" type="button">+</button>
                </div>
            </div>
        </div>
        <input type="submit" value="Submit" class="btn btn-info btn-block">
    </form>
    <script type="text/javascript">
        $(document).ready(function () {
            foods = {!! json_encode($foods) !!};
            var x = 0; //Initial field counter
            var list_maxField = 10; //Input fields increment limitation
            //Once add button is clicked
            var htmlFoods = '';
            $.each(foods, function (index, value) {
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
                        '<select class="form-control" id="exampleFormControlSelect1" name="list[' + x + '][]>\n' +
                        htmlFoods +
                        ' </select>' +
                        '</div>' +
                        '</div>' +
                        '<div class="col-xs-5 col-sm-5 col-md-5">' +
                        '<div class="form-group">' +
                        '<input name="list[' + x + '][]" type="text" placeholder="Item Quantity" class="form-control"/>' +
                        '</div>' +
                        '</div>' +
                        '<div class="col-xs-1 col-sm-7 col-md-1">' +
                        '<a href="javascript:void(0);" class="list_remove_button btn btn-danger">-</a>' +
                        '</div>' +
                        '</div>'; //New input field html
                    $('.list_wrapper').append(list_fieldHTML); //Add field html
                }
            });
        });
    </script>
@endsection
