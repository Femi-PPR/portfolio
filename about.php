<!DOCTYPE html>
<html lang="en">

<?php
$title = "About Me | Femi's Portfolio";
$metaDesc = "Greetings! I'm Olorunfemi, also known as Femi. I'm a 2023 graduate from the University of Edinburgh with a BSc Honours in Computer Science and Mathematics. My passion lies in technology, data, and hands-on learning. Let's collaborate on exciting projects! Contact me today.";
include 'inc/head.php';
?>

<body>
    <?php include 'inc/closing-bg.php' ?>
    <div class="content">
        <?php
        $currentPage = 'about';
        include 'inc/sidebar.php';
        ?>
        <div class="">
            <main class="main-content">
                <?php
                $bannerText = "<h1>About Me</h1>";
                $scrollTo = "#about";
                require 'inc/banner.php';
                ?>
                <section id="about" class="about-main">
                    <div class="about container">
                        <div class="about-text">
                            <h2><em>Greetings</em></h2>
                            <p>
                                My name is Olorunfemi Oladapo, but you can call me Femi. I recently graduated in 2023
                                from the University of Edinburgh with a BSc Honours in Computer Science and Mathematics.
                                During my time at university, I gained a solid foundation in computer science and
                                mathematics, but I never got the chance to explore web development in depth. That's why
                                I joined the <a href="scheme.php" class="closing-link">SCS Scheme</a> by Netmatters,
                                where I honed my skills in web development and gained valuable experience.
                            </p>
                            <p>
                                I am passionate about technology and data, and I am always looking for new ways to learn
                                and grow. I believe that the best way to learn is by doing, and I am excited to apply my
                                skills to real-world projects. If you're interested in working together or just want to
                                chat, please don't hesitate to <a href="index.php#contact" class="closing-link">contact
                                    me</a>.
                            </p>
                        </div>
                        <aside class="about-tech">
                            <h3>Skills:</h3>
                            <ul class="about-tech-list">
                                <li><i class="item-html"></i> HTML</li>
                                <li><i class="item-css"></i> CSS</li>
                                <li><i class="item-sass"></i> Sass</li>
                                <li><i class="item-java"></i> Java</li>
                                <li><i class="item-python"></i> Python</li>
                                <li><i class="item-r"></i> R</li>
                                <li><i class="item-sql"></i> SQL</li>
                                <li><i class="item-js"></i> JavaScript</li>
                                <li><i class="item-php"></i> PHP</li>
                                <li><i class="item-github"></i> Github</li>
                                <li><i class="item-vs-code"></i> VS Code</li>
                                <li><i class="item-jet-brains"></i> Jet Brains</li>
                            </ul>
                        </aside>
                    </div>
                    <div class="btm-scroll container">
                        <a href="#banner" class="scroll-text"><i class="fa-chevron-up"></i> <br> Back To Top </a>
                    </div>
                </section>
            </main>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/highlight.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="js/variables.js"></script>
    <script src="js/banner.js"></script>
    <script src="js/mobileSidebar.js"></script>
</body>

</html>