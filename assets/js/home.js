var container, section2, section3, section3Threshold;
var checkScrollDown = true, checkScrollUp = false;
var vh100 = 0, vh33 = 0;
var matrix1, matrix2, matrix3, matrix4, matrix5;
var matrixValue1, matrixValue2, matrixValue3, matrixValue4, matrixValue5;
var selectedWorkAnimationDone = 5;

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

    getSection2Transform();

    $(document).on("click", ".selected-works-right", function() {
        if (selectedWorkAnimationDone >= 5) {
            selectedWorkAnimationDone = 0;

            $(".selected-work[data-no='5']").velocity({
                translateZ: 0,
                translateX: [matrixValue4[4] + "px", matrixValue5[4] + "px"],
                scaleX: [matrixValue4[0], matrixValue5[0]],
                scaleY: [matrixValue4[0], matrixValue5[0]]
            }, 300, function(element) {
                $(element).attr("data-no", 4);
                selectedWorkAnimationDone++;
            });

            $(".selected-work[data-no='4']").velocity({
                translateZ: 0,
                translateX: [matrixValue3[4] + "px", matrixValue4[4] + "px"],
                scaleX: [matrixValue3[0], matrixValue4[0]],
                scaleY: [matrixValue3[0], matrixValue4[0]]
            }, 300, function(element) {
                $(element).attr("data-no", 3);
                selectedWorkAnimationDone++;
            });

            $(".selected-work[data-no='3']").velocity({
                translateZ: 0,
                translateX: [matrixValue2[4] + "px", matrixValue3[4] + "px"],
                scaleX: [matrixValue2[0], matrixValue3[0]],
                scaleY: [matrixValue2[0], matrixValue3[0]]
            }, 300, function(element) {
                $(element).attr("data-no", 2);
                selectedWorkAnimationDone++;
            });

            $(".selected-work[data-no='2']").velocity({
                translateX: [matrixValue1[4] + "px", matrixValue2[4] + "px"],
                scaleX: [matrixValue1[0], matrixValue2[0]],
                scaleY: [matrixValue1[0], matrixValue2[0]]
            }, 300, function(element) {
                $(element).attr("data-no", 1);
                selectedWorkAnimationDone++;
            });

            $(".selected-work[data-no='1']").velocity({
                translateZ: 0,
                translateX: [matrixValue5[4] + "px", matrixValue1[4] + "px"],
                scaleX: [matrixValue5[0], matrixValue1[0]],
                scaleY: [matrixValue5[0], matrixValue1[0]]
            }, 0, function(element) {
                $(element).attr("data-no", 5);
                selectedWorkAnimationDone++;
            });
        }
    });

    $(document).on("click", ".selected-works-left", function() {
        if (selectedWorkAnimationDone >= 5) {
            selectedWorkAnimationDone = 0;

            $(".selected-work[data-no='5']").velocity({
                translateZ: 0,
                translateX: [matrixValue1[4] + "px", matrixValue5[4] + "px"],
                scaleX: [matrixValue1[0], matrixValue5[0]],
                scaleY: [matrixValue1[0], matrixValue5[0]]
            }, 0, function(element) {
                $(element).attr("data-no", 1);
                selectedWorkAnimationDone++;
            });

            $(".selected-work[data-no='4']").velocity({
                translateZ: 0,
                translateX: [matrixValue5[4] + "px", matrixValue4[4] + "px"],
                scaleX: [matrixValue5[0], matrixValue4[0]],
                scaleY: [matrixValue5[0], matrixValue4[0]]
            }, 300, function(element) {
                $(element).attr("data-no", 5);
                selectedWorkAnimationDone++;
            });

            $(".selected-work[data-no='3']").velocity({
                translateZ: 0,
                translateX: [matrixValue4[4] + "px", matrixValue3[4] + "px"],
                scaleX: [matrixValue4[0], matrixValue3[0]],
                scaleY: [matrixValue4[0], matrixValue3[0]]
            }, 300, function(element) {
                $(element).attr("data-no", 4);
                selectedWorkAnimationDone++;
            });

            $(".selected-work[data-no='2']").velocity({
                translateZ: 0,
                translateX: [matrixValue3[4] + "px", matrixValue2[4] + "px"],
                scaleX: [matrixValue3[0], matrixValue2[0]],
                scaleY: [matrixValue3[0], matrixValue2[0]]
            }, 300, function(element) {
                $(element).attr("data-no", 3);
                selectedWorkAnimationDone++;
            });

            $(".selected-work[data-no='1']").velocity({
                translateZ: 0,
                translateX: [matrixValue2[4] + "px", matrixValue1[4] + "px"],
                scaleX: [matrixValue2[0], matrixValue1[0]],
                scaleY: [matrixValue2[0], matrixValue1[0]]
            }, 300, function(element) {
                $(element).attr("data-no", 2);
                selectedWorkAnimationDone++;
            });
        }
    });
});

function getSection2Transform() {
    matrix1 = $(".selected-work[data-no='1']").css("transform");
    matrixValue1 = matrix1.match(/-?[\d\.]+/g);
    matrix2 = $(".selected-work[data-no='2']").css("transform");
    matrixValue2 = matrix2.match(/-?[\d\.]+/g);
    matrix3 = $(".selected-work[data-no='3']").css("transform");
    matrixValue3 = matrix3.match(/-?[\d\.]+/g);
    matrix4 = $(".selected-work[data-no='4']").css("transform");
    matrixValue4 = matrix4.match(/-?[\d\.]+/g);
    matrix5 = $(".selected-work[data-no='5']").css("transform");
    matrixValue5 = matrix5.match(/-?[\d\.]+/g);
}

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