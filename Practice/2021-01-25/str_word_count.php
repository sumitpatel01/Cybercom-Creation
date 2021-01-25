<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>String word count</title>
</head>
<body>
    <?php
        $str = 'my name is sumit.';

        $count = str_word_count($str,0, ' ');

        // here is three argument first one is the string variable, 
        // second is the what we want to get in the result 
        // and third is the what we will include in the word means 
        // if you don't pass any argument then it will by default none.and split the word count at space.

        print_r ($count);
        echo '<br>';

        $count = str_word_count($str,1,'.');

        print_r ($count);
        echo '<br>';

        $count = str_word_count($str,2);

        print_r ($count);
    ?>
</body>
</html>