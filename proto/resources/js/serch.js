$(document).ready(function() {
  initserchname();
  addeventChange();
});

function initserchname() {
	var name = $('#searched-words').text();
    $('#serch-input').val(name);
}

function addeventChange() {
	$('#serch-input').on('input', function() {
		var name = $('#serch-input').val();
		$('#searched-words').text(name);
		$('.page-header h1').text("Search Results for \"" + name + "\"");
	});
}

