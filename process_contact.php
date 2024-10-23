<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
session_start(); // Make sure the session is started

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $mail = new PHPMailer(true);

    try {
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'suhailahmad.dbuu.ac@gmail.com';  // Replace with your email
        $mail->Password = 'pqvg wyzu xaie mzjv';  // Replace with your app password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Recipients
        $mail->setFrom($email, $name);
        $mail->addAddress('tech.suhail22@gmail.com'); // Recipient email

        // Email content
        $mail->isHTML(true);
        $mail->Subject = 'Contact Form Submission';
        $mail->Body = "<p><strong>Name:</strong> {$name}</p>
                       <p><strong>Email:</strong> {$email}</p>
                       <p><strong>Message:</strong><br>{$message}</p>";

        // Send email
        if ($mail->send()) {
            $_SESSION['msg'] = 'Message has been sent successfully.';
            $_SESSION['msg_type'] = 'success';
        } else {
            $_SESSION['msg'] = 'Message could not be sent. Please try again later.';
            $_SESSION['msg_type'] = 'error';
        }
    } catch (Exception $e) {
        $_SESSION['msg'] = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        $_SESSION['msg_type'] = 'error';
    }

    // Redirect back to contact page to show message
    header("Location: contact.php");
    exit();
}
