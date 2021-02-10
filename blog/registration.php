<?php

$conn = mysqli_connect('localhost','root','','blog');

// if($conn){
//     echo "success";
// }
$firstName = "";
$password = "";
$cpassword = "";
$lastName = "";
$prefix = "";
$info = "";
$email = "";
$phone = "";
$sameemailErr= false;

$fnameErr = $lnameErr = $passErr = $cpassErr = $prefixErr = $phoneErr = $emailErr = $infoErr ="";


if(isset($_POST['submit'])){

    // echo "post";

	$firstName = $_POST['fname'];
	$password = $_POST['password'];
	$cpassword = $_POST['cpassword'];
	$lastName = $_POST['lname'];
	$info = $_POST['information'];
	$prefix = $_POST['prefix'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
    $pass_hash = md5($password);
    

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

	if(empty($firstName)){
        $fnameErr = "Please enter your first name.";
    } else{
        $name = filterName($firstName);
        if($name == FALSE){
            $fnameErr = "Please enter a valid first name.";
        } else {
			$fnameErr = "";
            echo "f";
		}
	}
	
	if(empty($lastName)){
        $lastnamenameErr = "Please enter your last name.";
    } else{
        $name = filterName($lastName);
        if($name == FALSE){
            $lnameErr = "Please enter a valid last name.";
		}
		else {
			$lnameErr = "";
            echo "l";
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
            echo "e";
		}
	}

	if (empty($password)) {
		$passErr = "Please enter your password.";      
	} else if (strlen($password) < 8){
		$passErr = "password must be 8 charactor"; 
	} else {
		$passErr = "";
        echo "ps";
	}

	if (empty($prefix) && !$prefix) {
		$prefixErr = 'please select your prefix';
	} else {
			if ($prefix == 'select') {
				$prefixErr = 'please select your prefix';
		} else {
		$prefixErr = "";
        echo "pf";
	   }
    }
    

	if (empty($cpassword)) {
		$cpassErr = "Please enter your password.";      
	} else if ($password !== $cpassword){
		$cpassErr = "password and confirm password should be same"; 
	} else {
		$cpassErr = "";
        echo "e";
	}

	
	if (empty($info) && !$info) {
		$infoErr = 'please enter your info.';
    } else {
		$infoErr = '';
        echo "i";
	}

	if (empty($phone) && !$phone) {
		$phoneErr = 'enter your phone number';
	} else if (strlen($phone) != 10) {
		$phoneErr = 'Phonenumber must be 10 characters.';
	} else {
		$phoneErr = "";
        echo "p";
	}

	if (1) {

        echo "hii";
        $sql1 = "select * from `user` WHERE `email` = '$email";
        $run1 = mysqli_query($conn,$sql1);
        $num1 = mysqli_num_rows($run1);
    
        if($num1 >= 1) {
            $sameemailErr = true; 
        }else{

        echo "success";
		$sql = "INSERT INTO `user` (`prefix`, `firstname`, `lastname`, `mobile`, `email`, `password`, `information created at`, `updated at`) VALUES ('$prefix', '$firstName', '$lastName', '$phone', '$email', '$pass_hash', CURRENT_TIMESTAMP, '');";
        $result = mysqli_query($conn, $sql);

		if($result){
            echo "success";
            header("location: login.php");
        }
        }

	}else {
        echo "error";
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>Registration</title>
</head>

<body>
    <?php
        if($sameemailErr) {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>error!</strong> Your email address is already registred.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
    ?>
    <div class="container">

        <table class="table">
        <form action="registration.php" method="post" onsubmit= "return validateForm()">
            <tr>
                <th colspan="2">REGISTRATION</th>
            </tr>
            <tr>
                <td>prefix</td>
                <td><select name="prefix" id="prefix">
                        <option value="select">Select</option>
                        <option value="mrs">Mrs</option>
                        <option value="ms">Ms</option>
                    </select><div class="error" id="prefixErr"><?php echo $prefixErr; ?></div></td>
            </tr>
            <tr>
                <td>first name</td>
                <td><input type="text" name="fname" id="fname"><div class="error" id="fnameErr"><?php echo $fnameErr; ?></div></td>
            </tr>
            <tr>
                <td>last name</td>
                <td><input type="text" name="lname" id="lname"><div class="error" id="lnameErr"><?php echo $lnameErr; ?></div></td>
            </tr>
            <tr>
                <td>email</td>
                <td><input type="email" name="email" id="email"><div class="error" id="emailErr"><?php echo $emailErr; ?></div></td>
            </tr>
            <tr>
                <td>mobile no</td>
                <td><input type="number" name="phone" id="phone"><div class="error" id="phoneErr"><?php echo $phoneErr; ?></div></td>
            </tr>
            <tr>
                <td>password</td>
                <td><input type="password" name="password" id="password"><div class="error" id="passErr"><?php echo $passErr; ?></div></td>
            </tr>
            <tr>
                <td>confirm password</td>
                <td><input type="password" name="cpassword" id="cpassword"><div class="error" id="cpassErr"><?php echo $cpassErr; ?></div></td>
            </tr>
            <tr>
                <td>information</td>
                <td><textarea name="information" id="information" cols="30" rows="3"></textarea><div class="error" id="infoErr"><?php echo $infoErr; ?></div></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="checkbox" name="agree" id="agree">hereby i accept terms & conditions.<div class="error" id="agreeErr"><?php //echo $agreeErr; ?></div></td>
            </tr>
            <tr>
                <td colspan="2"><input class="btn btn-primary" type="submit" value="submit" name="submit"></td>
            </tr>
</form>
        </table>

    </div>
    <!-- <script src="js/registration.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
        crossorigin="anonymous"></script>

</body>

</html>