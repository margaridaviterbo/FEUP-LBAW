BASE_URL = "/";

function findUsers(){

    var name = $('#search-user').val();
    var hostList = $("#host-list");
    console.log(name);

    hostList.fadeIn("fast");

    $.ajax({
        type: "POST",
        url: BASE_URL+"api/search/searchUsers.php",
        data:   {
            name : name
        },
        success: function(response){

            var process = JSON.parse(response);

            if(process.success === "success"){
                hostList.empty();
                console.log(process.users.length);
                for (var i=0; i<process.users.length; i++){
                    hostList.append('<li class="list-item">'+
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
                hostList.empty();
                hostList.append('<li class="list-item">'+
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
});