$(document).ready(function() {
  initserchname();
});

function initserchname() {
	var name = $('#searched-words').text();
    $('#serch-input').val(name);
}