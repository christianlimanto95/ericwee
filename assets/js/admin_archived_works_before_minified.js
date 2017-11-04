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

	$(".form-delete").on("submit", function(e) {
		var result = confirm("are you sure?");
		if (!result) {
			e.preventDefault();
		}
	});

	$(".btn-add").on("click", function() {
		$(".dialog").removeClass("hidden");
	});

	$(".form-input-at").on("change", function() {
		if ($(this).val() == "3") {
			$(".form-input-index").removeClass("hidden");
		} else {
			$(".form-input-index").addClass("hidden");
		}
	});

	$(".form-input-index").on("blur", function() {
		var value = parseInt($(this).val());
		if (isNaN(value)) {
			$(this).val("1");
		} else if (value > parseInt($(this).attr("max"))) {
			$(this).val(parseInt($(this).attr("max")));
		}
	});

	$(document).on("change", ".form-input-image", function() {
		
		var previewElement = $(".form-input-image-preview");
		var reader = new FileReader();
		reader.onload = function(e) {
			var image = new Image();
			image.src = e.target.result;
			image.onload = function() {
				
			};

			previewElement.attr("src", image.src);
		};
		reader.readAsDataURL($(this)[0].files[0]);
	});

	if ($(".edit-item").length == 0) {
		$(".form-input-at").attr("disabled", true);
	}

	$(".form-input-image").on("change", function() {
		$(".btn-submit").removeAttr("disabled");
	});

	$(".dialog-btn-close, .btn-cancel").on("click", function() {
		$(".dialog").addClass("hidden");
		clearFileInput($(".form-input-image")[0]);
		$(".btn-submit").attr("disabled", true);
	});
});

function clearFileInput(ctrl) {
	try {
		ctrl.value = null;
	} catch(ex) { }
		if (ctrl.value) {
		ctrl.parentNode.replaceChild(ctrl.cloneNode(true), ctrl);
	}

	$(".form-input-image-preview").removeAttr("src");
}