@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="form-group row">
                <div class="col-sm-3">
                    <select class="form-control restaurant" id="select1" data-live-search="true" name="restaurant" >
                        <option value="0">Chọn nhà hàng</option>
                        @foreach($restaurant as $value)
                            <option value="{{$value->id}}">{{$value->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-3">
                    <select class="form-control" id="select2" data-live-search="true" name="day">
                        <option value="{{date('d')}}">Chọn ngày </option>
                        @for($i=1; $i <= 31; $i++)
                            <option value="{{$i}}">{{$i}}</option>
                        @endfor
                    </select>
                </div>
                <div class="col-sm-3">
                    <select  class="form-control" id="select3" data-live-search="true" name="month">
                        <option value="{{date('m')}}">Chọn tháng </option>
                        @for($i=1; $i <= 12; $i++)
                            @if($i<10)
                                <option value="0{{$i}}">{{$i}}</option>
                            @elseif($i>=10)
                                <option value="{{$i}}">{{$i}}</option>
                            @endif
                        @endfor
                    </select>
                </div>
                <div class="col-sm-3">
                    <select  class="form-control" id="select4" data-live-search="true" name="year">
                        <option value="{{date('Y')}}">Chọn năm </option>
                        @for($i = date("Y")-31; $i <=date("Y")+9; $i++)
                            <option value="{{$i}}">{{$i}}</option>
                        @endfor
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead style="text-align: center;">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Restaurant</th>
                        <th scope="col">Revenue</th>
                    </tr>
                    </thead>
                    <tbody style="text-align: center;">
                    @foreach($revenue as $key => $value)
                        <tr>
                            <th scope="row">{{$key+1}}</th>
                            <td id="name_restaurant">{{$value->name}}</td>
                            <td id="total_amount">{{$value->total}}.000</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            restaurant = {!! json_encode($restaurant) !!};
            revenue = {!!json_encode($revenue)!!}
            $('#select1, #select2, #select3, #select4').bind('change', function() {
                var restaurant = $("#select1").val();
                var day = $("#select2").val();
                var month = $("#select3").val();
                var year = $("#select4").val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'post',
                    url: '/statistical/',
                    data: { 'restaurantId': restaurant,  'day': day, 'month': month, 'year': year},
                    dataType: 'json',
                    success: function(data) {
                        var res='';
                        if (restaurant == 0){
                            $.each(revenue, function (key, value) {
                                res +=
                                    '<tr>'+
                                    '<td>'+key+'</td>'+
                                    '<td>'+value.name+'</td>'+
                                    '<td>'+value.total+'</td>'+
                                    '</tr>';
                            });
                        }
                        $.each (data, function (key, value) {
                            res +=
                                '<tr>'+
                                '<td>'+key+'</td>'+
                                '<td>'+value.name+'</td>'+
                                '<td>'+value.total+'</td>'+
                                '</tr>';
                        });
                        $('tbody').html(res);
                    },
                });
            })
        })

    </script>
@endsection
