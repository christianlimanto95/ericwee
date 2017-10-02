$(function() {
    timeout = setTimeout(function() {
        $(".loading-container").velocity({
            opacity: 0
        }, 1000, function() {
           $(".loading-container").addClass("hidden");
        });
    }, 1000);
});