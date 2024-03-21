<!DOCTYPE html>
<html lang="en">

<?php
$metaDesc = "Hi there! I'm a passionate software developer with a knack for turning ideas into elegant code. Explore my projects, skills, and journey in tech. Let's connect and build something amazing together!";
include 'inc/head.php';
?>

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
                                        <i class="fab-javascript" title="JavaScript"></i>
                                        <i class="i-php" title="PHP"></i>
                                    </div>
                                </div>
                                <div class="project-text">
                                    <h3>Netmatters Clone</h3>
                                    <div class="project-links">
                                        <a href="https://netmatters.olorunfemi-oladapo.netmatters-scs.co.uk/"
                                            target="_blank">View Project <i class="icon-rarrow"></i></a>
                                        <a href="https://github.com/Femi-PPR/netmatters-clone" target="_blank">View Code
                                            <i class="icon-rarrow"></i></a>
                                    </div>
                                </div>
                            </article>
                            <article class="portfolio-article">
                                <div class="project-image">
                                    <img src="images/backgrounds/js-array.png" width="450" height="300"
                                        alt="Random Image Generator">
                                    <div class="project-description">
                                        <p>
                                            In this project, I developed a random image generator utilizing the Unsplash
                                            API. The styling was implemented with Tailwind CSS, while JavaScript was
                                            used for handling API calls.
                                        </p>
                                    </div>
                                    <div class="tech-stack">
                                        <i class="fab-html" title="HTML"></i>
                                        <i class="fab-css" title="CSS"></i>
                                        <i class="i-tailwind" title="Tailwind CSS"></i>
                                        <i class="fab-javascript" title="JavaScript"></i>
                                    </div>
                                </div>
                                <div class="project-text">
                                    <h3>Random Image Generator</h3>
                                    <div class="project-links">
                                        <a href="https://js-array.olorunfemi-oladapo.netmatters-scs.co.uk/"
                                            target="_blank">View Project <i class="icon-rarrow"></i></a>
                                        <a href="https://github.com/Femi-PPR/js-array" target="_blank">View Code <i
                                                class="icon-rarrow"></i></a>
                                    </div>
                                </div>
                            </article>
                            <article class="portfolio-article">
                                <div class="project-image">
                                    <img src="images/backgrounds/manager.png" width="450" height="300" alt="Manager">
                                    <div class="project-description">
                                        <p>
                                            In this project, a website was developed to display information about
                                            companies and their employees, utilizing Laravel. Eloquent models were
                                            employed to structure the data. Laravel's Blade
                                            templates and Bootstrap were utilized to design and style the user
                                            interface.
                                        </p>
                                    </div>
                                    <div class="tech-stack">
                                        <i class="fab-html" title="HTML"></i>
                                        <i class="fab-css" title="CSS"></i>
                                        <i class="i-bootstrap" title="Bootstrap"></i>
                                        <i class="i-php" title="PHP"></i>
                                        <i class="i-laravel" title="Laravel"></i>
                                    </div>
                                </div>
                                <div class="project-text">
                                    <h3>Manager</h3>
                                    <a href="https://github.com/Femi-PPR/manager" target="_blank">View Code <i
                                            class="icon-rarrow"></i></a>
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
                                    <a href="tel:07535406561"><i class="fa-phone"></i> +447535406561</a>
                                    <br>
                                    <a href="mailto:femioladapo3@gmail.com"><i class="fa-email"></i>
                                        femioladapo3@gmail.com</a>

                                </strong></p>
                            <p> You may also drop me a message using the contact form!</p>
                        </div>
                        <div class="contact-wrapper">
                            <form class="contact-form" method="post" action="#contact">
                                <?php
                                require_once "inc/validate.php";

                                $errMsgs = [
                                    "fname" => [
                                        "required" => "Error: The name field is required."
                                    ],
                                    "lname" => [
                                        "required" => "Error: The name field is required."
                                    ],
                                    "email" => [
                                        "required" => "Error: The email field is required.",
                                        "format" => "Error: The email format is invalid."
                                    ],
                                    "telephone" => [
                                        "required" => "Error: The telephone field is required.",
                                        "format" => "Error: The telephone format is invalid."
                                    ],
                                ];
                                $successMsg = 'Success: Your information has been sent!';
                                $allSet = allPostNamesSet(array_keys($errMsgs));
                                $alertMsgs = getAlertMsgs($errMsgs, $successMsg);
                                require_once "inc/mailer.php";
                                require_once 'inc/conn.php';

                                $failed = count($alertMsgs) > 0 && $alertMsgs[0]['type'] == 'error';
                                if ($allSet && !$failed) {
                                    $data = [
                                        'fname' => htmlspecialchars($_POST['fname']),
                                        'lname' => htmlspecialchars($_POST['lname']),
                                        'email' => filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL),
                                        'telephone' => htmlspecialchars($_POST['telephone']),
                                        'subject' => empty ($_POST['subject']) ? "No Subject" : htmlspecialchars($_POST['subject']),
                                    ];

                                    if (!empty ($_POST['message']))
                                        $data['message'] = htmlspecialchars($_POST['message']);

                                    $msg = "<p><strong>Name:</strong> " . $data["fname"] . " " . $data["lname"] . "</p>";
                                    $msg .= "<p><strong>Email:</strong> " . $data["email"] . "</p>";
                                    $msg .= "<p><strong>Telephone:</strong> " . $data["telephone"] . "</p>";
                                    if (!empty ($_POST['message']))
                                        $msg .= "<p><strong>Message:</strong> " . $data["message"] . "</p>";

                                    $mail->setFrom('femiportfoliocontacts@gmail.com', 'PortfolioMailer');
                                    $mail->addAddress('femiportfoliocontacts@gmail.com');

                                    $mail->isHTML(true);
                                    $mail->Subject = "Portfolio Contact - " . $data['subject'];
                                    $mail->Body = wordwrap($msg, $width = 120, $break = "<br>");
                                    try {
                                        $mail->send();
                                    } catch (Exception $e) {
                                        $alertMsgs = [
                                            [
                                                'type' => 'error',
                                                'msg' => "Message could not be sent. Mailer Error: {$mail->ErrorInfo}",
                                            ]
                                        ];
                                    }

                                    $query = sprintf(
                                        'INSERT INTO Contacts (FirstName, LastName, Email, Telephone, Subject %s) VALUE (:fname, :lname, :email, :telephone, :subject %s)',
                                        empty ($_POST['message']) ? null : ', Message',
                                        empty ($_POST['message']) ? null : ', :message'
                                    );
                                    $stmt = $db->prepare($query);
                                    try {
                                        $stmt->execute($data);
                                    } catch (PDOException $e) {
                                        $alertMsgs = [
                                            [
                                                'type' => 'error',
                                                'msg' => $e->getMessage()
                                            ]
                                        ];
                                    }
                                }
                                require "inc/msg-area.php";
                                ?>
                                <input name="fname" id="fname" type="text" placeholder="First Name *"
                                    value="<?= (isset ($_POST['fname']) && $failed) ? htmlspecialchars($_POST['fname']) : '' ?>"
                                    required>
                                <input name="lname" id="lname" type="text" placeholder="Last Name *"
                                    value="<?= (isset ($_POST['lname']) && $failed) ? htmlspecialchars($_POST['lname']) : '' ?>"
                                    required>
                                <input name="email" id="email" type="text" placeholder="Email *"
                                    value="<?= (isset ($_POST['email']) && $failed) ? htmlspecialchars($_POST['email']) : '' ?>"
                                    required>
                                <input name="telephone" id="telephone" type="text" placeholder="Telephone *"
                                    value="<?= (isset ($_POST['telephone']) && $failed) ? htmlspecialchars($_POST['telephone']) : '' ?>"
                                    required>
                                <input name="subject" id="subject" type="text" placeholder="Subject"
                                    value="<?= (isset ($_POST['subject']) && $failed) ? htmlspecialchars($_POST['subject']) : '' ?>">
                                <textarea name="message" id="message" cols="30" rows="10"
                                    placeholder="Message"><?= (isset ($_POST['message']) && $failed) ? htmlspecialchars($_POST['message']) : '' ?></textarea>
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
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="js/alerts.js"></script>
    <script src="js/variables.js"></script>
    <script src="js/banner.js"></script>
    <script src="js/mobileSidebar.js"></script>
    <script src="js/validate.js"></script>
</body>

</html>