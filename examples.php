<!DOCTYPE html>
<html lang="en">

<?php
$title = "Coding Examples | Femi's Portfolio";
$metaDesc = "Dive into my coding examples: Here you'll find practical code snippets used in my software projects. As a software developer, I showcase experiences in JavaScript, PHP, and more.";
include 'inc/head.php'
    ?>

<body>
    <?php include 'inc/closing-bg.php' ?>
    <div class="content">
        <?php
        $currentPage = 'examples';
        include 'inc/sidebar.php';
        ?>
        <div class="">
            <main class="main-content">
                <?php
                $bannerText = "<h1>Coding Examples</h1>";
                $scrollTo = "#examples";
                require 'inc/banner.php';
                ?>
                <section id="examples" class="coding-examples">
                    <div class="container">
                        <h2 class="example-title">Banner Background Animation</h2>
                        <p class="example-description">This is the code for performing the opening banner animation for
                            when you navigate between
                            page on this portfolio</p>
                        <div class="nav-tabs paging-background">
                            <div class="nav-tab">
                                <div class="code-desciption">
                                    <p>This HTML code sets up a basic structure for a banner background with separate
                                        elements representing each corner.</p>
                                </div>
                                <pre>
                                    <code class="language-html">
&lt;div class="banner-bg"&gt;
    &lt;span class="banner-bg-tl"&gt;&lt;/span&gt;
    &lt;span class="banner-bg-tr"&gt;&lt;/span&gt;
    &lt;span class="banner-bg-bl"&gt;&lt;/span&gt;
    &lt;span class="banner-bg-br"&gt;&lt;/span&gt;
&lt;/div&gt;
                                    </code>
                                </pre>
                            </div>
                            <div class="nav-tab">
                                <div class="code-desciption">
                                    <p>This Sass code defines styles for different banner background elements using Sass
                                        variables, mixins, and CSS properties.</p>
                                </div>
                                <pre><code class="language-scss">
$bg-properties: (
    ".banner-bg-br": (
        "deg": -45deg, "colour": $colour-prim-drkr, "bg-x": 50%, "bg-y": 50%,
    ),
    ".banner-bg-bl": (
        "deg": 45deg, "colour": $colour-second, "bg-x": 0%, "bg-y": 100%,
    ),
    ".banner-bg-tr": (
        "deg": 225deg, "colour": $colour-second, "bg-x": 100%, "bg-y": 0%,
    ),
    ".banner-bg-tl": (
        "deg": -225deg, "colour": $colour-prim-drkr, "bg-x": 50%, "bg-y": 50%,
    ),
);

@mixin bg-styles($deg, $colour, $x, $y){
    width: 100%;
    height: 100%;
    background: linear-gradient( $deg, $colour 25%, transparent 25%);
    background-size: 200% 200%;
    background-position: $x $y;
}

.banner-bg{
    isolation: isolate;
    z-index: 1;
}

@each $bg, $prop in $bg-properties{
    #{$bg}{
        position: absolute;
        top: 0;
        left: 0;
        mix-blend-mode: multiply;
        @include bg-styles(
            map-get($prop, "deg"),
            map-get($prop, "colour"),
            map-get($prop, "bg-x"),
            map-get($prop, "bg-y"),
        );
    }
}
                                </code></pre>
                            </div>
                            <div class="nav-tab">
                                <div class="code-desciption">
                                    <p>This JavaScript code animates the positions of background banner elements on a
                                        webpage, transitioning them to open up when the page is loaded.</p>
                                </div>
                                <pre><code class="language-js">
const bannerBGs = {
  "banner-bg-tl": { endX: "25%", endY: "25%" },
  "banner-bg-tr": { endX: "75%", endY: "25%" },
  "banner-bg-br": { endX: "75%", endY: "75%" },
  "banner-bg-bl": { endX: "25%", endY: "75%" },
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
  addBGAnimation(bannerBGs);
});
                            </code></pre>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <h2 class="example-title">Server Side Validation</h2>
                        <p class="example-description">This code was used to perform server side validation for the
                            Netmatters Clone project</p>
                        <div class="nav-tabs paging-server-side">
                            <div class="nav-tab">
                                <div class="code-desciption">
                                    <p>This PHP code serves to dynamically generate HTML markup for displaying alert
                                        messages on a webpage. It adapts the displayed alert based on the type
                                        specified.</p>
                                </div>
                                <pre>
                                    <code class="language-php">
&lt;?php

