<?php
if (!isset($bannerText)) {
    $bannerText = "<h1>My Name is Femi Oladapo</h1><p>I'm a Software Developer</p>";

}
if (!isset($scrollTo)) {
    $scrollTo = '#portfolio';
}
?>


<div id="banner" class="banner">
    <div class="banner-bg">
        <span class="banner-bg-tl"></span>
        <span class="banner-bg-tr"></span>
        <span class="banner-bg-bl"></span>
        <span class="banner-bg-br"></span>
    </div>
    <div id="diamond" class="banner-text">
        <?= $bannerText ?>
    </div>
    <a href="<?= $scrollTo ?>" class="scroll-text">Scroll Down <br> <i class="fa-chevron-down"></i></a>
</div>