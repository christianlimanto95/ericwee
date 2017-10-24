$(function() {
	$(".input-image").on("change", function() {
		
		var previewElement = $(this).next();
		var reader = new FileReader();
		reader.onload = function(e) {
			previewElement.attr("src", e.target.result);
		};
		reader.readAsDataURL($(this)[0].files[0]);

		$(this).closest(".edit-item").find(".btn-save").removeAttr("disabled");
	});
	
	$(".btn-save").on("click", function(e) {
		if (this.hasAttribte("disabled")) {
			e.preventDefault();
		}
	});
});
