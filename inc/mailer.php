<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Dotenv\Dotenv;

//Load Composer's autoloader
require_once realpath(__DIR__ . "/../vendor/autoload.php");

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
$dotenv = Dotenv::createImmutable(realpath(__DIR__ . "/../"));
$dotenv->load();

try {
    $mail->isSMTP();
    $mail->Host = $_ENV["MAILER_HOST"];
    $mail->SMTPAuth = true;
    $mail->Username = $_ENV["MAILER_USER_NAME"];
    $mail->Password = $_ENV["MAILER_PASSWORD"];
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

} catch (Exception $e) {
    $alertMsgs = [
        [
            'type' => 'error',
            'msg' => "Message could not be sent. Mailer Error: {$mail->ErrorInfo}",
        ]
    ];
}