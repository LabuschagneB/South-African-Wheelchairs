<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $phone = htmlspecialchars($_POST['phone']);
    $products = htmlspecialchars($_POST['products']);
    $message = htmlspecialchars($_POST['message']);
    $email = htmlspecialchars($_POST['email']);
    
    $to = "bryanlabuschagne@gmail.com";
    
    $email_subject = "Online Contact Form: " . $name;

    $email_message = "You have received a new message from your website contact form.\n\n";
    $email_message .= "Name: " . $name . "\n";
    $email_message .= "Phone: " . $phone . "\n";
    $email_message .= "Email: " . $email . "\n";
    $email_message .= "Products: " . $products . "\n";
    $email_message .= "Message:\n" . $message . "\n";

    $from = "accounts@sawheelchairs.co.za";

    $headers = "From: " . $from . "\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();

    // Send email and redirect based on success
    if (mail($to, $email_subject, $email_message, $headers, "-f" . $from)) {
        // Redirect to thank-you.html on success
        header("Location: thank-you.html");
        exit();
    } else {
        // Redirect back to the form with an error parameter on failure
        header("Location: contact.php?error=1");
        exit();
    }
}

// Only show the form if it's not a POST request
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8" />
    <title>South African Wheelchairs | Your trusted partner in mobility</title>
    <meta name="format-detection" content="telephone=no">
    <meta name="theme-color" content="#002395">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="#002395">
    <meta name="apple-mobile-web-app-title" content="South African Wheelchairs">
    <meta name="msapplication-TileColor" content="#002395">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="robots" content="noindex, nofollow">
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 text-center">
            <?php if (isset($_GET['error'])): ?>
            <div class="error-message">
                There was an issue sending your message. Please try again.
            </div>
            <?php endif; ?>
            <!-- Your contact form HTML goes here -->
        </div>
    </div>
</div>

</body>
</html>
