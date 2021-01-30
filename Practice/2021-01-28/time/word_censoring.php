<?php

$find = array('sumit','smit','jinay');
$replace = array('s***t','s**t','j***y');

if (isset($_POST['user']) && !empty($_POST['user'])) {
    $user = $_POST['user'];
    $user_lc =strtolower($user);
    $user_new = str_replace($find, $replace, $use);

    echo $user_new;
}
?>
<hr>
<form action="word_censoring.php" method="post">
    <textarea name="user" id="user" cols="30" rows="10"></textarea><br><br>
    <input type="submit" value="submit">
</form>