<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $to = "nemalegals@gmail.com"; 
        $subject = "New Newsletter Subscription";
        $body = "A new user has subscribed to the newsletter.\nEmail: $email";

        $headers = "From: www.nemalegal.com\r\n"; 
        $headers .= "Reply-To: $email\r\n";

        if (mail($to, $subject, $body, $headers)) {
            echo "Thank you for subscribing!";
        } else {
            echo "Error sending your subscription.";
        }
    } else {
        echo "Invalid email address.";
    }
} else {
    echo "Invalid request.";
}
?>