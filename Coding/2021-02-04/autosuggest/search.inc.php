<?php

$conn = mysqli_connect('localhost','root','','practice');


if (isset($_GET['search'])) {
    $search = $_GET['search'];

    if(!empty($search)) {
        if ($conn) {
            $sql = "SELECT * FROM `names` WHERE `name` LIKE '%".mysqli_real_escape_string($conn,$search)."%'";
            $query_run = mysqli_query($conn , $sql);

            while($array = mysqli_fetch_assoc($query_run)){
                echo $name = "<a href=\"anotherpage.php?search=".$array['name'].'">'.$array['name'].'</a><br>';
            }
        }
    }

}

?>