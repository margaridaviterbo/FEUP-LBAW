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
			$('#eventosPesq .eventcadssech').html("");
			var name = $('#serch-input').val();
			var ascUser = $('input[name=alfa-order-users]:checked').val();
			var ascEvent = $('input[name=alfa-order-event]:checked').val();
			var byEvent = $('input[name=type-order-event]:checked').val();
			var boolFree = $('input[name=free-order-event]').is(':checked');
			var boolPaid = $('input[name=paid-order-event]').is(':checked');
			doajaxusercall('0', name, ascUser);
			doajaxeventcall('0', name, boolFree, boolPaid, byEvent, ascEvent)
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
		  var street = 'Not Difined';
		  var vfree = 'Free';
		  if(asc.street){
			  street = asc.street;
		  }
		  if(!asc.free){
			  vfree = 'Paid';
		  }
		 $('#eventosPesq .eventcadssech').append(
		    '<div class="container-fluid event-card-medium">' +
              '<p class="titulo-card">' + asc.name + '</p>' +
              '<div class="row">' +
                '<div class="col-sm-3">' +
                  '<img src="' + BASE_URL + 'resources/images/' + asc.photo_url + '"/>' +
                '</div>' +
                '<div class="col-sm-9">' +
                  '<p class="text-card">' + asc.beginning_date + '</p>' +
                  '<p class="text-card">' + street + '</p>' +
                  '<p class="text-card">' + vfree + '</p>' +
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