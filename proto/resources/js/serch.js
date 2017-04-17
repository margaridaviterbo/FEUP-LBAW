$(document).ready(function() {
  initserchname();
});

function initserchname() {
	var name = $('#searched-words').text();
	alert(name);
    $('#serch-input').val(name);
	$('#serch-input').click(function() {
    alert('Close');
  });
}