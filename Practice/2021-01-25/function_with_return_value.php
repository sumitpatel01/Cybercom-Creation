<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Function with return value</title>
</head>
<body>
    <?php

        function add($number1, $number2){
            $result = $number1 + $number2;
            return $result;
        }

        function divide($number1, $number2){
            $result = $number1 / $number2;
            return $result;
        }

        $sum = divide(add(10,10), add(5,5));
        echo $sum;
    ?>
</body>
</html>