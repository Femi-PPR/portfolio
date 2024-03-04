<!DOCTYPE html>
<html lang="en">

<?php include 'inc/head.php' ?>

<body>
    <?php include 'inc/closing-bg.php' ?>
    <div class="content">
        <?php
        $currentPage = 'index';
        include 'inc/sidebar.php';
        ?>
        <div class="">
            <main class="main-content">
                <?php
                $bannerText = "<h1>My Name is Femi Oladapo</h1><p>I'm a Software Developer</p>";
                $scrollTo = "#portfolio";
                require 'inc/banner.php';
                ?>
                <section id="portfolio" class="portfolio">
                    <div class="container portfolio-container">
                        <h2 class="portfolio-title">My Projects</h2>
                        <div class="wrapper-portfolio">
                            <article class="portfolio-article">
                                <div class="project-image">
                                    <img src="images/backgrounds/netmatters-clone.png" width="555" height="300"
                                        alt="Netmatters Clone">
                                    <div class="project-description">
                                        <p>
                                            In this project I recreated the Netmatters Website using a combination of
                                            HTML, CSS, Sass and JavaScript for the front-end. Additionally, I used PHP
                                            for the backend.
                                        </p>
                                    </div>
                                    <div class="tech-stack">
                                        <i class="fab-html" title="HTML"></i>
                                        <i class="fab-css" title="CSS"></i>
                                        <i class="fab-sass" title="SASS"></i>
                                    </div>
                                </div>
                                <div class="project-text">
                                    <h3>Netmatters Clone</h3>
                                    <a href="https://netmatters.olorunfemi-oladapo.netmatters-scs.co.uk/"
                                        target="_blank">View Project <i class="icon-rarrow"></i></a>
                                </div>
                            </article>
                            <article class="portfolio-article">
                                <div class="project-image">
                                    <img src="images/backgrounds/js-array.png" width="450" height="300"
                                        alt="Random Image Generator">
                                    <div class="project-description">
                                        <p>
                                            In this project I created a random image generator using the Unsplash API.
                                            This project was styled with Tailwind CSS and JavaScript for the API calls.
                                        </p>
                                    </div>
                                    <div class="tech-stack">
                                        <i class="fab-html" title="HTML"></i>
                                        <i class="fab-css" title="CSS"></i>
                                        <i class="fab-sass" title="SASS"></i>
                                    </div>
                                </div>
                                <div class="project-text">
                                    <h3>Random Image Generator</h3>
                                    <a href="https://js-array.olorunfemi-oladapo.netmatters-scs.co.uk/"
                                        target="_blank">View Project <i class="icon-rarrow"></i></a>
                                </div>
                            </article>
                            <article>
                                <div class="project-image">
                                    <img src="images/backgrounds/coming-soon.jpg" width="450" height="300"
                                        alt="Netmatters Clone">
                                    <span class="wip-project"></span>
                                </div>
                                <div class="project-text">
                                    <h3>Project 3</h3>
                                    <a href="">View Project <i class="icon-rarrow"></i></a>
                                </div>
                            </article>
                            <article>
                                <div class="project-image">
                                    <img src="images/backgrounds/coming-soon.jpg" width="450" height="300"
                                        alt="Netmatters Clone">
                                    <span class="wip-project"></span>
                                </div>
                                <div class="project-text">
                                    <h3>Project 4</h3>
                                    <a href="">View Project <i class="icon-rarrow"></i></a>
                                </div>
                            </article>
                            <article>
                                <div class="project-image">
                                    <img src="images/backgrounds/coming-soon.jpg" width="450" height="300"
                                        alt="Netmatters Clone">
                                    <span class="wip-project"></span>
                                </div>
                                <div class="project-text">
                                    <h3>Project 5</h3>
                                    <a href="">View Project <i class="icon-rarrow"></i></a>
                                </div>
                            </article>
                            <article>
                                <div class="project-image">
                                    <img src="images/backgrounds/coming-soon.jpg" width="450" height="300"
                                        alt="Netmatters Clone">
                                    <span class="wip-project"></span>
                                </div>
                                <div class="project-text">
                                    <h3>Project 6</h3>
                                    <a href="">View Project <i class="icon-rarrow"></i></a>
                                </div>
                            </article>
                        </div>
                    </div>
                </section>
                <section id="contact" class="contact">
                    <div class="container contact-container">
                        <div class="contact-text">
                            <h2>Get In Touch</h2>
                            <p>
                                Feel free to reach out and connect — I'm always eager to discuss new opportunities,
                                collaborations, or simply have a chat. you may contact me directly at
                            </p>
                            <p><strong>
                                    <a href=""><i class="fa-phone"></i> 000 000 0000</a>
                                    <br>
                                    <a href=""><i class="fa-email"></i> email@gmanmail.com</a>

                                </strong></p>
                            <p> You may also drop me a message using the contact form!</p>
                        </div>
                        <div class="contact-wrapper">
                            <form class="contact-form" method="post" action="#contact">
                                <?php
                                require_once "inc/validate.php";
                                // require_once 'inc/conn.php';
                                $errMsgs = [
                                    "fname" => [
                                        "required" => "The name field is required."
                                    ],
                                    "lname" => [
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
                                ];
                                $successMsg = 'Your message has been sent!';
                                $checkboxID = "privacy-contact";
                                $allSet = allPostNamesSet(array_keys($errMsgs));
                                $alertMsgs = getAlertMsgs($errMsgs, $successMsg);
                                $failed = count($alertMsgs) > 0 && $alertMsgs[0]['type'] == 'error';
                                if ($allSet && !$failed) {
                                    $data = [
                                        'fname' => filter_input(INPUT_POST, 'fname', FILTER_SANITIZE_STRING),
                                        'lname' => filter_input(INPUT_POST, 'lname', FILTER_SANITIZE_STRING),
                                        'email' => filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL),
                                        'telephone' => filter_input(INPUT_POST, 'telephone', FILTER_SANITIZE_STRING),
                                        'msg' => filter_input(INPUT_POST, 'msg', FILTER_SANITIZE_STRING),
                                        'subject' => $_POST['subject'] === '' ? "No Subject" : filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_STRING),
                                    ];
                                    $msg = "Name: " . $data["fname"] . " " . $data["lname"] . "\n";
                                    $msg .= "Email: " . $data["email"] . "\n";
                                    $msg .= "Message: " . $data["msg"] . "\n";
                                    mail('femiportfoliocontacts@gmail.com', $data['subject'], $msg);
                                }
                                require "inc/msg-area.php";
                                ?>
                                <input name="fname" id="fname" type="text" placeholder="First Name *"
                                    value="<?= (isset($_POST['fname']) && $failed) ? htmlspecialchars($_POST['fname']) : '' ?>"
                                    required>
                                <input name="lname" id="lname" type="text" placeholder="Last Name *"
                                    value="<?= (isset($_POST['lname']) && $failed) ? htmlspecialchars($_POST['lname']) : '' ?>"
                                    required>
                                <input name="email" id="email" type="text" placeholder="Email *"
                                    value="<?= (isset($_POST['email']) && $failed) ? htmlspecialchars($_POST['email']) : '' ?>"
                                    required>
                                <input name="telephone" id="telephone" type="text" placeholder="Telephone *"
                                    value="<?= (isset($_POST['telephone']) && $failed) ? htmlspecialchars($_POST['telephone']) : '' ?>"
                                    required>
                                <input name="subject" id="subject" type="text" placeholder="Subject"
                                    value="<?= (isset($_POST['subject']) && $failed) ? htmlspecialchars($_POST['subject']) : '' ?>">
                                <textarea name="message" id="message" cols="30" rows="10"
                                    placeholder="Message"><?= (isset($_POST['message']) && $failed) ? htmlspecialchars($_POST['message']) : '' ?></textarea>
                                <div class="submit-wrapper">
                                    <button id="submit">Submit</button>
                                    <span>* Required Fields</span>
                                </div>
                            </form>
                        </div>
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
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="js/alerts.js"></script>
    <script src="js/variables.js"></script>
    <script src="js/banner.js"></script>
    <script src="js/mobileSidebar.js"></script>
    <script src="js/validate.js"></script>
</body>

</html>