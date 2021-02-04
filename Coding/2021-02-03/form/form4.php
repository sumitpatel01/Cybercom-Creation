<?php

    require "database/db_connect.php";

    $username = "";
    $email = "";
    $subject = "";
    $message = "";
    $table_content = "";

    $nameErr = $emailErr = $subjectErr = $messageErr = "";
    
    if(isset($_POST['submit'])){

        $username = $_POST['name'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];
        
        function filterName($field){
            // Sanitize user name
            $field = filter_var(trim($field), FILTER_SANITIZE_STRING);
            
            // Validate user name
            if(filter_var($field, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
                return $field;
            } else{
                return FALSE;
            }
        }   

        if(empty($username)){
            $nameErr = "Please enter your first name.";
        } else{
            $name = filterName($username);
            if($name == FALSE){
                $nameErr = "Please enter a valid first name.";
            } else {
                $nameErr = "";
            }
        }

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

        if (empty($subject) && !$subject) {
			$subjectErr = 'please enter your subject.';
		} else if (strlen($subject) > 30) {
			$subjectErr = 'subject exceeds 30 charactors.';
        } else {
            $subjectErr = "";
        }
        
        if (empty($message) && !$message) {
			$messageErr = 'please enter your message.';
		} else if (strlen($message) > 150) {
			$messageErr = 'message exceeds 150 charactors.';
		} else {
            $messageErr = "";
        }


        if(!$messageErr && !$emailErr && !$subjectErr && !$nameErr){

            $sql = "INSERT INTO `form4` (`name`, `email`, `subject`, `message`) VALUES ('$username', '$email', '$subject', '$message');";
            $result = mysqli_query($conn, $sql);
                
            $table_content= "<table class=\"tab\"><tr><th colspan=\"2\">"."Your form details:</th>".'<tr><td>Name</td><td>'. $username .'</td></tr><tr><td>email</td><td>'. $email .'</td></tr><tr><td>subject</td><td>'. $subject .'</td></tr><tr><td>message</td><td>'. $message.'</td></tr></table>';
    }

    }

    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/form4.css">
    <title>Form 4</title>
</head>
<body>
    <table>
    <form action="form4.php" method="post" onsubmit="return validate()">
        <tr>
            <th>
                CONTACT US!
            </th>
        </tr>
        <tr>
            <td>
                <input type="text" name="name" id="name" placeholder='Name...'>
                <div class="error" id="nameErr"><?php echo $nameErr; ?></div>
            </td>
        </tr>
        <tr>
            <td>
                <input type="email" name="email" id="email" placeholder ="Email...">
                <div class="error" id="emailErr"><?php echo $emailErr; ?></div>
            </td>
        </tr>
        <tr>
            <td>
            <input type="text" name="subject" id="subject" placeholder="Subject...">
            <div class="error" id="subjectErr"><?php echo $subjectErr; ?></div>
            </td>
        </tr>
        <tr>
            <td>
            <textarea name="message" id="message" cols="30" rows="4" placeholder='Message...'></textarea>
            <div class="error" id="messageErr"><?php echo $messageErr; ?></div>
            </td>
        </tr>
        <tr>
            <td>
             <input type="submit" name ="submit" value="SEND MESSAGE">
            </td>
        </tr>
        </form>
    </table>
    <div>
            <?php echo $table_content; ?>
        </div>
    <script src="js/form4.js"></script>
</body>
</html>