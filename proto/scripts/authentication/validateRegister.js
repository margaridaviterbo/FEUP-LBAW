var goodColor = "#66cc66";
var badColor = "#ff6666";
var color = "#fff7e9";
var white = "#ffffff";

function validateFirstName() {

    var firstname = document.getElementById('first_name');

    var regex = /^[a-zA-Z]{3,20}$/;

    if (!firstname.value.match(regex)) {
        firstname.style.color = badColor;
        return false;
    }
    else {
        firstname.style.color = goodColor;
        return true;
    }
}

function validateLastName() {

    var lastname = document.getElementById('last_name');

    var regex = /^[a-zA-Z]{2,20}$/;

    if (!lastname.value.match(regex)) {
        lastname.style.color = badColor;
        return false;
    }
    else {
        lastname.style.color = goodColor;
        return true;
    }
}

function validateUsername() {

    var username = document.getElementById('username');

    var regex = /^[a-zA-Z]([a-zA-Z0-9]){7,24}$/;

    if (!username.value.match(regex)) {
        username.style.color = badColor;
        return false;
    }
    else {
        username.style.color = goodColor;
        return true;
    }
}

function validateEmail() {

    var email = document.getElementById('email');

    var regex = /^(\w+@\w+\.\w+){1,254}$/;

    if (!email.value.match(regex)) {
        email.style.color = badColor;
        return false;
    }
    else {
        email.style.color = goodColor;
        return true;
    }
}

function validateNif() {

    var nif = document.getElementById('nif');

    var regex = /^[0-9]{9}$/;

    if (!nif.value.match(regex)) {
        nif.style.color = badColor;
        return false;
    }
    else {
        nif.style.color = goodColor;
        return true;
    }
}

function validatePassword() {

    var password = document.getElementById('password');
    var message = document.getElementById('password_message');

    var regex = /^(?=.*[0-9])(?=.*[a-zA-Z])([a-zA-Z0-9!@#$%^&*]+){8,25}$/;

    if (!password.value.match(regex)) {
        password.style.color = badColor;
        message.style.color = badColor;
        message.innerHTML = " Password must contain a number and a char at least";
        return false;
    }
    else {
        password.style.color = goodColor;
        message.innerHTML = "";
        return true;
    }
}

function confirmPassword() {

    var password = document.getElementById('password');
    var confirm = document.getElementById('confirm_password');
    var message = document.getElementById('confirm_password_message');

    if (confirm.value != password.value) {
        confirm.style.color = badColor;
        message.style.color = badColor;
        message.innerHTML = " Passwords must match";
        return false;
    }
    else {
        confirm.style.color = goodColor;
        message.innerHTML = "";
        return true;
    }
}

function validateAll() {
    return validateFirstName() && validateLastName() && validateUsername() && validateEmail() && validateNif() && validatePassword() && confirmPassword();
}