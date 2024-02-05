hljs.highlightAll();
//---------------------- variables ---------------------------------------
const CLOSING_DUR = 800;
const MQ_MEDIUM = window.matchMedia("(max-width: 767px)");
const MQ_SMALL = window.matchMedia("(min-width: 576px)");

//---------------------- banner animations ---------------------------------------

const bannerBGs = {
    "banner-bg-tl": { startX: "50%", startY: "50%", endX: "25%", endY: "25%" },
    "banner-bg-tr": { startX: "100%", startY: "0%", endX: "75%", endY: "25%" },
    "banner-bg-br": { startX: "50%", startY: "50%", endX: "75%", endY: "75%" },
    "banner-bg-bl": { startX: "0%", startY: "100%", endX: "25%", endY: "75%" },
};

const closingBGs = {
    "closing-bg-tl": { startX: "50%", startY: "50%", endX: "0%", endY: "0%" },
    "closing-bg-br": {
        startX: "50%",
        startY: "50%",
        endX: "100%",
        endY: "100%",
    },
};

function addBGAnimation(bgPositions, duration = 1200) {
    for (let bg in bgPositions) {
        $bgObj = $(`.${bg}`);

        if (["banner-bg-br", "banner-bg-tl"].includes(bg)) {
            $bgObj = $bgObj.delay(600);
        }

        $bgObj.animate(
            {
                backgroundPositionX: bgPositions[bg].endX,
                backgroundPositionY: bgPositions[bg].endY,
            },
            duration,
            () => {
                $(".banner-bg").css({ zIndex: "-3" });
            }
        );
    }
}

$(document).ready(() => {
    $bannerScrollText = $(".banner .scroll-text");
    $bannerScrollText.css({ opacity: "0" });
    addBGAnimation(bannerBGs);
    $bannerScrollText.delay(1500).animate({ opacity: "1" }, 500);
});

$(".closing-link").on("click", (event) => {
    event.preventDefault();
    $(".closing-bg").show();
    closeSidebar();
    addBGAnimation(closingBGs, CLOSING_DUR);
    setTimeout(() => {
        window.location.href = $(event.currentTarget).attr("href");
    }, CLOSING_DUR);
});

//---------------------- form validation ---------------------------------------
const $form = $(".contact-form");

const inputText = {
    fname: "first name",
    lname: "last name",
    email: "email address",
};

function invalidInput(input) {
    if (input.validity.valueMissing) {
        let msg = Object.hasOwn(inputText, input.id)
            ? `please enter in your ${inputText[input.id]}`
            : "please fill in this field";
        input.setCustomValidity(msg);
    }

    $(input).css({ outline: "2px solid #b80000" });
}

$form.on("input", "input", (event) => {
    let validity = event.target.validity;
    if (!validity.valueMissing && !validity.typeMismatch) {
        event.target.setCustomValidity("");
        $(event.target).removeAttr("style");
    }
});

$form.on("click", "button", () => {
    for (let input of $form.children("input")) {
        if (!input.validity.valid) {
            invalidInput(input);
        }
    }
});

//---------------------- coding examples ---------------------------------------
const $navTabs = $(".nav-tabs");

const paging = (slick, index) => {
    let pagingText;
    switch (index) {
        case 0:
            pagingText = "HTML";
            break;
        case 1:
            pagingText = "Sass";
            break;
        case 2:
            pagingText = "JavaScript";
            break;
    }
    return `<i class="fab-${pagingText.toLowerCase()}"></i> ${pagingText}`;
};

const slickOptions = {
    arrows: false,
    dots: true,
    dotsClass: "tab-items",
    adaptiveHeight: true,
    draggable: false,
    customPaging: paging,
};

function tryToSlick(mq) {
    if (mq.matches) {
        if (!$navTabs.hasClass("slick-initialized"))
            $navTabs.slick(slickOptions);
    } else {
        if ($navTabs.hasClass("slick-initialized")) $navTabs.slick("unslick");
    }
}

$(document).ready(function () {
    tryToSlick(MQ_SMALL);
});

MQ_SMALL.onchange = (event) => {
    tryToSlick(event);
};

//---------------------- mobile sidebar ---------------------------------------
function openSidebar() {
    if (MQ_MEDIUM.matches) {
        $mainContentCover = $("<div class='main-cover'></div>");
        $(".main-content").prepend($mainContentCover);
        $mainContentCover.animate({ opacity: 1 }, 500);
        $(".sidebar").animate({ left: "0px" }, 800);
        $(".sidebar-pullout").animate({ left: "175px" }, 800);
    }
}

function closeSidebar() {
    if (MQ_MEDIUM.matches) {
        $(".sidebar").animate({ left: "-200px" }, CLOSING_DUR);
        $(".sidebar-pullout").animate({ left: "0" }, CLOSING_DUR);
        $(".main-cover").animate({ opacity: 0 }, 500, () => {
            $(".main-cover").remove();
        });
    }
}

$(".sidebar-pullout").on("click", () => {
    openSidebar();
});

$(".main-content").on("click", () => {
    closeSidebar();
});

$("a[href^='#']").on("click", () => {
    closeSidebar();
});

MQ_MEDIUM.onchange = (event) => {
    if (!event.matches) {
        $(".main-cover").remove();
        $(".sidebar").removeAttr("style");
        $(".sidebar-pullout").removeAttr("style");
    }
};
