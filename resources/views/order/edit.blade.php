@extends('layouts.app')

@section('edit_order')
    @php
        $selected = [];
        foreach ($orderDetail as $value) {
            $selected[] = $value->food_id;
        }
    @endphp
    <form method="POST" action="{{route('order.update')}}">
        @csrf
        <div class="list_wrapper">
            <div class="row">
                <div class="col-xs-8 col-sm-8 col-md-8">
                    <div class="form-group">
                        Table
                        <input name="id" value="{{$order->id}}" hidden>
                        <select class="form-control" id="exampleFormControlSelect1" name="number_table" disabled>
                            @foreach($table as $values)
                                <option
                                    value="{{$values->id}}" {{$values->id == $order->table_id ? 'selected' : ''}}>{{$values->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3">
                    <div class="form-group">
                        Status
                        <select class="form-control" id="exampleFormControlSelect1" name="status">
                            <option value="1">Đã lên đơn </option>
                            <option value="2">Đã thanh toán </option>
                        </select>
                    </div>
                </div>
                <div class="col-xs-1 col-sm-1 col-md-1">
                    <br>
                    <button class="btn btn-primary list_add_button" type="button">+</button>
                </div>
            </div>
            @foreach($orderDetail as $valueOrderdetail)
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            Item Name
                            <select class="form-control" name="list[0][]" disabled>
                                @foreach($food[0]->foods as $value)
                                    <option
                                        value="{{$value->id}}" {{$value->id == $valueOrderdetail->food_id ? 'selected' : ''}}>{{$value->name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            Quantity
                            @if($roleId == 3 )
                                <input type="number" id="quantity" name="orderDetail[{{ $valueOrderdetail->food_id }}]" min="1" class="form-control"
                                       value="{{$valueOrderdetail->total_amount}}" disabled>
                            @else
                                <input type="number" id="quantity" name="orderDetail[{{ $valueOrderdetail->food_id }}]" min="1" class="form-control"
                                       value="{{$valueOrderdetail->total_amount}}">
                            @endif
                        </div>
                    </div>

                </div>
            @endforeach
        </div>
        <input type="submit" value="Submit" class="btn btn-info btn-block">
    </form>
    <script type="text/javascript">
    $(document).ready(function () {
        foods = {!! json_encode($foods) !!};
        selected = {!! json_encode($selected) !!};
        var x = 0;
        var list_maxField = 10;
        function renderOption() {
            var htmlFoods = '';
            var checkAllowAdd = false;
            $.each(foods, function (index, value) {
                if (selected.indexOf(value.id) > -1){
                    htmlFoods += '<option value="'+ value.id +'" disabled>'+ value.name +'</option>'
                }else {
                    htmlFoods += '<option value="'+ value.id +'">'+ value.name +'</option>'
                    checkAllowAdd = true
                }
            });
            if (checkAllowAdd){
                return htmlFoods
            }
            return '';
        }
        $('.list_add_button').click(function () {
            var html = renderOption();
            if (html) {
                if (x < list_maxField) {
                    x++;
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

                    selected.push(parseInt($('.list_wrapper #exampleFormControlSelect' + x + ' option:selected').val()));
                }
            }

        });

        //Once remove button is clicked
        $('.list_wrapper').on('click', '.list_remove_button', function () {
            $(this).closest('div.row').remove();
            x--;
        });
    });
    </script>
@endsection

