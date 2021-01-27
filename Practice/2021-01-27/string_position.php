<?php

$offset = 0;

$find = "is";
$find_length = strlen($find);

$string = 'this is a string and here is an example';

while ($string_position = strpos ($string ,$find,$offset)) {
    echo $find.' found at '.$string_position.'<br>';
    $offset = $string_position + 2;
};
?>