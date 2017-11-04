$(function() {
    $(".input-hp").on("keydown", function(e) {
        isNumber(e);
    });
});

function isNumber(e) {
	if (e.key.length == 1) {
		if ("0123456789".indexOf(e.key) < 0) {
			e.preventDefault();
		}
	}
}