$(document).ready(function() {
  initserchname();
  addeventChange();
});
BASE_URL = 'http://gnomo.fe.up.pt/~lbaw1622/rui/FEUP-LBAW/proto/';

function initserchname() {
	var name = $('#searched-words').text();
    $('#serch-input').val(name);
}

function addeventChange() {
	$('#serch-input').on('input', function() {
		var name = $('#serch-input').val();
		$('#searched-words').text(name);
		$('.page-header h1').text("Search Results for \"" + name + "\"");
		initUsersReloader();
	});
}

function initUsersReloader() {
	var name = $('#serch-input').val();
	var ind = 0;
	console.log(BASE_URL + "actions/user/serchusers.php");
	$('#usersPesq .usercadssech').html("");
    $.getJSON(BASE_URL + "actions/user/serchusers.php", {page: '0', serch: name, asc: 'ASC'}, function(data) {
      $.each(data, function(i, asc) {
		  ind = ind+1;
		 $('#usersPesq .usercadssech').append(
		 '<div class="container-fluid user-card-medium">' +
              '<p class="titulo-card">' + asc.username + '</p>' +
              '<div class="row">' +
               '<div class="col-sm-3">' +
                  '<img src="' + BASE_URL + 'resources/images/' + asc.photo_url + '"/>' +
                '</div>' +
                '<div class="col-sm-9">' +
                  '<p class="text-card">' + asc.first_name + ' ' + asc.last_name + '</p>' +
                  '<p class="text-card">' + asc.email + '</p>' +
                  '<button type="button" class="btn btn-default col-sm-5">Go To ptofile</button>' +
                '</div>' +
              '</div>' +
            '</div>');
      });
    });
	console.log(ind);
	$('#tabs:nth-child(2) a').html('Users (' + ind + ')');
}