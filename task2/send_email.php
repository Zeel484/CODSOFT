<?php
$to = "recipient@example.com";
$subject = "🔥 Exciting Offers Just for You!";
$from = "sender@example.com";


$template = file_get_contents("email_template.html");


$template = str_replace("{{name}}", "John", $template);
$template = str_replace("{{message}}", "Get 30% off your next purchase. Limited time offer!", $template);
$template = str_replace("{{cta_link}}", "https://yourwebsite.com/offer", $template);


$headers  = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type: text/html; charset=UTF-8" . "\r\n";
$headers .= "From: " . $from . "\r\n";

if (mail($to, $subject, $template, $headers)) 
{
    echo "Email sent successfully!";
} 
else 
{
    echo "Failed to send email.";
}
?>
