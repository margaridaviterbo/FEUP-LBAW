$(document).ready(function() {
  initserchname();
  addeventChange();
  addorderlisteners();
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
	$('#usersPesq .usercadssech').html("");
	doajaxusercall('0', name, 'ASC');
}

function addorderlisteners() {
	$('.tabOptions input').on('change', function() {
		var name = $('#serch-input').val();
		$('#usersPesq .usercadssech').html("");
	    var asc = $('input[name=alfa-order-users]:checked').val();
		doajaxusercall('0', name, asc);
	});
}

function doajaxusercall(page, name, asc) {
	  var ind = 0;
	  $.getJSON(BASE_URL + "actions/user/serchusers.php", {page: page, serch: name, asc: asc}, function(data) {
      $.each(data, function(i, asc) {
		  ind += 1;
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
		$('#tabs .button-users').html('Users (' + ind + ')');
    });
}