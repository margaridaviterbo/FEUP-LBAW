BASE_URL = "/";

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
}