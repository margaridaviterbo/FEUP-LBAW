BASE_URL = "/";

var uiia = $(".fdp");

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

    $(document).click( function(){

        $('#search-list').hide();

    });

});

function addToHostList(event){
    var html = $(event.target);
    var userId = html.attr("name");
    var username = html.html();
    //console.log(userId);

    if (typeof userId === "undefined" || userId == 0){
        //nao faz nada
        console.log("oi??");

        return false;
    }
    else{
        console.log("estou so a foder-te a cabeça ahah");

        $(".host-list").append(
            '<li class="list-item">' +
            '<a href="">' +
            '<div class="row">' +
            '<div class="col-sm-offset-1">' +
            '<span class="icon people">' +
            '<span data-icon="&#xe001;" aria-hidden="true"></span>' +
            '</span>' +
            '</div>' +
            '<div class="col-sm-offset-3">' +
            '<span class="text" name="' + userId + '">' + username + '</span>' +
            '</div>' +
            '<div class="col-sm-offset-10">' +
            '</div>' +
            '</div>' +
            '</a>' +
            '</li>');
        return true;
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
        url: BASE_URL+"api/search/searchUsers.php",
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
                        '<span class="text" name="' + process.users[i].user_id + '">' + process.users[i].username + '</span>' +
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



/*
$(document).ready(function () {

    droplistUsers();

    $('#search-user').keyup(function () {
        findUsers();
    });
});

function findUsers(){

    var name = $('#search-user').val();
    var hostList = $("#host-list");
    var dropList = $("#drop-list");

    hostList.fadeIn("fast");

    if (name.length == 0){
        dropList.empty();
    }

    $.ajax({
        type: "POST",
        url: BASE_URL+"api/search/searchUsers.php",
        data:   {
            name : name
        },
        success: function(response){

            var process = JSON.parse(response);

            if(process.success === "success"){
                dropList.empty();
                console.log(process.users);
                for (var i=0; i<process.users.length; i++){
                    dropList.append('<li class="list-item">'+
                        '<a href="">'+
                        '<span class="item">'+
                        '<span class="icon people">'+
                        '<span data-icon="&#xe001;" aria-hidden="true"></span>'+
                        '</span>'+
                        '<span class="text">' + process.users[i].username + '</span>'+
                        '</span>'+
                        '</a>'+
                        '</li>');
                }

            }
            else{
                dropList.empty();
                dropList.append('<li class="list-item">'+
                    '<a href="">'+
                    '<span class="item">'+
                    '<span class="icon people">'+
                    '<span data-icon="&#xe001;" aria-hidden="true"></span>'+
                    '</span>'+
                    '<span class="text">No results</span>'+
                    '</span>'+
                    '</a>'+
                    '</li>');
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
        }
    });

}

function droplistUsers(){

    $(document).click(function () {

        $('#host-list').hide();

    });
}



/*
$(".js-example-basic-multiple").select2({
    ajax: {
        url: BASE_URL + "api/search/searchUsers.php",
        method: "POST",
        dataType: 'json',
        delay: 250,
        data: function (params) {
            return {
                q: params.term,
                page: params.page
            };
        },
        processResults: function (data, params) {

            params.page = params.page || 1;

            var array = data.users;
            var i = 0;
            while (i < array.length) {
                array[i]["id"] = array[i]['user_id'];
                array[i]["text"] = array[i]['username'];
                delete array[i]["user_id"];
                delete array[i]["username"];
                i++;
            }

            console.log(data);
            return {
                results: data.users,
                pagination: {
                    more: (params.page * 30) < data.users.length
                }
            };
        },
        cache: true
    },
    escapeMarkup: function (markup) {
        return markup;
    },
    minimumInputLength: 0,
    templateResult: formatUser,
    templateSelection: formatUserSelection,
});

function formatUser(user) {

    if (user.loading) return user.text;

    var markup = "<option name='user' value='" + user.id + "'>" + user.text + "</option>";

    return markup;
}

function formatUserSelection(user) {
    return user.text;
}*/