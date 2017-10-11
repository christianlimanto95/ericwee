$(function() {
    $("body").on("allLoaded", function() {
        $(".section-1").addClass("show");
    });
    
    $(".section-1-services-container").on("click", function() {
        $(".section-2").velocity("scroll", {
            container: $(".container"),
            duration: 500
        });
    });
});