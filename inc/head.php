<head>
    <?php
    if (!isset ($metaDesc)) {
        $metaDesc = "Testsing";
    }
    if (!isset ($title)) {
        $title = "Femi's Portfolio";
    }

    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= $metaDesc ?>">
    <script>document.querySelector("html").className = "js";</script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/styles/default.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="shortcut icon" href="images/icons/favicon.ico">
    <title>
        <?= $title ?>
    </title>
</head>