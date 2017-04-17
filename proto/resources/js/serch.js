$(document).ready(function() {
  initserchname();
  	$('#serch-input').click(function() {
    alert('Close');
  });
});

function initserchname() {
	var name = $('#searched-words').val();
    $('#serch-input').val(name);
	$('#serch-input').click(function() {
    alert('Close');
  });
}