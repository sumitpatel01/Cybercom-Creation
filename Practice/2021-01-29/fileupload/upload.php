<?php

echo $name = $_FILES['file']['name'];
// echo $size = $_FILES['file']['size'];
echo $type = $_FILES['file']['type'];
$extention = strtolower(substr($name, strpos($name,'.'),+1));
$max_size = 100000;

echo $tmp_name = $_FILES['file']['tmp_name'];


if (isset($name)) {
   if (!empty($name)) {
    //    echo 'ok';
    if (($extention == 'jpeg' || $extention == 'jpeg') && $type == 'image/jpeg' && $size <= 200000 ) {
    $location = "uploads/";

    if (move_uploaded_file($tmp_name, $location.$name)) {
        echo "uploaded";
        }
    } else {
        echo 'there ws an error';
    };
   } else {
       echo 'please choose a file';
   }
}

?>

<form action="upload.php" method="post" enctype="multipart/form-data">
  <input type="file" name="file" id="file"><br>
  <input type="submit" value="submit">
</form>