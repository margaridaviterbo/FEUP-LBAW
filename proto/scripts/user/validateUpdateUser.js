var goodColor = "#66cc66";
var badColor = "#ff6666";
var color = "#fff7e9";
var white = "#ffffff";
BASE_URL = '/';

function validateFirstName() {

    var firstname = $('.first_name');
    console.log(firstname);

    console.log("oi");

    var regex = /^[a-zA-Z]{3,20}$/;

    if (!firstname.val().match(regex)) {
        console.log("nao");
        firstname.css('color', badColor);
        return false;
    }
    else {
        console.log("sim");
        firstname.css('color', goodColor);
        return true;
    }
}

function validateLastName() {

    var lastname = $('.last_name');

    var regex = /^[a-zA-Z]{2,20}$/;

    if (!lastname.val().match(regex)) {
        lastname.css('color', badColor);
        return false;
    }
    else {
        lastname.css('color', goodColor);
        return true;
    }
}

function validateUsername() {

    var username = $('.username');
    var message = $('.username-erro-label');
    var name = username.val();
    message.css('color', badColor);

    var regex = /^[a-zA-Z]([a-zA-Z0-9]){4,24}$/;

    if (!name.match(regex)) {
        username.css('color', badColor);
        message.html(" Username Must have between 4 and 24 characters");
        return false;
    }
    else {

        $.ajax({
            type: "POST",
            url: BASE_URL+"api/authentication/validateUsernameUpdate.php",
            data:   {
                name : name
            },
            success: function(response){

                console.log(response);

                var process = JSON.parse(response);

                if(process.exists === false){
                    username.css('color', goodColor);
                    message.html("");
                    return true;
                }
                else{
                    username.css('color', badColor);
                    message.html(" Username already exists");
                    return false;
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        });
    }
}

function validateEmail() {
    var email = $('.email');
    var message = $('.email-erro-label');
    var regex = /^(\w+@\w+(\.\w+)+){1,254}$/;

    if (!email.val().match(regex)) {
        email.css('color', badColor);
        return false;
    }
    else {
        $.ajax({
            type: "POST",
            url: BASE_URL+"api/authentication/validateEmailUpdate.php",
            data:   {
                name : email.val()
            },
            success: function(response){

                console.log(response);

                var process = JSON.parse(response);

                if(process.exists === false){
                    email.css('color', goodColor);
                    message.html("");
                    return true;
                }
                else{
                    email.css('color', badColor);
                    message.css('color', badColor);
                    message.html(" Email already exists");
                    return false;
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        });
    }
}

function validateNif() {

    var nif = $('.nif');

    var regex = /^[0-9]{9}$/;

    if (nif.val().length == 0) {
        return true;
    }
    else if (!nif.val().match(regex)) {
        nif.css('color', badColor);
        return false;
    }
    else {
        nif.css('color', goodColor);
        return true;
    }
}

function validatePassword() {
    var password = $('.password');
    var message = $('.password_message');

    if (password.length == 0)
        return true;

    var regex = /^(?=.*[0-9])(?=.*[a-zA-Z])([a-zA-Z0-9!@.$%^&*]+){8,25}$/;

    if (!password.val().match(regex)) {

        password.css('color', badColor);
        message.css('color', badColor);
        message.html(" Password must contain a number and a char at least");
        return false;
    }
    else {
        password.css('color', goodColor);
        message.html("");
        return true;
    }
}

function confirmPassword() {

    var password = $('.password');
    var confirm = $('.confirm_password');
    var message = $('.confirm_password_message');

    if (confirm.val() != password.val()) {
        confirm.css('color', badColor);
        message.css('color', badColor);
        message.html(" Passwords must match");
        return false;
    }
    else {
        confirm.css('color', goodColor);
        message.html("");
        return true;
    }
}

function validateAll() {
    //repetedUsernames();
    return validateFirstName() && validateLastName() && validateUsername() && validateEmail() && validateNif() && validatePassword() && confirmPassword() && !blockUsernameRegister;
}