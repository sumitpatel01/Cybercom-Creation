<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Global variable and function</title>
</head>
<body>
    <?php
        $user_ip = $_SERVER['REMOTE_ADDR'];

        function echo_ip(){
            global $user_ip;
            $string = 'your ip address is'. $user_ip;
            echo $string;
        }

        echo_ip();
    ?>
</body>
</html>