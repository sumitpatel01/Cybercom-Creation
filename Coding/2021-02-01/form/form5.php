<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/form5.css">
    <title>form5</title>
</head>
<body>
    <div class="container">
        <div class="label">
          Sign IN
        </div>
        <div class="form">
        <table>
        <form action="form5.php" method="post" onsubmit="return validate()">
            <tr>
                <td>E-mail address</td>
            </tr>
            <tr>
                <td>
                <input type="email" name="email" id="email" placeholder="mail@address.com">
                <div class="error" id="emailErr"></div>
                </td>
            </tr>
            <tr>
                <td>Password</td>
            </tr>
            <tr>
                <td>
                <input type="password" name="password" id="password">
                <div class="error" id="passErr"></div>
                </td>
            </tr>
            <tr>
                <td>
                <input type="submit" name="submit" value="sign in">
                </td>
            </tr>
            </form>
        </table>
        </div>
    </div>
    <script src="js/form5.js"></script>
    <?php

    
    if(isset($_POST['submit'])){
        
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        echo "<table class=\"tab\"><tr><th colspan=\"2\">";
        echo "Your form details:</th>";
            echo '<tr><td>email</td><td>'. $email .'</td></tr><tr><td>password</td><td>'. $password .'</td></tr></table>';
            

    }

    ?>
</body>
</html>