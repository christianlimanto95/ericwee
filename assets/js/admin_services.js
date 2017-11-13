$(function() {
	$("input").on("change", function() {
		if (!$(this).next().hasClass("btn-update")) {
			$(this).closest("form").append("<button name='update' class='btn btn-update'>Update</button>");
		}
	});

	$(document).on("keydown", "input", function(e) {
		if (e.keyCode == 13) {
			$(this).blur();
			e.preventDefault();
		}
	});
});
