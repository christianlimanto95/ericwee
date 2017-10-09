var windowLoad = false, timeoutDone = false;
var menuCanClick = true;
var checkScrollDownHeader = true, checkScrollUpHeader = false;
var container;

var timeout = setTimeout(function() {
    $(".loading-container").velocity({
        opacity: 0
    }, 1000, function() {
        timeoutDone = true;
        if (windowLoad) {
            $(".loading-container").addClass("hidden");
            $("body").trigger("allLoaded");
        }
    });
}, 1000);

$(function() {
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
                }
                $(".menu-text-close").velocity({
                    opacity: 0
                }, 300);

                $(".menu-icon-line-1").velocity({
                    rotateZ: "0deg",
                    translateY: "0px",
                    backgroundColor: "#181818"
                }, 300);
                $(".menu-icon-line-3").velocity({
                    rotateZ: "0deg",
                    translateY: "0px",
                    backgroundColor: "#181818"
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
                }
                $(".menu-text-close").velocity({
                    opacity: 1
                }, 300);

                $(".menu-icon-line-1").velocity({
                    rotateZ: "42deg",
                    translateY: "8px",
                    backgroundColor: "#FFF"
                }, 300);
                $(".menu-icon-line-3").velocity({
                    rotateZ: "-42deg",
                    translateY: "-8px",
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
});

$(window).on("load", function() {
    windowLoad = true;
    if (timeoutDone) {
        $(".loading-container").addClass("hidden");
        $("body").trigger("allLoaded");
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