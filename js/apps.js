//---------------------- Form Validation ---------------------------------------
const $form = $(".contact-form");

const inputText = {
    fname : "first name",
    lname : "last name",
    email : "email address",
}

function invalidInput(input){
    if(input.validity.valueMissing){
        let msg = Object.hasOwn(inputText, input.id)? `Please enter in your ${inputText[input.id]}` : "Please fill in this field";
        input.setCustomValidity(msg);
    }

    $(input).css({"outline": "2px solid #B80000"});

}

$form.on("input", "input", (event) => {
    let validity = event.target.validity;
    if(!validity.valueMissing && !validity.typeMismatch){
        event.target.setCustomValidity("");
        $(event.target).removeAttr("style");
    }
});

$form.on("click", "button", () => {
    for(let input of $form.children("input")){
        if(!input.validity.valid){
            invalidInput(input);
        }
    }
});
let bg = "linear-gradient(-45deg, #ebd9b4 0 25%, transparent 0 50%), linear-gradient(-225deg, #ebd9b4 0 25%, transparent 0 50%), linear-gradient(225deg, #9dbc98 0 25%, transparent 0 50%), linear-gradient(45deg, #9dbc98 0 25%, transparent 0 50%);";


$(".sidebar").hide();
$(".main-content").css({"margin": "0px","width":"100%"});
$(".spectrum-background").on("click", () => {
    console.log("clicked");
    document.querySelector(".spectrum-background").style.background = "linear-gradient(-45deg, #ebd9b4 0 25%, transparent 0 50%), linear-gradient(-225deg, #ebd9b4 0 25%, transparent 0 50%), linear-gradient(225deg, #9dbc98 0 25%, transparent 0 50%), linear-gradient(45deg, #9dbc98 0 25%, transparent 0 50%);";

})