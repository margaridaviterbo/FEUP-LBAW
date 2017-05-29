BASE_URL = "/";

var usersAdded = [];

$(document).ready(function(){

    $('#search-user').keyup(function () {
        findUsers();
    });

    $(".drop-list").click(function(event) {
        addToHostList(event);
        return false;
    });

    $('#search-user').click( function(event){
        event.stopPropagation();
        $("#search-list").fadeIn("fast");
    });

    $(".remove").click(function(event){
        var html = $(event.target);
        var commentId = html.attr("value");
        removeComment(commentId);
    });

    $(document).click( function(){

        $('#search-list').hide();
    });

});

function removeComment(commentId){
    $.ajax({
        type: "POST",
        url: BASE_URL+"api/event/deleteComment.php",
        data:   {
            comment : commentId
        },
        success: function(){
            window.location.reload();
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
        }
    });
}

function addToHostList(event){
    var html = $(event.target);
    var userId = html.attr("value");
    var username = html.html();
    var eventId = $("#event_id").val();

    if (typeof userId === "undefined" || userId == 0){
        //nao faz nada
        return false;
    }
    else{

        $.ajax({
            type: "POST",
            url: BASE_URL+"api/event/addHosts.php",
            data:   {
                user : userId,
                event: eventId
            },
            success: function(response){

                var process = JSON.parse(response);

                if(process.success === "success"){

                    $("#hosts").append(
                        '<content class="col-xs-1 col-xs-offset-1">'+
                        '<div class="user-photo">'+
                        '<button><img src="'+BASE_URL+'resources/images/user.jpeg">'+username+'</button>'+
                        '</div>'+
                        '</content>');
                }
                else{
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        });
    }
}

function findUsers(){
    var name = $('#search-user').val();
    var list = $('#search-list');
    var dropList = $(".drop-list");

    list.fadeIn();

    if (name.length == 0){
        dropList.empty(); //nao apaga xD
    }

    $.ajax({
        type: "POST",
        url: BASE_URL+"api/search/searchHosts.php",
        data:   {
            name : name
        },
        success: function(response){

            var process = JSON.parse(response);

            if(process.success === "success"){
                dropList.empty();
                for (var i=0; i<process.users.length; i++){
                    dropList.append(
                        '<li class="list-item">' +
                        '<a href="">' +
                        '<div class="row">' +
                        '<div class="col-sm-offset-1">' +
                        '<span class="icon people">' +
                        '<span data-icon="&#xe001;" aria-hidden="true"></span>' +
                        '</span>' +
                        '</div>' +
                        '<div class="col-sm-offset-3">' +
                        '<span class="text" value="' + process.users[i].user_id + '">' + process.users[i].username + '</span>' +
                        '</div>' +
                        '<div class="col-sm-offset-10">' +
                        '</div>' +
                        '</div>' +
                        '</a>' +
                        '</li>');
                }
            }
            else{
                dropList.empty();
                dropList.append(
                    '<li class="list-item">' +
                    '<a href="">' +
                    '<div class="row">' +
                    '<div class="col-sm-offset-1">' +
                    '<span class="icon people">' +
                    '<span data-icon="&#xe001;" aria-hidden="true"></span>' +
                    '</span>' +
                    '</div>' +
                    '<div class="col-sm-offset-3">' +
                    '<span class="text" value="0">No results</span>' +
                    '</div>' +
                    '<div class="col-sm-offset-10">' +
                    '</div>' +
                    '</div>' +
                    '</a>' +
                    '</li>');
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
        }
    });
}