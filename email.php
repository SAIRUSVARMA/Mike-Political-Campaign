<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'src/PHPMailer.php';
require 'src/SMTP.php';
require 'src/Exception.php';

// Retrieve form data
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; // Your SMTP server (e.g., Gmail, Outlook, etc.)
    $mail->SMTPAuth = true;
    $mail->Username = 'durgaswt495@gmail.com'; // Your email address
    $mail->Password = 'lkfz jqqd iitz kzba'; // Your email password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Sender and recipient details
    $mail->setFrom($email, $name);
    $mail->addAddress('durgaswt495@gmail.com'); // Your destination email address

    // Content
    $mail->isHTML(true);
    $mail->Subject = 'New Contact Form Submission';
    $mail->Body = "Name: $name<br>Email: $email<br>Message: $message";

    $mail->send();
    echo 'Message has been sent successfully!';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
