<?php ob_start(); ?>
<h1>My Page</h1>
This is my Demo password_get_info
<?php

$redirect_page = "https://www.google.com";

$redirect = true;

if ($redirect == true) {
    header('Location: '.$redirect_page);
}

ob_end_flush();
?>