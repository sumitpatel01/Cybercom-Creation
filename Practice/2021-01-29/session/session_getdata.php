<?php

session_start();

if (isset($_SESSION['username'])) {
echo 'your name is '.$_SESSION['username'].'your password is'. $_SESSION['password'];
} else {
    echo "please login to continue";
}

?>