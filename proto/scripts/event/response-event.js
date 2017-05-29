$(".going-select").change(function () {
	var going =$(".going-select").val();
	var user_id = $("#au_user_id").text();
	var event_id = $("#this_event_id").text();
	$.getJSON(BASE_URL + "api/event/response.php", {event_id: event_id, response: going}, function(data) {
		 console.log('mofificado');
    });
});