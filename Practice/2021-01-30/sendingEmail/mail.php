<?php
$to = 'sumitpatel41306@gmail.com';
$subject = "this is email";
$body = 'this is test email\n\n hope you get it';
$headers = 'From: sapoliyasumit5674@gmail.com';

if (mail($to, $subject, $body, $headers)) {
    echo 'sent';
} else {
    echo 'there was an error';
};
?>