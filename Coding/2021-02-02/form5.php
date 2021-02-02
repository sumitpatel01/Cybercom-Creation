<?php

    $email = "";
    $password = "";

    $emailErr = $passErr = "";

    $table_content = "";

    if (isset($_POST['submit'])) {

        $email = $_POST['email'];
        $password = $_POST['password'];
        
        function filterEmail($field){
            // Sanitize e-mail address
            $field = filter_var(trim($field), FILTER_SANITIZE_EMAIL);
            
            // Validate e-mail address
            if(filter_var($field, FILTER_VALIDATE_EMAIL)){
                return $field;
            } else{
                return FALSE;
            }
        }

        if(empty($email)){
            $emailErr = "Please enter your email address.";     
        } else{
            $email = filterEmail($email);
            if($email == FALSE){
                $emailErr = "Please enter a valid email address.";
            } else {
                $emailErr = "";
            }
        }

        if (empty($password)) {
            $passErr = "Please enter your password.";      
        } else if (strlen($password) < 8){
            $passErr = "password must be 8 charactor"; 
        } else {
            $passErr = "";
        }
        
       if (!empty($email) && !empty($password)) {
           if (!$emailErr && !$passErr) {
                $table_content = "<table class=\"tab\"><tr><th colspan=\"2\">"."Your form details:</th>".'<tr><td>email</td><td>'. $email .'</td></tr><tr><td>password</td><td>'. $password .'</td></tr></table>';
            }
       }
            

    }

    ?>
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
                <input type="email" name="email" id="email" placeholder="mail@address.com" value="<?php echo $email; ?>">
                <div class="error" id="emailErr"><?php echo $emailErr; ?></div>
                </td>
            </tr>
            <tr>
                <td>Password</td>
            </tr>
            <tr>
                <td>
                <input type="password" name="password" id="password" value="<?php echo $password; ?>">
                <div class="error" id="passErr"><?php echo $passErr; ?></div>
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
        <div>
            <?php echo $table_content; ?>
        </div>
    </div>
    <script src="js/form5.js"></script>
    
</body>
</html>