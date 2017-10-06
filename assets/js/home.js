var section2, section3;
var checkScrollDown = true, checkScrollUp = false;

$(function() {
    section2 = $(".section-2");
    section3 = $(".section-3");
    $("body").on("allLoaded", function() {
        $(".section-1").addClass("show");
    });

    $(".container").on("scroll", checkSection2ScrollDown);
});

function checkSection2ScrollDown() {
    if (checkScrollDown) {
        if (section2.offset().top <= 0) {
            checkScrollDown = false;
            checkScrollUp = true;
            section3.addClass("show");
            section3.velocity({
                opacity: 1
            }, 300, function() {
                
            });

            $(".container").off("scroll", checkSection2ScrollDown);
            $(".container").on("scroll", checkSection2ScrollUp);
        }
    }
}

function checkSection2ScrollUp() {
    if (checkScrollUp) {
        if (section2.offset().top > 0) {
            checkScrollUp = false;
            checkScrollDown = true;
            section3.velocity({
                opacity: 0
            }, 300, function() {
                section3.removeClass("show");
            });

            $(".container").off("scroll", checkSection2ScrollUp);
            $(".container").on("scroll", checkSection2ScrollDown);
        }
    }
}