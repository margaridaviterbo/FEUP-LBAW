$(document).ready(function() {
  initserchname();
});

function initserchname() {
	var name = $('#searched-words').val();
    $('#serch-input').val(name);
	$('.serch-input').click(function() {
    alert('Close');
  });
}