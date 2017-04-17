$(document).ready(function() {
  initserchname();
  addeventChange();
});

function initserchname() {
	var name = $('#searched-words').text();
    $('#serch-input').val(name);
}

function addeventChange() {
	$('#serch-input').focus(changedContent());
}

function changedContent() {
	var name = $('#serch-input').val();
	alert(name);
	$('#searched-words').text(name);
	$('#page-header').text("Search Results for \"" + name + "\"");
}