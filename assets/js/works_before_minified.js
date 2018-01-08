var container, section1, section2, section3;
var checkScrollDown = true, checkScrollUp = false;
var vh100, vh33;
var selectedWorksThreshold, archivedWorksThreshold;

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

    $(".section-1-works-container").on("click", function() {
        $(".section-2").velocity("scroll", {
            container: $(".container"),
            duration: 500
        });
    });

    $(".image-wrapper").on("click", function() {
        var src = $(this).prev().attr("src");
        $(".preview-image").attr("src", src);
        $(".preview-container").addClass("show");
    });

    $(".preview-container").on("click", function() {
        $(this).removeClass("show");
        $(".preview-image").attr("src", "");
    });

    container.on("scroll", checkSection2ScrollDown);
    container.on("scroll", selectedWorksShow);
    container.on("scroll", archivedWorksShow);

    for (var i = 0; i < selectedWorksLength; i+=3) {
        var selectedWorksItem = $(".selected-works-item-container[data-no='" + i + "']");
        var itemThreshold = selectedWorksItem.offset().top - vh33 * 2;
        var doneFunction = false;
        (function(item, threshold, done) {
            container.on("scroll", function() {
                if (!done) {
                    if (container.scrollTop() >= threshold) {
                        done = true;
    
                        item.addClass("show");
                        var next = item.next();
                        if (next.length > 0) {
                            next.addClass("show");
                            
                            var secondNext = next.next();
                            if (secondNext.length > 0) {
                                secondNext.addClass("show");
                            }
                        }
                    }
                }
            });
        })(selectedWorksItem, itemThreshold, doneFunction);
    }

    for (var i = 0; i < archivedWorksLength; i+=2) {
        var archivedWorksItem = $(".archived-works-item-container[data-no='" + i + "']");
        var itemThreshold = archivedWorksItem.offset().top - vh33 * 2;
        var doneFunction = false;
        (function(item, threshold, done) {
            container.on("scroll", function() {
                if (!done) {
                    if (container.scrollTop() >= threshold) {
                        done = true;
    
                        item.addClass("show");
                        var next = item.next();
                        if (next.length > 0) {
                            next.addClass("show");
                        }
                    }
                }
            });
        })(archivedWorksItem, itemThreshold, doneFunction);
    }

    $(window).on("resize", function() {
        setVH();
        setThreshold();
        container.scroll();
        imageSize = (isMobile) ? (isTablet) ? (28 * vw / 100 - 10) + "px" : (80 * vw / 100 - 10) + "px" : "290px";
        $(".section-2 img").each(function() {
            imgOnload(this);
        });
    });
});

function setVH() {
    vh100 =  parseInt(section1.css("height"));
    vh33 = vh100 / 2.5;
}

function setThreshold() {
    section3Threshold = section2.offset().top + container.scrollTop() + parseInt(section2.css("height")) - vh100 / 2;
    selectedWorksThreshold = $(".selected-works-title").offset().top - vh33 * 2;
    archivedWorksThreshold = $(".archived-works-title").offset().top - vh33 * 2;
}

function selectedWorksShow() {
    if (container.scrollTop() >= selectedWorksThreshold) {
        $(".selected-works-title").addClass("show");
        container.off("scroll", selectedWorksShow);
    }
}

function archivedWorksShow() {
    if (container.scrollTop() >= archivedWorksThreshold) {
        $(".archived-works-title").addClass("show");
        container.off("scroll", archivedWorksShow);
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