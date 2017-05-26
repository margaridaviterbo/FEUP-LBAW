var goodColor = "#66cc66";
var badColor = "#ff6666";
var color = "#fff7e9";
var white = "#ffffff";
BASE_URL = 'http://localhost/lbaw/proto/';
var blockUsernameRegister = false;

$(document).ready(function() {
  addlisteners();
});

function addlisteners(){
	$('#username').change(repetedUsernames);
	$('#email').change(repetedEmails);
}

function validateFirstName() {

    var firstname = $('#first_name');

    var regex = /^[a-zA-Z]{3,20}$/;

    if (!firstname.val().match(regex)) {
        firstname.css('color', badColor);
        return false;
    }
    else {
        firstname.css('color', goodColor);;
        return true;
    }
}

function validateLastName() {

    var lastname = $('#last_name');

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

    var username = $('#username');
	var message = $('#username-erro-label');
	var name = username.val();
	message.css('color', badColor);
	
    var regex = /^[a-zA-Z]([a-zA-Z0-9]){4,24}$/;
	
    if (!name.match(regex)) {
		message.htm
        username.css('color', badColor);
		message.html(" Username Must have betewn 4 and 24 characters");
        return false;
    }
    else {
        username.css('color', goodColor);
		message.html("");
        return true;
    }
}

function repetedUsernames() {
	var username = $('#username').val();
	$.getJSON(BASE_URL + "api/authentication/validateUsername.php", {username: username}, function(data) {
	  $.each(data, function(i, asc) {
		  if(asc){ //se ja estiver em uso poe a mรก cor
			  var message = $('#username-erro-label');
			  var user = $('#username');
			  message.css('color', badColor);
			  user.css('color', badColor);
			  message.html(" Username alredy exists");
			  blockUsernameRegister = true;
		  } else {
			   blockUsernameRegister = false;
			   validateUsername();
		  }
	  });
	});
}

function repetedEmails(){
	var email = $('#email').val();
	$.getJSON(BASE_URL + "api/authentication/validateEmail.php", {email: email}, function(data) {
	  $.each(data, function(i, asc) {
		  console.log(asc);
		  if(asc){ //se ja estiver em uso poe a mesma cor
			  var message = $('#email-erro-label');
			  var mail = $('#email');
			  message.css('color', badColor);
			  mail.css('color', badColor);
			  message.html(" Email alredy exists");
			  blockUsernameRegister = true;
		  } else {
			   blockUsernameRegister = false;
			   validateEmail();
		  }
	  });
	});
}

function validateEmail() {
	repetedUsernames();
    var email = $('#email');
	var message = $('#email-erro-label');
    var regex = /^(\w+@\w+(\.\w+)+){1,254}$/;

    if (!email.val().match(regex)) {
        email.css('color', badColor);
        return false;
    }
    else {
        email.css('color', goodColor);
		message.html("");
        return true;
    }
}

function validateNif() {

    var nif = $('#nif');

    var regex = /^[0-9]{9}$/;

    if (nif.val().length == 0){
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
    var password = $('#password');
    var message = $('#password_message');

    var regex = /^(?=.*[0-9])(?=.*[a-zA-Z])([a-zA-Z0-9!@#$%^&*]+){8,25}$/;

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

    var password = $('#password');
    var confirm = $('#confirm_password');
    var message = $('#confirm_password_message');

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
	repetedUsernames();
    return validateFirstName() && validateLastName() && validateUsername() && validateEmail() && validateNif() && validatePassword() && confirmPassword() && !blockUsernameRegister;
}