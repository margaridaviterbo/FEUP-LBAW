var goodColor = "#66cc66";
var badColor = "#ff6666";
var color = "#fff7e9";
var white = "#ffffff";

function validatePassword(){

    $("#teste").validationEngine();
    var password = document.getElementById('password');
    var message = document.getElementById('confirmMessage');

    var regex = /^(?=.*[0-9])[a-zA-Z0-9!@#$%^&*]{8,25}$/;

    if (!password.matches(regex)){
        password.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = "Password size must be between 8 and 25";
        return false;
    }
    else {
        password.style.backgroundColor = goodColor;
        message.innerHTML = "";
        return true;
    }
}

function validateFirstName(){

    $("#teste").validationEngine();
    var firstname = document.getElementById('first_name');
    var message = document.getElementById('confirmMessage1');

    var regex = /^[a-zA-Z]{2,20}$/;

    if (!password.matches(regex)){
        password.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = "Name size must be between 2 and 20";
        return false;
    }
    else {
        password.style.backgroundColor = goodColor;
        message.innerHTML = "";
        return true;
    }
}