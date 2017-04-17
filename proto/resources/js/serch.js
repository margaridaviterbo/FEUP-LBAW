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
	console.log("asc");
    $.getJSON(BASE_URL + "actions/user/serchusers.php", {page: '0', serch: name, asc: 'ASC'}, function(data) {
		console.log(data);
      $.each(data, function(i, asc) {
		  console.log(asc);
      });
    });
}