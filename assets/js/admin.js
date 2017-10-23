$(function() {
	$(".input-image").on("change", function() {
		var previewElement = $(this).next();
		var reader = new FileReader();
		reader.onload = function(e) {
			previewElement.attr("src", e.target.result);
		};
		reader.readAsDataURL($(this)[0].files[0]);
    });
});
