//jQuery time
var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches

$("#page1 .next").click(function () {

    var error_message = "";
    var empty = false;

    $('#page1').find('input, textarea').each(function () {
        if ($(this).prop('required') && $(this).val().length == 0) {
            error_message = " Fill the mandatory fields first";
            empty = true;
        }
    });

    if (!empty) {

        var beginning = ($(".beginning_date").val() + " " + $(".beginning_time").val());
        var b_date = new Date(beginning);
        var e_date = null;

        var actual_date = new Date();

        if ($(".ending_date").val().length != 0 || $(".ending_time").val().length != 0) {

            var ending = ($(".ending_date").val() + " " + $(".ending_time").val());
            e_date = new Date(ending);
        }

        //validate name
        if ($(".event_name").val().length > 100) {
            error_message = " Name too big for event";
        }
        else if (b_date < actual_date) {
            error_message = " Invalid date";
        }

        //validate description
        else if ($(".description").val().length > 20000) {
            error_message = " Description too big.";
        }

        else if (e_date != null && e_date <= b_date) {
            error_message = " Ending date must be greater than beginning date";
        }

        else {

            current_fs = $(this).parent();
            next_fs = $(this).parent().next();

            current_fs.hide(500);
            next_fs.show(500);

            error_message = "";
        }
    }

    document.getElementById("error").innerHTML = error_message;

});



$("#page2 .next").click(function () {

    var error_message = "";
    var empty = false;

    $('#page2').find('input').each(function () {
        if ($(this).prop('required') && $(this).val().length == 0) {
            error_message = " Choose a location";
            empty = true;
        }
    });

    if (!empty) {

        current_fs = $(this).parent();
        next_fs = $(this).parent().next();

        current_fs.hide(500);
        next_fs.show(500);

        error_message = "";
    }
    document.getElementById("error2").innerHTML = error_message;

});

$(".previous").click(function () {

    current_fs = $(this).parent();
    previous_fs = $(this).parent().prev();

    current_fs.hide(500);
    previous_fs.show(500);

});