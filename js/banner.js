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
