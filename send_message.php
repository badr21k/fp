<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $message = htmlspecialchars($_POST['message']);

    // Set the recipient email address
    $to = "your-email@example.com";  // Replace with your email address

    // Set the email subject
    $subject = "New Message from Contact Form";

    // Build the email headers
    $headers = "From: " . $email . "\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    // Build the email body
    $email_body = "
    <html>
    <head>
    <title>New Message from Contact Form</title>
    </head>
    <body>
    <h2>New Message from Contact Form</h2>
    <p><strong>Name:</strong> {$name}</p>
    <p><strong>Email:</strong> {$email}</p>
    <p><strong>Phone Number:</strong> {$phone}</p>
    <p><strong>Message:</strong><br>{$message}</p>
    </body>
    </html>
    ";

    // Send the email
    if (mail($to, $subject, $email_body, $headers)) {
        echo "Message sent successfully!";
    } else {
        echo "Failed to send the message.";
    }
}
?>
