<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Email recipient and subject
    $to = 'pankaj250483@gmail.com';
    $subject = 'Form Submission';

    // Message header
    $message = "<html><body>";
    $message .= "<table style='border: 1px solid black;'>";
    $message .= "<tr><th style='border: 1px solid black;'>Field</th><th style='border: 1px solid black;'>Value</th></tr>";

    // Iterate over POST data and append to the message
    foreach ($_POST as $key => $value) {
        $message .= "<tr>";
        $message .= "<td style='border: 1px solid black;'>".htmlspecialchars($key)."</td>";
        $message .= "<td style='border: 1px solid black;'>".htmlspecialchars($value)."</td>";
        $message .= "</tr>";
    }

    // Message footer
    $message .= "</table>";
    $message .= "</body></html>";

    // Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    // More headers
    $headers .= 'From: <webmaster@merizo.co.uk>' . "\r\n";

    // Send the email
    if(mail($to,$subject,$message,$headers)) {
        echo 'Message sent successfully!';
    } else {
        echo 'Message sending failed.';
    }
}
?>
