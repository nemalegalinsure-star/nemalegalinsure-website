<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data with validation
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $interest = trim($_POST['interest']);
    $message = trim($_POST['message']);

    // Basic validation
    if (empty($name) || empty($email) || empty($message)) {
        die("Please fill in all required fields.");
    }

    // Prepare email
    $to = "nemalegals@gmail.com"; // Replace with your email
    $subject = "New Contact Form Submission";

    $body = "Name: $name\n";
    $body .= "Email: $email\n";
    $body .= "Phone: $phone\n";
    $body .= "Interest: $interest\n";
    $body .= "Message:\n$message";

    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Send email
    if (mail($to, $subject, $body, $headers)) {
        echo "Thank you for contacting us!";
    } else {
        echo "There was an error sending your message.";
    }
} else {
    echo "Invalid request.";
}
?>