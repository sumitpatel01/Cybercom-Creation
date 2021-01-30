<?php
if ($_POST('roll')) {
    $rand = rand();
    echo 'yoo rolled a '. $rand;
}
?>

<form action="random.php" method='POST'>
        <input type="submit" value="rolled" name='roll'>
</form>