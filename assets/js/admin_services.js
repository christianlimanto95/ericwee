$(function() {
	$(".content input, .content textarea").on("change", function() {
		if (!$(this).next().hasClass("btn-update")) {
			$(this).closest("form").append("<button name='update' class='btn btn-update'>Update</button>");
		}
	});

	$(".btn-insert-package").on("click", function() {
		var service_group_id = $(this).closest(".service-group").data("id");
		$(".dialog-insert-package input[name='service_group_id']").val(service_group_id);
		$(".dialog-insert-package").addClass("show");
	});

	$(".btn-close-dialog").on("click", function() {
		$(".dialog").removeClass("show");
	});

	$(".btn-delete").on("click", function(e) {
		var strTambahan = "";
		if ($(this).hasClass("btn-delete-package")) {
			var package_name = $(this).closest("form").prev().find("input[name='service_package_name']").val();
			strTambahan = " paket '" + package_name + "'";
		}
		var result = confirm("Yakin mau delete" + strTambahan + "?");
		if (!result) {
			e.preventDefault();
		}
	});

	$(".dialog-insert-package").on("submit", function(e) {
		if ($(".dialog-insert-package input[name='service_package_name']").val().trim() == "") {
			alert("Nama Paket harus diisi");
			e.preventDefault();
		} else if ($(".dialog-insert-package input[name='service_package_price']").val().trim() == "") {
			alert("Harga Paket harus diisi");
			e.preventDefault();
		}
	});

	$(document).on("keydown", "input", function(e) {
		if (e.keyCode == 13) {
			$(this).blur();
			e.preventDefault();
		}
	});
});
