//---------------------- canvas animation ---------------------------------------
let bg =
  "linear-gradient(-45deg, #ebd9b4 0 25%, transparent 0 50%), linear-gradient(-225deg, #ebd9b4 0 25%, transparent 0 50%), linear-gradient(225deg, #9dbc98 0 25%, transparent 0 50%), linear-gradient(45deg, #9dbc98 0 25%, transparent 0 50%);";

$(".sidebar").hide();
$(".main-content").css({ margin: "0px", width: "100%" });

const canvas = document.createElement("canvas");
const ctx = canvas.getContext("2d");

$("#banner").prepend(
  $(canvas).css({
    position: "absolute",
    top: "0",
    left: "0",
    width: "100%",
    height: "100%",
    "z-index": "3",
  })
);
console.log(`yada ${$(canvas).width()}`);

class Point {
  constructor(x, y) {
    this.x = x;
    this.y = y;
  }

  dist(p = null) {
    console.log(`${this.x} ${this.y}`);
    if (p === null) return Math.sqrt(this.x ** 2 + this.y ** 2);

    return Math.sqrt((p.x - this.x) ** 2 + (p.y - this.y) ** 2);
  }

  createPointFromHere(dist, angle) {
    console.log(`point: ${this}, dist ${dist}, angle ${angle}`);
    return new Point(
      this.x + dist * Math.sin(angle),
      this.y + dist * Math.cos(angle)
    );
  }
}

class Cover {
  constructor(percent, angle, colour) {
    this.percent = percent;
    this.angle = (angle * Math.PI) / 180;
    this.colour = colour;
    let $canvas = $(canvas);
    this.w = $canvas.width();
    this.h = canvas.height();
  }

  #innerAngle2() {
    let inner = (this.angle % 2) * Math.PI;
    if (inner < 0) inner += 2 * Math.PI;

    if (inner < Math.PI / 4) return compAngle - Math.PI / 4;
    else if (inner < Math.PI / 2) return Math.PI / 4 - compAngle;
    else if (inner < (Math.PI * 3) / 4) return (Math.PI * 3) / 4 - inner;
    else if (inner < Math.PI) return inner - (Math.PI * 3) / 4;
    else if (inner < (Math.PI * 5) / 4) return (Math.PI * 5) / 4 - inner;
    else if (inner < (Math.PI * 3) / 2) return inner - (Math.PI * 5) / 4;
    else if (inner < (Math.PI * 7) / 4) return (Math.PI * 7) / 4 - inner;
    else if (inner < 2 * Math.PI) return inner - (Math.PI * 7) / 4;
  }

  #innerAngle(cornerAngle) {
    let compAngle = Math.PI / 2 - cornerAngle;
    let inner = this.angle % (2 * Math.PI);
    console.log(`inner ${inner}`);
    if (inner < 0) inner += 2 * Math.PI;

    if (inner <= compAngle) return compAngle - inner;
    else if (inner <= Math.PI / 2) return inner - compAngle;
    else if (inner <= Math.PI / 2 + cornerAngle)
      return Math.PI / 2 + cornerAngle - inner;
    else if (inner <= Math.PI) return inner - Math.PI / 2 - cornerAngle;
    else if (inner <= Math.PI + compAngle) return Math.PI + compAngle - inner;
    else if (inner <= (Math.PI * 3) / 2) return inner - Math.PI - compAngle;
    else if (inner <= (Math.PI * 3) / 2 + cornerAngle)
      return (Math.PI * 3) / 2 + cornerAngle - inner;
    else if (inner <= 2 * Math.PI)
      return inner - (Math.PI * 3) / 2 - cornerAngle;
  }

  nearestCorner() {}

  #calcGradDim() {
    let $canvas = $(canvas);
    console.log(`width ${$canvas.width()}`);
    let center = new Point($canvas.width() / 2, $canvas.height() / 2);

    let diag = center.dist();
    let cornerAngle = Math.atan2(center.y, center.x);
    console.log(`center ${cornerAngle}`);
    let angle = this.#innerAngle(cornerAngle);
    console.log(`angle ${angle}`);
    let dist = diag * Math.cos(angle);
    let start = center.createPointFromHere(-dist, this.angle);
    let end = start.createPointFromHere(2 * this.percent * dist, this.angle);
    return [start, end];
  }

  draw() {
    // let startEnd = this.#calcGradDim();
    // let start = startEnd[0];
    // let end = startEnd[1];
    // console.log(start);
    let $canvas = $(canvas);
    let gradient = ctx.createLinearGradient(
      0,
      0,
      $canvas.height(),
      $canvas.width()
    );
    gradient.addColorStop(this.percent, this.colour);
    gradient.addColorStop(this.percent, "transparent");
    ctx.fillStyle = gradient;
    ctx.fillRect(0, 0, $canvas.width(), $canvas.height());
  }
}
const cover = new Cover(0.25, 45, "red");
//cover.draw();
const gradient = -270 % 180;
console.log(gradient);

$(".spectrum-background").on("click", () => {
  console.log("clicked");
  document.querySelector(".spectrum-background").style.background =
    "linear-gradient(-45deg, #ebd9b4 0 25%, transparent 0 50%), linear-gradient(-225deg, #ebd9b4 0 25%, transparent 0 50%), linear-gradient(225deg, #9dbc98 0 25%, transparent 0 50%), linear-gradient(45deg, #9dbc98 0 25%, transparent 0 50%);";
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
