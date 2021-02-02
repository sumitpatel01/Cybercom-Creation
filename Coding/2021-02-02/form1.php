<?php
    $username = "";
    $password = "";
    $address = "";
    $gender = "";
    $age = "";
    $file = "";
    $games = "";

    $nameErr = $passErr = $addressErr = $genderErr = $ageErr = $fileErr = $gameErr = "";
    
    if(isset($_POST['submit'])){

        $username = $_POST['name'];
        $password = $_POST['password'];
        $address = $_POST['address'];
        $gender = $_POST['gender'];
        $age = $_POST['age'];
        $file = $_FILES['files'];
        if(isset($_POST['games'])){
            $games = $_POST['games'];
        }
        $file_extention = pathinfo($file['name'],PATHINFO_EXTENSION);
        $file_type = $file['type'];
        $file_size = $file['size'];

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

        if (empty($age) && !$age) {
            $ageErr = 'please select your age';
        } else {
            if ($age == 'select') {
                $ageErr = 'please select your age';
           }  else{
                $ageErr = "";
           }
        }

        if (empty($password)) {
            $passErr = "Please enter your password.";      
        } else if (strlen($password) < 8){
            $passErr = "password must be 8 charactor"; 
        } else {
            $passErr = "";
        }

        if (empty($address) && !$address) {
			$addressErr = 'please enter address.';
		} else if (strlen($address) > 150) {
			$addressErr = 'address exceeds 150 charactors.';
		} else {
            $addressErr = "";
        }

        if (empty($gender) && !$gender) {
            $genderErr = 'please select your gender.';
        } else {
            $genderErr = '';
        }

        if (empty($games) && !$games) {
            $gameErr = 'please select your game.';
        } else {
            $gameErr = '';
        }

        if (empty($file['name']) && !$file['name']) {
            $fileErr = 'This field is required';
        } else if ( !(($file_extention == 'jpg' OR $file_extention == 'jpeg' OR $file_extention == 'png') && ($file_type == 'image/jpg' OR $file_type == 'image/jpeg' OR $file_type == 'image/png')) ) {
            $fileErr = 'Please use .jpg , .jpeg , .png File!';
        } else if ($file_size > 1000000) {
            $fileErr = 'Please use Less than 1 MB File!';
        } else {
            $fileErr = "";
        }
        

        if (!$nameErr && !$passErr && !$addressErr && !$genderErr && !$ageErr && !$fileErr && !$gameErr) {
        echo "<table class=\"tab\"><tr><th colspan=\"2\">";
        echo "Your form details:</th>";
        echo '<tr><td>Name</td><td>'. $username .'</td></tr><tr><td>password</td><td>'. $password .'</td></tr><tr><td>address</td><td>'. 
        $address .'</td></tr><tr><td>gender</td><td>'. $gender .'</td></tr><tr><td>age</td><td>'. $age .'</td></tr><tr><td>files</td><td>'.
         $file['name'] .'</td></tr>';
        foreach($_POST['games'] as $value){
            echo "<tr><td>Games</td><td> ".$value.'</td></tr>';
        }
        echo '</table>';
    }

    }

    ?>
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
        <form action="form1.php" method="post" onsubmit="return validateForm()" enctype="multipart/form-data">
        <tr>
            <th colspan="2">User Form</th>
        </tr>
        <tr>
            <td>Enter Name</td>
            <td>
                <input type="text" name="name" id="name" value="<?php echo $username; ?>">
                <div class="error" id="nameErr"><?php echo $nameErr; ?></div>
            </td>
        </tr>
        <tr>
            <td>Enter Password</td>
            <td>
                <input type="password" name="password" id="password" value="<?php echo $password; ?>">
                <div class="error" id="passErr"><?php echo $passErr; ?></div>
            </td>
        </tr>
        <tr>
            <td>Enter Address:</td>
            <td>
                <textarea name="address" id="address" cols="30" rows="10"><?php echo $address; ?></textarea>
                <div class="error" id="addErr"><?php echo $addressErr; ?></div>
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
                <div class="error" id="gameErr"><?php echo $gameErr; ?></div>
            </td>
        </tr>
            <td>Gender</td>
            <td>
                <input type="radio" name="gender" id="male" value="male" checked>male 
                <input type="radio" name="gender" id="feamle" value="female">feamle
                <div class="error" id="genderErr"><?php echo $genderErr; ?></div>
            </td>
        <tr>
            <td>Select your age</td>
            <td>
            <select name="age" id="age">
                <option value="select">select</option>
                <option value="crawler">0 to 2</option>
                <option value="children">2 to 10</option>
                <option value="teenager">11 to 19</option>
                <option value="young">20 to 45</option>
                <option value="adult">45 onwards</option>
            </select>
            <div class="error" id="ageErr"><?php echo $ageErr; ?></div>
            </td>
        </tr>    
        <tr>
            <td colspan="2">
                <input type="file" name="files" id="file" value="files">
                <div class="error" id="fileErr"><?php echo $fileErr; ?></div>
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
        <div>
            <?php //echo $table_content; ?>
        </div>
    <script src="js/form1.js"></script>
    
</body>
</html>