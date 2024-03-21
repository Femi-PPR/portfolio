const MQ_MEDIUM = window.matchMedia("(max-width: 767px)");

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
