//jQuery time
var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches

$(".next").click(function(){

    var error_message="";
    var empty = false, proceed = true;

    $('#page1').find('input, textarea').each(function(){
        if($(this).prop('required') && $(this).val().length == 0){
            error_message = " Fill the mandatory fields first";
            empty = true;
        }
    });

    if (!empty) {

        var beginning = ($(".beginning_date").val() + " " + $(".beginning_time").val());
        var b_date = new Date(beginning);
        var e_date = null;

        var actual_date = new Date();

        if($(".ending_date").val().length != 0 && $(".ending_time").val().length != 0) {

            var ed_split = $(".ending_date").val().split('-');
            var ending = (ed_split[2] + "-" +ed_split[1] + "-" + ed_split[0]  + " " + $(".ending_time").val());
            e_date = new Date(ending);
        }

        //validate name
        if ($(".event_name").val().length > 100){
            error_message = " Name too big for event";
        }
        else if(b_date < actual_date){
            error_message = " Invalid date";
        }

        //validate description
        else if ($(".description").val().length > 20000){
            error_message = " Description too big.";
        }

        else if (e_date <= b_date) {
            error_message = " Ending date must be greater than beginning date";
        }

        else {

            current_fs = $(this).parent();
            next_fs = $(this).parent().next();

            next_fs.show();
            current_fs.hide();

            error_message="";
        }

    }

    document.getElementById("error").innerHTML = error_message;

});


function changePage(){


    /*if(animating) return false;
     animating = true;*/

    /*current_fs = $(this).parent();
     next_fs = $(this).parent().next();

     //show the next fieldset
     next_fs.show();
     current_fs.hide();*/
    //hide the current fieldset with style
    /*current_fs.animate({opacity: 0}, {
     step: function(now, mx) {
     //as the opacity of current_fs reduces to 0 - stored in "now"
     //1. scale current_fs down to 80%
     scale = 1 - (1 - now) * 0.2;
     //2. bring next_fs from the right(50%)
     left = (now * 50)+"%";
     //3. increase opacity of next_fs to 1 as it moves in
     opacity = 1 - now;
     current_fs.css({
     'transform': 'scale('+scale+')',
     'position': 'absolute'
     });
     next_fs.css({'left': left, 'opacity': opacity});
     },
     duration: 800,
     complete: function(){
     current_fs.hide();
     animating = false;
     },
     //this comes from the custom easing plugin
     // easing: 'easeInOutBack'
     });*/
}

$(".previous").click(function(){
    /*if(animating) return false;
    animating = true;*/

    current_fs = $(this).parent();
    previous_fs = $(this).parent().prev();

    //show the previous fieldset
    previous_fs.show();
    current_fs.hide();
    //hide the current fieldset with style
    /*current_fs.animate({opacity: 0}, {
        step: function(now, mx) {
            //as the opacity of current_fs reduces to 0 - stored in "now"
            //1. scale previous_fs from 80% to 100%
            scale = 0.8 + (1 - now) * 0.2;
            //2. take current_fs to the right(50%) - from 0%
            left = ((1-now) * 50)+"%";
            //3. increase opacity of previous_fs to 1 as it moves in
            opacity = 1 - now;
            current_fs.css({'left': left});
            previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
        },
        duration: 800,
        complete: function(){
            current_fs.hide();
            animating = false;
        },
        //this comes from the custom easing plugin
        easing: 'easeInOutBack'
    });*/
});