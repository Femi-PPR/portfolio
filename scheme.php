<!DOCTYPE html>
<html lang="en">
<?php include 'inc/head.php' ?>

<body>
    <?php include 'inc/closing-bg.php' ?>
    <div class="content">
        <?php
        $currentPage = 'scheme';
        include 'inc/sidebar.php';
        ?>
        <div class="">
            <main class="main-content">
                <?php
                $bannerText = "<h1>SCS Scheme</h1>";
                $scrollTo = "#scheme";
                require 'inc/banner.php';
                ?>
                <div id="scheme" class="scheme-main container">
                    <div class="scs-scheme">
                        <h2>Introduction to Scion Coalition Scheme</h2>
                        <p>The Scion Coalition Scheme is an intensive, specially tailored training program run by
                            Netmatters in order to give willing candidates the opportunity to enter the industry as web
                            developers. Under the supervision of senior web developers, scions generally aim to complete
                            training within six to nine months. The course is intensive and therefore the level of
                            learning achieved is extensive in a short space of time.</p>
                    </div>
                    <div class="scheme-cards">
                        <div class="treehouse">
                            <div class="logo">
                                <i class="treehouse-logo"></i>
                            </div>
                            <div class="text">
                                <h2>Treehouse</h2>
                                <p>Treehouse is an online learning community, featuring videos covering a number of
                                    topics from basic HTML to C# programming, iOS development, data analysis, and more.
                                    By completing courses users can earn points, allowing them to track their progress
                                    and see how much they've covered in certain areas.</p>
                                <p>Current Score: 10,468</p>
                                <a href="https://teamtreehouse.com/profiles/olorunfemioladapo" target="_blank">Find out
                                    more <i class="icon-rarrow"></i></a>
                            </div>
                        </div>
                        <div class="netmatters">
                            <div class="logo">
                                <i class="netmatters-logo"></i>
                            </div>
                            <div class="text">
                                <h2>About Netmatters</h2>
                                <ul>
                                    <li>Established in 2008</li>
                                    <li>Norfolk's leading technology company</li>
                                    <li>Winner of the Princess Royal Training Award</li>
                                    <li>Winner of EDP Skills of Tomorrow Award</li>
                                    <li>80+ staff, 2 locations across Norfolk</li>
                                    <li>Digital Marketing, Website & Software development & IT Support</li>
                                    <li>Broad spectrum of clients, working nationwide</li>
                                    <li>Operate to strict company values</li>
                                </ul>
                                <a href="https://www.netmatters.co.uk/" target="_blank">Find out more <i
                                        class="icon-rarrow"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="btm-scroll container">
                        <a href="#banner" class="scroll-text"><i class="fa-chevron-up"></i> <br> Back To Top </a>
                    </div>
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
    <script src="js/mobileSidebar.js"></script>
</body>

</html>