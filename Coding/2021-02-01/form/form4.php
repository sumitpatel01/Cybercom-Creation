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
                <div class="error" id="nameErr"></div>
            </td>
        </tr>
        <tr>
            <td>
                <input type="email" name="email" id="email" placeholder ="Email...">
                <div class="error" id="emailErr"></div>
            </td>
        </tr>
        <tr>
            <td>
            <input type="text" name="subject" id="subject" placeholder="Subject...">
            <div class="error" id="subjectErr"></div>
            </td>
        </tr>
        <tr>
            <td>
            <textarea name="message" id="message" cols="30" rows="4" placeholder='Message...'></textarea>
            <div class="error" id="messageErr"></div>
            </td>
        </tr>
        <tr>
            <td>
             <input type="submit" name = "submit" value="SEND MESSAGE">
            </td>
        </tr>
        </form>
    </table>
    <script src="js/form4.js"></script>
    <?php

    
    if(isset($_POST['submit'])){
        $username = $_POST['name'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];

        
        echo "<table class=\"tab\"><tr><th colspan=\"2\">";
        echo "Your form details:</th>";
            echo '<tr><td>Name</td><td>'. $username .'</td></tr><tr><td>email</td><td>'. $email .'</td></tr><tr><td>subject</td><td>'. $subject .'</td></tr><tr><td>message</td><td>'. $message.'</td></tr></table>';


    }

    ?>
</body>
</html>