<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>string function</title>
</head>
<body>
    <?php

        $str1 = "This is php tutorials";
        $str2 = "Hello, sumit here";

        // for string reverse:
        $result = strrev($str2);
        echo $result;


        // for check similarity
        $compare = similar_text($str1,$str2,$result);
        echo $compare;

        // returns the length of string
        $length = strlen($str1);
        echo $length;
    ?>
</body>
</html>