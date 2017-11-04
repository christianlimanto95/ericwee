$(function() {
	$("form").on("submit", function(e) {
		var valid = true;

		var oldPassword = $(".old-password").val();
		var newPassword = $(".new-password").val();
		var confirmNewPassword = $(".confirm-new-password").val();

		if (oldPassword == "") {
			valid = false;
			alert("password lama harus diisi");
		} else if (newPassword == "") {
			valid = false;
			alert("password baru harus diisi");
		} else if (confirmNewPassword == "") {
			valid = false;
			alert("Confirm password baru harus diisi");
		} else if (newPassword != confirmNewPassword) {
			valid = false;
			alert("Password baru harus sama dengan confirm password baru");
		}

		if (!valid) {
			e.preventDefault();
		}
	});
})