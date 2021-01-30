<?php

// w stands for writing
// r reading
// a append

// $handle = fopen('text,txt', 'w');
// fwrite($handle , 'sumit'."\n");
// fwrite($handle , 'smit');

// fclose($handle);

readfile("myfile.txt");

$fptr = fopen('myfile.txt', 'r');

if (!$fptr) {
   die('could not find the file');
}

$content = fread($fptr, filesize('myfile.txt'));
echo $content;
fclose($fptr);

?>