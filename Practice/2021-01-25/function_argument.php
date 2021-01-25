<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Function with arguments</title>
</head>
<body>
    <?php

    $num1 = 10;
    $num2 = 5;
    $day = 25;
    $month = 'january';
    $year = 2021;

    function addition($number1,$number2){
        echo $number1 + $number2;
        echo '<br>';
    }

    addition($num1,$num2);

    function displayDate($day,$month,$year){
        echo $day.' '.$month.' '.$year;
    }

    displayDate($day,$month,$year);


    ?>
</body>
</html>