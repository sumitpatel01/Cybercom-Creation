<?php

$fptr = "myname.txt";

if (file_exists($fptr)) {
   echo "exists";
} else {
echo "not exists";
$handle = fopen("$ptr", "w");
fwrite($handle , 'nothing');
fclose($handle);

// delete file
unlink("myname.txt");
}

// rename

$filename = "sumit.txt";

$rand = rand(1000,9999);

if (rename($filename, $rand .'txt') {
    echo "file is renamed";
} else {
    echo 'error';
}

?>
