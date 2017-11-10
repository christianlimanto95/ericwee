$(function() {
	
	$(".btn-save").on("click", function(e) {
		if (this.hasAttribte("disabled")) {
			e.preventDefault();
		}
	});
});
