BASE_URL = "/";

function findUsers(){

    var name = $('#search-user').val();
    var hostList = $("#host-list");
    var dropList = $("#drop-list");

    hostList.fadeIn("fast");

    if(name.length == 0){
        dropList.empty();
        return;
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
                    //console.log(process.users[i].user_id);
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
                    '<a href="#">'+
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

BASE_URL = "/";

function droplistUsers(){

    $(document).click(function () {

        $('#host-list').hide();

    });
}


$(document).ready(function () {

    droplistUsers();

    $('#search-user').keyup(function () {
        findUsers();
    });

    var member = $("#drop-list li").first();

    console.log(member);

    $('#drop-list li a').click(function(){
        console.log("carreguei");
    });
});