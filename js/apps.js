const bannerBGs = {
  "banner-bg-tl": { startX: "50%", startY: "50%", endX: "25%", endY: "25%" },
  "banner-bg-tr": { startX: "100%", startY: "0%", endX: "75%", endY: "25%" },
  "banner-bg-br": { startX: "50%", startY: "50%", endX: "75%", endY: "75%" },
  "banner-bg-bl": { startX: "0%", startY: "100%", endX: "25%", endY: "75%" },
};

const closingBGs = {
  "closing-bg-tl": { startX: "50%", startY: "50%", endX: "0%", endY: "0%" },
  "closing-bg-br": { startX: "50%", startY: "50%", endX: "100%", endY: "100%" },
};

function addBGAnimation(bgPositions, duration = 1200) {
  for (let bg in bgPositions) {
    $bgObj = $(`.${bg}`).css({
      backgroundPositionX: bgPositions[bg].startX,
      backgroundPositionY: bgPositions[bg].startY,
    });

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
  console.log($bannerScrollText);
  $bannerScrollText.css({ opacity: "0" });
  addBGAnimation(bannerBGs);
  $bannerScrollText.delay(1500).animate({ opacity: "1" }, 500);
});

// $(".main-content").on("click", () => {
//   $(".closing-bg").show();
//   addBGAnimation(closingBGs, 800);
// });

$(".closing-link").on("click", (event) => {
  event.preventDefault();
  let duration = 800;
  console.log(event);
  $(".closing-bg").show();
  addBGAnimation(closingBGs, duration);
  setTimeout(() => {
    window.location.href = $(event.currentTarget).attr("href");
    // $(".closing-bg").hide();
  }, duration);
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
    let msg = object.hasOwn(inputText, input.id)
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
