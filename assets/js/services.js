var container, section1, section2, section3, section3Threshold;
var checkScrollDown = true, checkScrollUp = false;
var vh100 = 0, vh33 = 0;
var group1, group2, group3, group1Threshold, group2Threshold, group3Threshold;

$(function() {
    container = $(".container");
    section1 = $(".section-1");
    section2 = $(".section-2");
    section3 = $(".section-3");
    group1 = $(".service-group-1");
    group2 = $(".service-group-2");
    group3 = $(".service-group-3");
    vh100 =  parseInt(section1.css("height"));
    vh33 = vh100 / 3;
    section3Threshold = section2.offset().top + parseInt(section2.css("height")) - vh100 / 2;

    group1Threshold = group1.offset().top - vh33 * 2;
    group2Threshold = group2.offset().top - vh33 * 2;
    group3Threshold = group3.offset().top - vh33 * 2;

    $("body").on("allLoaded", function() {
        $(".section-1").addClass("show");
    });
    
    $(".section-1-services-container").on("click", function() {
        $(".section-2").velocity("scroll", {
            container: $(".container"),
            duration: 500
        });
    });

    container.on("scroll", checkSection2ScrollDown);
    container.on("scroll", serviceGroup1Show);
    container.on("scroll", serviceGroup2Show);
    container.on("scroll", serviceGroup3Show);
});

function serviceGroup1Show() {
    if (container.scrollTop() >= group1Threshold) {
        $(".service-group-1").addClass("show");
        container.off("scroll", serviceGroup1Show);
    }
}

function serviceGroup2Show() {
    if (container.scrollTop() >= group2Threshold) {
        $(".service-group-2").addClass("show");
        container.off("scroll", serviceGroup2Show);
    }
}

function serviceGroup3Show() {
    if (container.scrollTop() >= group3Threshold) {
        $(".service-group-3").addClass("show");
        container.off("scroll", serviceGroup3Show);
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