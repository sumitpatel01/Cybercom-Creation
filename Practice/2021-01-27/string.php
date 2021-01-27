<?php

$string = 'sumit';
$string_length = strlen($string);

echo $string_length;

$str1 = 'SuMiT';

echo strtolower($str1);
echo strtoupper($str1);

if (isset($_GET['txt']) && !empty($_GET['txt'])) {
    echo $username = $_GET['txt'];
    $username_lc = strtolower($username);

    if ($username_lc == 'sumit'){
        echo "you are the best";
    }
}

?>

<form action="string.php" method="GET">
    <input type="text" name="txt" id="">
    <input type="submit" value="submit">
</form>