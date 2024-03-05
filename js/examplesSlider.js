hljs.highlightAll(); // syntax highlighter for coding examples
const MQ_SMALL = window.matchMedia("(min-width: 576px)");

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