function dispAlert(string $type, string $message): string
{
    $alertClass = "";
    switch ($type) {
        case "success":
            $alertClass = "alert-success";
        case "warning":
            $alertClass = "alert-warning";
        case "error":
            $alertClass = "alert-error";
        default:
            throw new Exception("Unkown alert type given.");
    }

    return '&lt;div class="alert ' . $alertClass . "\"&gt;\n"
        . '    ' . $message . "\n"
        . '    &lt;button type="button" class="close" onclick="dismissAlert(event)"&gt;×&lt;/button&gt;' . "\n"
        . '&lt;/div&gt;';
}

if (!isset($alertMsgs))
    $alertMsgs = [["type" => "success", "msg" => "Success"]];
?&gt;

&lt;div class="message-area"&gt;
    &lt;?php
    foreach ($alertMsgs as $alertMsg) {
        echo dispAlert($alertMsg["type"], $alertMsg["msg"]);
    }
    ?&gt;
&lt;/div&gt;
                                    </code>
                                </pre>
                            </div>
                            <div class="nav-tab">
                                <div class="code-desciption">
                                    <p>This PHP code performs form validation and generate alert messages
                                        based on the validation results.</p>
                                </div>
                                <pre><code class="language-php">
&lt;?php
const EMAIL_REGEX = "/^(([^<>()\[\]\.,;:\s@\"]+(.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z-0-9]+\.)+[a-zA-Z]{2,}))$/";
const TELE_REGEX = "/^((?:\+|00)[17](?: |-)?|(?:\+|00)[1-9]\d{0,2}(?: |-)?|(?:\+|00)1-\d{3}(?: |-)?)?(0\d|([0-9]{3})|[1-9]{0,3})(?:((?: |-)[0-9]{2}){4}|((?:[0-9]{2}){4})|((?: |-)[0-9]{3}(?: |-)[0-9]{4})|([0-9]{7}))$/";

function validFormat(string $name, string $value): bool
{
    switch ($name) {
        case 'email':
            return preg_match(EMAIL_REGEX, $value);
        case 'telephone':
            return preg_match(TELE_REGEX, $value);
        default:
            return true;
    }
}

function allPostNamesSet(array $postNames): bool
{
    foreach ($postNames as $postName) {
        if (!isset($_POST[$postName])) {
            return false;
        }
    }
    return true;
}

function getAlertMsgs(array $errMsgs, string $successMsg): array
{
    $alertMsgs = [];
    if (!allPostNamesSet(array_keys($errMsgs)))
        return $alertMsgs;
    $allValid = true;
    foreach ($errMsgs as $name => $errorMsg) {
        if (isset($_POST[$name])) {
            if (isset($errorMsg["required"]) && $_POST[$name] === "") {
                $alertMsgs[] = ["type" => "error", "msg" => $errorMsg["required"]];
                $allValid = false;
            } elseif (isset($errorMsg["format"]) && !validFormat($name, $_POST[$name])) {
                $alertMsgs[] = ["type" => "error", "msg" => $errorMsg["format"]];
                $allValid = false;
            }
        }
    }
    if ($allValid) {
        $alertMsgs[] = ["type" => "success", "msg" => $successMsg];
    }

    return $alertMsgs;
}
                                </code></pre>
                            </div>
                            <div class="nav-tab">
                                <div class="code-desciption">
                                    <p>This is the PHP code that is used to handle form
                                        submission and validation for the contact us form for the Netmatters clone site.
                                    </p>
                                </div>
                                <pre><code class="language-php">
&lt;?php
require_once "inc/validate.php";
$errMsgs = [
    "name" => [
        "required" => "The name field is required."
    ],
    "email" => [
        "required" => "The email field is required.",
        "format" => "The email format is invalid."
    ],
    "telephone" => [
        "required" => "The telephone field is required.",
        "format" => "The telephone format is invalid."
    ],
    "msg" => [
        "required" => "The message field is required.",
    ],
];
$successMsg = 'Your message has been sent!';
$alertMsgs = getAlertMsgs($errMsgs, $successMsg);
require "inc/msg-area.php";
                            </code></pre>
                            </div>
                        </div>
                    </div>
                </section>
                <div class="btm-scroll container">
                    <a href="#banner" class="scroll-text"><i class="fa-chevron-up"></i> <br> Back To Top </a>
                </div>
            </main>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/highlight.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="js/variables.js"></script>
    <script src="js/banner.js"></script>
    <script src="js/examplesSlider.js"></script>
    <script src="js/mobileSidebar.js"></script>
</body>

</html>