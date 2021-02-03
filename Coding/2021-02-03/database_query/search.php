<?php

require 'connect.php';

if (isset($_POST['search_name'])) {
    $search_name = $_POST['search_name'];

    if (!empty($search_name)) {
    
    $sql = "SELECT * FROM `names` WHERE `name` LIKE '%$search_name%'";
    $sql_run = mysqli_query(mysqli_connect($hostname, $username, $password, $db),$sql);

    $num = mysqli_num_rows($sql_run);

    if ($num >= 1) {
        while($array = mysqli_fetch_assoc($sql_run)) {
            echo $array['name']."</br>";
        }
    } else {
        echo 'not found';
    }
}
    
}

?>

<form action="search.php" method="post">
    <input type="text" name="search_name" id="user">
    <input type="submit" value="submit">
</form>