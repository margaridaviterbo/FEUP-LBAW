$(document).ready(function() {
  initserchname();
  addeventChange();
});

function initserchname() {
	var name = $('#searched-words').text();
    $('#serch-input').val(name);
}

function initserchname() {
	$('#serch-input').change(changedContent());
}

function changedContent() {
	var name = $('#serch-input').val();
	
	$('#searched-words').text(name);
	$('#page-header').text("Search Results for \"" + name + "\"");
}