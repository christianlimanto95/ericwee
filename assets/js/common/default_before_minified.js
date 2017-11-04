var windowLoad = false, timeoutDone = false;
var menuCanClick = true, menuLineTranslateY = {open: "8px", close: "0px"};
var checkScrollDownHeader = true, checkScrollUpHeader = false;
var isLogoBlack = true;
var container;
var sectionFooter = false;

var timeout = setTimeout(function() {
    timeoutDone = true;
    if (windowLoad) {
        $(".loading-container").velocity({
            opacity: 0
        }, 1000, function() {
            $(".loading-container").addClass("hidden");
            $("body").trigger("allLoaded");
        });
    }
}, 1000);

$(function() {
    if (isMobile) {
        menuLineTranslateY.open = "2vw";
        menuLineTranslateY.close = "0vw";
    }

    container = $(".container");
    var menuInside = $(".menu-inside");
    menuInside.find("[data-anim='fade-anim'], .menu-inside-section-line").on("webkitAnimationEnd oanimationend msAnimationEnd animationend", function(e) {
        e.stopPropagation();
    });

    document.getElementById("menu").addEventListener("click", function(e) {
        if (menuCanClick) {
            var body = $("body");
            if (body.hasClass("menu-opened")) {
                menuCanClick = false;
                var dataAnim = menuInside.find("[data-anim='fade-anim']");
                dataAnim.attr("data-anim-state", "done");
                body.addClass("menu-close");

                if (checkScrollDownHeader) {
                    $(".menu-text-menu").velocity({
                        opacity: 1
                    }, 300);

                    $(".logo-text").velocity({
                        color: "#444"
                    }, 300);
                }

                if (isLogoBlack) {
                    $(".logo-image-black").velocity({
                        opacity: 1
                    }, 300);
                    $(".logo-image-white").velocity({
                        opacity: 0
                    }, 300);
                }

                $(".menu-text-close").velocity({
                    opacity: 0
                }, 300);
                
                var backgroundColor = "#181818";
                if (sectionFooter) {
                    backgroundColor = "#FFF";
                }

                $(".menu-icon-line-1").velocity({
                    rotateZ: "0deg",
                    translateY: menuLineTranslateY.close,
                    backgroundColor: backgroundColor
                }, 300);
                $(".menu-icon-line-2").velocity({
                    opacity: 1
                }, 300);
                $(".menu-icon-line-3").velocity({
                    rotateZ: "0deg",
                    translateY: menuLineTranslateY.close,
                    backgroundColor: backgroundColor
                }, 300);

                menuInside.one("webkitAnimationEnd oanimationend msAnimationEnd animationend", function() {
                    dataAnim.removeAttr("data-anim-state");
                    body.removeClass("menu-opened menu-close");
                    menuCanClick = true;
                });
            } else {
                menuCanClick = false;
                body.addClass("menu-open");

                if (checkScrollDownHeader) {
                    $(".menu-text-menu").velocity({
                        opacity: 0
                    }, 300);

                    $(".logo-text").velocity({
                        color: "#FFF"
                    }, 300);
                }

                $(".menu-text-close, .logo-image-white").velocity({
                    opacity: 1
                }, 300);

                $(".logo-image-black").velocity({
                    opacity: 0
                }, 300);

                $(".menu-icon-line-1").velocity({
                    rotateZ: "42deg",
                    translateY: menuLineTranslateY.open,
                    backgroundColor: "#FFF"
                }, 300);
                $(".menu-icon-line-2").velocity({
                    opacity: 0
                }, 300);
                $(".menu-icon-line-3").velocity({
                    rotateZ: "-42deg",
                    translateY: "-" + menuLineTranslateY.open,
                    backgroundColor: "#FFF"
                }, 300);

                menuInside.one("webkitAnimationEnd oanimationend msAnimationEnd animationend", function() {
                    body.addClass("menu-opened");
                    body.removeClass("menu-open");
                    menuCanClick = true;
                });
            }
        }
    });

    container.on("scroll", scrollDownHeader);

    $(".menu-inside-menu, .logo").on("click", function(e) {
        var href = this.href;
        e.preventDefault();
        $(".white-background").css("display", "block");
        $(".white-background").velocity({
            opacity: 1
        }, 500, function() {
            location.href = href;
        });
    });

    $(window).resize(function() {
        vw = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
        vh = Math.max(document.documentElement.clientHeight, window.innerHeight || 0);

        if (vw < 1025) {
            isMobile = true;
            if (vw >= 768) {
                isTablet = true;
            }
        }

        if (isMobile) {
            menuLineTranslateY.open = "2vw";
            menuLineTranslateY.close = "0vw";
        } else {
            menuLineTranslateY.open = "8px";
            menuLineTranslateY.close = "0px";
        }
    });
});

$(window).on("load", function() {
    windowLoad = true;
    if (timeoutDone) {
        $(".loading-container").velocity({
            opacity: 0
        }, 1000, function() {
            $(".loading-container").addClass("hidden");
            $("body").trigger("allLoaded");
        });
    }
});

function scrollDownHeader() {
    if (checkScrollDownHeader) {
        if (container.scrollTop() >= 100) {
            checkScrollDownHeader = false;
            checkScrollUpHeader = true;

            $(".logo-text, .menu-text-menu").velocity({
                opacity: 0
            }, 200);
            
            container.off("scroll", scrollDownHeader);
            container.on("scroll", scrollDownUpHeader);
        }
    }
}

function scrollDownUpHeader() {
    if (checkScrollUpHeader) {
        if (container.scrollTop() < 100) {
            checkScrollUpHeader = false;
            checkScrollDownHeader = true;

            $(".logo-text, .menu-text-menu").velocity({
                opacity: 1
            }, 200);
            
            container.off("scroll", scrollDownUpHeader);
            container.on("scroll", scrollDownHeader);
        }
    }
}