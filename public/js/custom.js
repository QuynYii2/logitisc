$(document).ready(function () {
    var x = 0; //Initial field counter
    var list_maxField = 10; //Input fields increment limitation
    //Once add button is clicked
    $('.list_add_button').click(function () {
        //Check maximum number of input fields
        if (x < list_maxField) {
            x++; //Increment field counter
            var list_fieldHTML = '' +
                '<div class="row">' +
                '<div class="col-xs-6 col-sm-6 col-md-6">' +
                '<div class="form-group">' +
                '<input name="list[' + x + '][]" type="text" placeholder="Item Name" class="form-control"/>' +
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

    //Once remove button is clicked
    $('.list_wrapper').on('click', '.list_remove_button', function () {
        $(this).closest('div.row').remove(); //Remove field html
        x--; //Decrement field counter
    });
});
