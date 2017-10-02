var menuCanClick = true;
$(function() {
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
                menuInside.one("webkitAnimationEnd oanimationend msAnimationEnd animationend", function() {
                    dataAnim.removeAttr("data-anim-state");
                    body.removeClass("menu-opened menu-close");
                    menuCanClick = true;
                });
            } else {
                menuCanClick = false;
                body.addClass("menu-open");
                menuInside.one("webkitAnimationEnd oanimationend msAnimationEnd animationend", function() {
                    body.addClass("menu-opened");
                    body.removeClass("menu-open");
                    menuCanClick = true;
                });
            }
        }
    });
});