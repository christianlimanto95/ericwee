var container, section1, section2, section3, section3Threshold;
var checkScrollDown = true, checkScrollUp = false;
var vh100 = 0, vh40 = 0;
var group1, group2, group3, group1Threshold, group2Threshold, group3Threshold;

$(function() {
    container = $(".container");
    section1 = $(".section-1");
    section2 = $(".section-2");
    section3 = $(".section-3");
    group1 = $(".service-group-1");
    group2 = $(".service-group-2");
    group3 = $(".service-group-3");
    setVH();
    setThreshold();

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

    $(window).on("resize", function() {
        setVH();
        setThreshold();
    });
});

function setVH() {
    vh100 =  parseInt(section1.css("height"));
    vh40 = vh100 / 2.5;
}

function setThreshold() {
    section3Threshold = section2.offset().top + parseInt(section2.css("height")) - vh100 / 2;
    group1Threshold = group1.offset().top - vh40 * 2;
    group2Threshold = group2.offset().top - vh40 * 2;
    group3Threshold = group3.offset().top - vh40 * 2;
}

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
            isLogoBlack = false;
            sectionFooter = true;
            checkScrollDown = false;
            checkScrollUp = true;

            section3.removeClass("shown").removeClass("hiding").addClass("showing");
            section3.one('webkitAnimationEnd oanimationend msAnimationEnd animationend', function(e) {
                section3.addClass("shown").removeClass("showing");
            });

            $(".menu-icon-line").velocity({
                backgroundColor: "#FFFFFF"
            }, 300);
            $(".logo-image-black").velocity({
                opacity: 0
            }, 300);
            $(".logo-image-white").velocity({
                opacity: 1
            }, 300);
            
            container.off("scroll", checkSection2ScrollDown);
            container.on("scroll", checkSection2ScrollUp);
        }
    }
}

function checkSection2ScrollUp() {
    if (checkScrollUp) {
        if (container.scrollTop() < section3Threshold) {
            isLogoBlack = true;
            sectionFooter = false;
            checkScrollUp = false;
            checkScrollDown = true;

            section3.addClass("shown").removeClass("showing").addClass("hiding");
            section3.one('webkitAnimationEnd oanimationend msAnimationEnd animationend', function(e) {
                section3.removeClass("shown").removeClass("hiding");
            });

            $(".logo-image-black").velocity({
                opacity: 1
            }, 300);
            $(".logo-image-white").velocity({
                opacity: 0
            }, 300);
            $(".menu-icon-line").velocity({
                backgroundColor: "#000000"
            }, 300, function() {
                $(this).removeAttr("style");
            });

            container.off("scroll", checkSection2ScrollUp);
            container.on("scroll", checkSection2ScrollDown);
        }
    }
}