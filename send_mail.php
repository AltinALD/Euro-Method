<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data and sanitize it
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $phone = htmlspecialchars($_POST["phone"]);
    $message = htmlspecialchars($_POST["message"]);

    // Email recipient(s)
    $to = "altinejup@gmail.com"; // Main recipient

    // Email subject
    $subject = "Euro Method - Kontakt i ri nga $name";

    // Create PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        // SMTP configuration
        $mail->SMTPDebug = 0; // Change to 2 if debugging
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'presslogic36@gmail.com'; // Your Gmail
        $mail->Password = 'rxbm nqcd mcfd bpxh'; // App Password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Email headers
        $mail->setFrom('no-reply@euromethod.com', 'Euro Method Website');
        $mail->addAddress('altinejup@gmail.com');
        $mail->addAddress('erdrinejupi79@gmail.com');

        // Email content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = "
            <strong>Ju keni marrë një mesazh të ri nga formulari i kontaktit në Euro Method:</strong><br><br>
            <strong>Emri:</strong> $name<br>
            <strong>Email:</strong> $email<br>
            <strong>Telefoni:</strong> $phone<br>
            <strong>Mesazhi:</strong><br>$message
        ";

        $mail->send();

        // Redirect to thank you page
        header("Location: thank-you.html");
        exit();
    } catch (Exception $e) {
        echo "Mesazhi nuk u dërgua. Gabimi: {$mail->ErrorInfo}";
    }
} else {
    echo "Kërkesë e pavlefshme.";
}
?>
