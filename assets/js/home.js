var container, section2, section3, section3Threshold;
var checkScrollDown = true, checkScrollUp = false;
var vh100 = 0, vh33 = 0;

$(function() {
    container = $(".container");
    section2 = $(".section-2");
    section3 = $(".section-3");
    vh100 =  parseInt(section2.css("height"));
    vh33 = vh100 / 3;
    section3Threshold = vh100 + vh100 / 2;
    $("body").on("allLoaded", function() {
        $(".section-1").addClass("show");
    });

    container.on("scroll", section2Show);
    container.on("scroll", checkSection2ScrollDown);
});

function section2Show() {
    if (container.scrollTop() >= vh33) {
        $(".section-2").addClass("show");
        container.off("scroll", section2Show);
    }
}

function checkSection2ScrollDown() {
    if (checkScrollDown) {
        if (container.scrollTop() >= section3Threshold) {
            sectionFooter = true;
            checkScrollDown = false;
            checkScrollUp = true;
            section3.addClass("show");
            section3.velocity({
                opacity: 1
            }, 200);

            $(".menu-icon-line").velocity({
                backgroundColor: "#FFFFFF"
            }, 200);
            container.off("scroll", checkSection2ScrollDown);
            container.on("scroll", checkSection2ScrollUp);
        }
    }
}

function checkSection2ScrollUp() {
    if (checkScrollUp) {
        if (container.scrollTop() < section3Threshold) {
            sectionFooter = false;
            checkScrollUp = false;
            checkScrollDown = true;
            section3.velocity({
                opacity: 0
            }, 200, function() {
                section3.removeClass("show");
            });
            $(".menu-icon-line").velocity({
                backgroundColor: "#000000"
            }, 200, function() {
                $(this).removeAttr("style");
            });

            container.off("scroll", checkSection2ScrollUp);
            container.on("scroll", checkSection2ScrollDown);
        }
    }
}