<!DOCTYPE html>
<html lang="en">

<?php include 'inc/head.php' ?>

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
                        <div class="nav-tabs">
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
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <!-- <script src="js/apps.js"></script> -->
    <script src="js/variables.js"></script>
    <script src="js/banner.js"></script>
    <script src="js/examplesSlider.js"></script>
    <script src="js/mobileSidebar.js"></script>
</body>

</html>