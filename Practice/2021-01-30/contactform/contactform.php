<?php

if (isset($_POST['contact_name']) && isset($_POST['email']) && isset($_POST['contact_text'])) {
    $name = $_POST['contact_name'];
    $email = $_POST['email'];
    $message = $_POST['contact_text'];

    if(!empty($name) && !empty($email) && !empty($message)) {
        
        if (strlen($name)>25 || strlen($email)>50 || strlen($message)>1000) {

            echo 'sorry max length excceds';
        } else {
            $to = 'sumitpatel41306@gmail.com';
            $subject = "contact form submitted";
            $body = $name ."\n". $message;
            $headers = 'From: '.$email;

            if (mail($to, $subject, $body, $headers)) {
                echo 'sent';
            } else {
                echo 'there was an error';
            }
        } else {
            echo 'pease enter all detail';
        }
    }
        
}

?>

<form action="contactform.php" method="post">
    Name : <br><input type="text" name="contact_name" id="" value= <?php echo $name; ?>><br>
    Email : <br><input type="email" name="email" id="" value= <?php echo $email; ?>><br>
    Message : <br><textarea name="contact_text" id="" cols="30" rows="6" value= <?php echo $message; ?>></textarea><br>
    <input type="submit" value="submit">
</form>