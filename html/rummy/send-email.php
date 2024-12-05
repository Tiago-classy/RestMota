<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $fname = $_POST['fname'] ?? '';
    $lname = $_POST['lname'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $message = $_POST['message'] ?? '';

    $mail = new PHPMailer(true);

    try {

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'playrummy.live@gmail.com'; 
        $mail->Password = 'jcjlwgkcfivylojp';      
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;

        $mail->setFrom('playrummy.live@gmail.com', 'Play Rummy');
        $mail->addAddress('samuel.filipe.ribeiro@gmail.com', 'Samuel Ribeiro'); 
        $mail->addReplyTo($email, $name); 

        $mail->isHTML(true);
        $mail->Subject = 'New Contact Form Submission';
        $mail->Body = "<h2>New Message from Contact Form</h2>
                       <p><strong>First Name:</strong> $fname</p>
                       <p><strong>Last Name:</strong> $lname</p>
                       <p><strong>Email:</strong> $email</p>
                       <p><strong>Phone:</strong> $phone</p>
                       <p><strong>Message:</strong><br>$message</p>";
        $mail->AltBody = "Name: $name\nEmail: $email\nMessage:\n$message";

        $mail->send();

        echo json_encode(['status' => 'success', 'message' => 'Message sent successfully.']);
    } catch (Exception $e) {

        echo json_encode(['status' => 'error', 'message' => "Mailer Error: {$mail->ErrorInfo}"]);
    }
} else {

    echo json_encode(['status' => 'error', 'message' => 'Invalid request.']);
}
?>