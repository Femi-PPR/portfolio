//---------------------- form validation ---------------------------------------
const EMAIL_REGEX = /^(([^<>()\[\]\.,;:\s@"]+(.[^<>()[\]\.,;:\s@"]+)*)|(".+"))@(([[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z-0-9]+\.)+[a-zA-Z]{2,}))$/;
const TELE_REGEX = /^((?:\+|00)[17](?: |-)?|(?:\+|00)[1-9]\d{0,2}(?: |-)?|(?:\+|00)1-\d{3}(?: |-)?)?(0\d|([0-9]{3})|[1-9]{0,3})(?:((?: |-)[0-9]{2}){4}|((?:[0-9]{2}){4})|((?: |-)[0-9]{3}(?: |-)[0-9]{4})|([0-9]{7}))$/;
const $form = $(".contact-form");

const inputText = {
    fname: "first name",
    lname: "last name",
    email: "email address",
    telephone: "phone number",
};

function invalidInput(input, type) {
    let msg;
    switch (type) {
        case "missing":
            msg = Object.hasOwn(inputText, input.id)
                ? `please enter in your ${inputText[input.id]}`
                : "please fill in this field";
            break;
        case "email":
            msg = "please enter a valid email address";
            break;
        case "telephone":
            msg = "please enter a valid telephone number";
            break;
    }
    input.setCustomValidity(msg);
    $(input).css({ outline: "2px solid #b80000" });
}

function invalidFormat(input) {
    switch (input.id) {
        case "email":
            if (!EMAIL_REGEX.test(input.value)) {
                invalidInput(input, "email");
            }
            break;
        case "telephone":
            if (!TELE_REGEX.test(input.value)) {
                invalidInput(input, "telephone");
            }
            break;
    }
}

function validInput(input) {
    $(input).removeAttr("style");
}

$form.on("input", "input", (event) => {
    let input = event.target;
    input.setCustomValidity("");
    let validity = input.validity;
    switch (input.id) {
        case "email":
            if (EMAIL_REGEX.test(input.value)) validInput(input);
            break;
        case "telephone":
            if (TELE_REGEX.test(input.value)) validInput(input);
            break;
        default:
            if (!validity.valueMissing) validInput(input);
            break;
    }
});

$form.on("click", "button", () => {
    for (let input of $form.children("input")) {
        if (input.validity.valueMissing) {
            invalidInput(input, "missing");
        } else {
            invalidFormat(input);
        }
    }
});
