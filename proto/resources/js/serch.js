$(document).ready(function() {
  initserchname();
  addeventChange();
  addorderlisteners();
  setInterval(testCanUpdate, 50);
});
BASE_URL = 'http://gnomo.fe.up.pt/~lbaw1622/rui/FEUP-LBAW/proto/';

var canUpdateuser = true;
var canUpdateEvent = true;
var askedToUpdate = false;

function initserchname() {
	var name = $('#searched-words').text();
    $('#serch-input').val(name);
}

function addeventChange() {
	$('#serch-input').on('input', function() {
		var name = $('#serch-input').val();
		$('#searched-words').text(name);
		$('.page-header h1').text("Search Results for \"" + name + "\"");
		askedToUpdate = true;
		testCanUpdate();
	});
}

function addorderlisteners() {
	$('.tabOptions input').on('change', function() {
		askedToUpdate = true;
		testCanUpdate();
	});
}

function testCanUpdate() {
	if(askedToUpdate){
		if(canUpdateuser && canUpdateEvent){
			$('#usersPesq .usercadssech').html("");
			var name = $('#serch-input').val();
			var ascUser = $('input[name=alfa-order-users]:checked').val();
			var ascEvent = $('input[name=alfa-order-event]:checked').val();
			var byEvent = $('input[name=type-order-event]:checked').val();
			doajaxusercall('0', name, ascUser);
			doajaxeventcall('0', name, true, true, true, 'ASC')
			askedToUpdate = false;
		}
	}
}

function doajaxusercall(page, name, asc) {
	  var ind = 0;
	  canUpdateuser = false;
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
		canUpdateuser = true;
    });
}

function doajaxeventcall(page, name, free, paid, nameOrPrice, asc) {
	  var ind = 0;
	  canUpdateEvent = false;
	  $.getJSON(BASE_URL + "actions/user/serchevents.php", {page: page, serch: name, free: free, paid: paid, nameOrPrice: nameOrPrice, asc: asc}, function(data) {
      $.each(data, function(i, asc) {
		  ind += 1;
		 $('#eventosPesq .eventcadssech').append(
		    '<div class="container-fluid event-card-medium">' +
              '<p class="titulo-card">Sessão de Demonstração para o Desenvolvimento em Comunicação</p>' +
              '<div class="row">' +
                '<div class="col-sm-3">' +
                  '<img src="../resources/images/1.jpg" />' +
                '</div>' +
                '<div class="col-sm-9">' +
                  '<p class="text-card"> Quinta, 9 de Março às 19:45</p>' +
                  '<p class="text-card">ISG</p>' +
                  '<p class="text-card">Gratuito</p>' +
                  '<div class="container-fluid">' + 
                    '<div class="row">' +
                      '<button type="button" class="btn btn-default col-sm-5">See More...</button>' +
                      '<div class="classifica-card col-sm-7">' +
                        '<i class="fa fa-star fa-2x" aria-hidden="true"></i>' +
                        '<i class="fa fa-star fa-2x" aria-hidden="true"></i>' +
                        '<i class="fa fa-star fa-2x" aria-hidden="true"></i>' +
                        '<i class="fa fa-star-o fa-2x" aria-hidden="true"></i>' +
                        '<i class="fa fa-star-o fa-2x" aria-hidden="true"></i>' +
                      '</div>' +
                    '</div>' +
                  '</div>' +
                '</div>' +
              '</div>' +
            '</div>');
      });
		$('#tabs .button-events').html('Events (' + ind + ')');
		canUpdateEvent = true;
    });
}