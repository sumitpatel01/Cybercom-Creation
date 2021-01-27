<?php

$string = "this part don't search. jinay";

$find = array ('this', 'jinay');
$replace = array ('This', 'Sumit');

$string_new = substr_replace ($string , 'sumit', 24 , 5);

echo $string_new;

$new_string = str_replace ('sumit', 'jinay', $string_new);

echo $new_replace_with_array = str_replace ($find, $replace ,$string); 
?>