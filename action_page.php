<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize input
    $name = htmlspecialchars($_POST['Name']);
    $email = htmlspecialchars($_POST['Email']);
    $subject = htmlspecialchars($_POST['Subject']);
    $message = htmlspecialchars($_POST['Message']);

    // Set email parameters
    $to = "your-email@example.com";  // Replace with your email address
    $subject_email = "New Message from: $name";
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    // Format the message
    $message_email = "
    <html>
    <head>
    <title>$subject</title>
    </head>
    <body>
    <h2>New message from your website</h2>
    <p><strong>Name:</strong> $name</p>
    <p><strong>Email:</strong> $email</p>
    <p><strong>Subject:</strong> $subject</p>
    <p><strong>Message:</strong><br> $message</p>
    </body>
    </html>
    ";

    // Send the email
    if (mail($to, $subject_email, $message_email, $headers)) {
        echo "Message sent successfully!";
    } else {
        echo "Failed to send message!";
    }
}
?>
