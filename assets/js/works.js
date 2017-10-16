var container, section1, section2, section3;
var checkScrollDown = true, checkScrollUp = false;
var vh100, vh33;
var selectedWorksThreshold, archivedWorksThreshold;

$(function() {
    container = $(".container");
    section1 = $(".section-1");
    section2 = $(".section-2");
    section3 = $(".section-3");
    vh100 =  parseInt(section1.css("height"));
    vh33 = vh100 / 3;
    section3Threshold = section2.offset().top + parseInt(section2.css("height")) - vh100 / 2;

    selectedWorksThreshold = $(".selected-works-title").offset().top - vh33 * 2;
    archivedWorksThreshold = $(".archived-works-title").offset().top - vh33 * 2;

    $("body").on("allLoaded", function() {
        $(".section-1").addClass("show");
    });

    $(".section-1-works-container").on("click", function() {
        $(".section-2").velocity("scroll", {
            container: $(".container"),
            duration: 500
        });
    });

    container.on("scroll", checkSection2ScrollDown);
    container.on("scroll", selectedWorksShow);
});

function selectedWorksShow() {
    if (container.scrollTop() >= selectedWorksThreshold) {
        $(".selected-works-title").addClass("show");
        container.off("scroll", selectedWorksShow);
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