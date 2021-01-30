<?php

if (isset($_POST['password']) && !empty($_POST['password'])) {

    $password = md5(($_POST['password']));
    // echo $password;

    $filename = 'password.txt';
    $fptr = fopen($filename, 'r');
    $file_password = fread($fptr, filesize($filename));
    fclose($fptr);

    if ($password == $file_password) {
        echo "success.";
    } else {
        echo "incorrect password";
    }


} else {
    echo 'enter a password.';
}

?>

<form action="index.php" method="post">
    Password: <input type="text" name="password" id="password">
    <input type="submit" value="submit">
</form>