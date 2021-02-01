<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/form1.css" type="text/css">
    <title>Form 1</title>
</head>
<body>
    <div class="container">
        <table class="table-form">
        <form action="form1.php" method="post" onsubmit="return validateForm()">
        <tr>
            <th colspan="2">User Form</th>
        </tr>
        <tr>
            <td>Enter Name</td>
            <td>
                <input type="text" name="name" id="name">
                <div class="error" id="nameErr"></div>
            </td>
        </tr>
        <tr>
            <td>Enter Password</td>
            <td>
                <input type="password" name="password" id="password">
                <div class="error" id="passErr"></div>
            </td>
        </tr>
        <tr>
            <td>Enter Address:</td>
            <td>
                <textarea name="address" id="address" cols="30" rows="10"></textarea>
                <div class="error" id="addErr"></div>
            </td>
        </tr>
        <tr>
            <td>Select Game</td>
            <td>
                <input type="checkbox" name="games[]" id="hockey" value="hockey">hockey <br>
                <input type="checkbox" name="games[]" id="football" value="football">football <br>
                <input type="checkbox" name="games[]" id="badminton" value="badminton">badminton <br>
                <input type="checkbox" name="games[]" id="cricket" value="cricket">cricket <br>
                <input type="checkbox" name="games[]" id="volleyball" value="volleyball">volleyball <br>
                <div class="error" id="gameErr"></div>
            </td>
        </tr>
            <td>Gender</td>
            <td>
                <input type="radio" name="gender" id="male" value="male">male 
                <input type="radio" name="gender" id="feamle" value="female">feamle
                <div class="error" id="genderErr"></div>
            </td>
        <tr>
            <td>Select your age</td>
            <td>
            <select name="age" id="age">
                <option>Select</option>
                <option value="crawler">0 to 2</option>
                <option value="children">2 to 10</option>
                <option value="teenager">11 to 19</option>
                <option value="young">20 to 45</option>
                <option value="adult">45 onwards</option>
            </select>
            <div class="error" id="ageErr"></div>
            </td>
        </tr>    
        <tr>
            <td colspan="2">
                <input type="file" name="files" id="file" value="files">
                <div class="error" id="fileErr"></div>
            </td>
        </tr>
        <tr>
            <td colspan='2'>
                <input type="reset" value="reset">
                <input type="submit" name="submit" value="submit form">
            </td>
        </tr>
        </form>
        </table>
        </div>
    <script src="js/form1.js"></script>
    <?php

    
    if(isset($_POST['submit'])){
        $username = $_POST['name'];
        $password = $_POST['password'];
        $address = $_POST['address'];
        $gender = $_POST['gender'];
        $age = $_POST['age'];
        $file = $_POST['files'];
        $games = $_POST['games'];

        
        echo "<table class=\"tab\"><tr><th colspan=\"2\">";
        echo "Your form details:</th>";
        echo '<tr><td>Name</td><td>'. $username .'</td></tr><tr><td>password</td><td>'. $password .'</td></tr><tr><td>address</td><td>'. 
        $address .'</td></tr><tr><td>gender</td><td>'. $gender .'</td></tr><tr><td>age</td><td>'. $age .'</td></tr><tr><td>files</td><td>'.
         $file .'</td></tr>';
        foreach($_POST['games'] as $value){
            echo "<tr><td>Games</td><td> ".$value.'</td></tr>';
        }
        echo '</table>';

       

    }

    ?>
</body>
</html>