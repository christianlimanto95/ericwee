var container, section1, section2, section3, section3Threshold;
var checkScrollDown = true, checkScrollUp = false;
var vh100 = 0, vh40 = 0;

$(function() {
    container = $(".container");
    section1 = $(".section-1");
    section2 = $(".section-2");
    section3 = $(".section-3");
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

    $(window).on("resize", function() {
        setVH();
        setThreshold();
        container.scroll();
    });
});

function setVH() {
    vh100 =  parseInt(section1.css("height"));
    vh40 = vh100 / 2.5;
}

function setThreshold() {
    section3Threshold = section2.offset().top + container.scrollTop() + parseInt(section2.css("height")) - vh100 / 2;

    var servicePackageCtr = 1;
    var serviceGroupLength = $(".service-group").length;
    for (var i = 1; i <= serviceGroupLength; i++) {
        servicePackageCtr = 1;
        var serviceGroupItem = $(".service-group-" + i);
        if (!serviceGroupItem.hasClass("show")) {
            var itemThreshold = serviceGroupItem.offset().top + container.scrollTop() - vh40 * 2;
            var doneFunction = false;

            serviceGroupItem.find(".service-package").each(function() {
                var no = servicePackageCtr;
                this.style.animationDelay = (0.2 * no) + "s";
                if (no % 2 == 0) {
                    this.className += " service-package-right";
                }
                servicePackageCtr++;
            });

            (function(item, threshold, done) {
                container.on("scroll", function() {
                    if (!done) {
                        if (container.scrollTop() >= threshold) {
                            done = true;
                            item.addClass("show");
                        }
                    }
                });
            })(serviceGroupItem, itemThreshold, doneFunction);
        }
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