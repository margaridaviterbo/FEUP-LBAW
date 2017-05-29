BASE_URL = 'http://localhost/lbaw/proto/';

var usersAdded = [];
var guestsAdded = [];

var searchHost;

$(document).ready(function(){

    $('#search-user').keyup(function () {
        searchHost = true;
        findUsers();
    });

    $('#search-guest').keyup(function () {
        searchHost = false;
        findUsers();
    });

    $(".drop-guest-list").click(function(event) {
        addToGuestList(event);
        return false;
    });

    $(".drop-list").click(function(event) {
        addToHostList(event);
        return false;
    });

    $(".host-list").click(function(event) {
        removeFromHostList(event);
        return false;
    });

    $('#search-user').click( function(event){
        event.stopPropagation();
        $("#search-list").fadeIn("fast");
    });

    $('#search-guest').click( function(event){
        event.stopPropagation();
        $("#search-list-guest").fadeIn("fast");
    });

    $(document).click( function(){

        $('#search-list').hide();
        $('#search-list-guest').hide();

    });

});

function removeFromHostList(event){
    var html = $(event.target);
    var userId = html.attr("value");
    //TODO: remover utilizadores
    //console.log(html.html());
}

function addToHostList(event){
    var html = $(event.target);
    var userId = html.attr("value");
    var username = html.html();

    if (typeof userId === "undefined" || userId == 0){
        //nao faz nada
        return false;
    }
    else{

        for(var i=0; i<usersAdded.length; i++){
            if (usersAdded[i] == userId)
                return false;
        }

        usersAdded.push(userId);

        $(".host-list").append(
            '<li class="list-item">' +
            '<a href="">' +
            '<div class="row">' +
            '<div class="col-sm-offset-1">' +
            '<span class="icon people">' +
            '<span data-icon="&#xe001;" aria-hidden="true"></span>' +
            '</span>' +
            '</div>' +
            '<div class="col-sm-offset-2">' +
            '<input type="text" name="user_id[]" value="' + userId + '" hidden></input>' +
            '<span class="text">' + username + '</span>' +
            '</div>' +
            '</div>' +
            '</a>' +
            '</li>');
        return true;
    }
}


function addToGuestList(event){
    var html = $(event.target);
    var userId = html.attr("value");
    var username = html.html();

    if (typeof userId === "undefined" || userId == 0){
        //nao faz nada
        return false;
    }
    else{

        for(var i=0; i<guestsAdded.length; i++){
            if (guestsAdded[i] == userId)
                return false;
        }

        guestsAdded.push(userId);

        $(".guest-list").append(
            '<li class="list-item">' +
            '<a href="">' +
            '<div class="row">' +
            '<div class="col-sm-offset-1">' +
            '<span class="icon people">' +
            '<span data-icon="&#xe001;" aria-hidden="true"></span>' +
            '</span>' +
            '</div>' +
            '<div class="col-sm-offset-2">' +
            '<input type="text" name="guest_id[]" value="' + userId + '" hidden></input>' +
            '<span class="text">' + username + '</span>' +
            '</div>' +
            '</div>' +
            '</a>' +
            '</li>');
        return true;
    }
}

function findUsers(){
    var name;
    var list;
    var dropList;

    if (searchHost) {
        name = $('#search-user').val();
        list = $('#search-list');
        dropList = $(".drop-list");
    }
    else {
        name = $('#search-guest').val();
        list = $('#search-guest-list');
        dropList = $(".drop-guest-list");
    }

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