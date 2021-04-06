@extends('layouts.app')

@section('add_menu')
    <form method="POST" action="{{route('menu.save')}}">
        @csrf
        <div class="list_wrapper">
            <div class="row">
                <div class="col-xs-10 col-sm-10 col-md-10">
                    <div class="form-group">

                        <select class="form-control" id="exampleFormControlSelect1" name="list[0]">
                            @foreach($food[0]->foods as $value)
                                <option value="{{$value->id}}">{{$value->name}}</option>
                            @endforeach
                        </select>
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
                            '<div class="col-xs-11 col-sm-11 col-md-11">' +
                                '<div class="form-group">' +
                                    '<select class="form-control" id="exampleFormControlSelect1" name="list[' + x + ']>\n' +
                                         htmlFoods +
                                    ' </select>' +
                                '</div>' +
                            '</div>' +
                        '</div>'; //New input field html
                    $('.list_wrapper').append(list_fieldHTML); //Add field html
                }
            });

            //Once remove button is clicked
            $('.list_wrapper').on('click', '.list_remove_button', function () {
                $(this).closest('div.row').remove(); //Remove field html
                x--; //Decrement field counter
            });
        });
    </script>
@endsection
