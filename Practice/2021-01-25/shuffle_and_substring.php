<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>string shuffle and sub string</title>
</head>
<body>
    <?php
        $str = "This is php tutorials";

        // str_shuffle shuffle the characters in the string with the space.
        $str_shuffle = str_shuffle($str);

        echo $str_shuffle;
        echo '<br>';

        // substring is the function that gives us to the some lenths of the string
        // in this there are 3 parameters. first is the string
        // second is the start index and third is the index that we want length of sub string(not included).

        echo $sub = substr($str, 0 ,3);
    ?>
</body>
</html>