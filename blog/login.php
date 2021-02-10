<?php

$conn = mysqli_connect('localhost','root','','blog');

// if($conn){
//     echo "success";
// }
$password = "";
$email = "";


$fnameErr = $lnameErr = $passErr = $cpassErr = $prefixErr = $phoneErr = $emailErr = $infoErr ="";


if(isset($_POST['submit'])){

    // echo "post";

	$password = $_POST['password'];
	$email = $_POST['email'];
    $pass_hash = md5($password);


	
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



	if (!$emailErr && !$passErr) {
	

        echo "success";
		$sql = "select * from `user` where `email` = '$email' AND `password`= '$pass_hash'";
        echo $sql;
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
         echo $num;

		if($num == 1){
            

            $array = mysqli_fetch_assoc($result);
echo $array['id'];
            session_start();
            $_SESSION['loggedin']=true;
            $_SESSION['uid']=$array['id'];
            $_SESSION['name']=$array['firstname'];
            
            header("location: user.php");
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

   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>login</title>
  </head>
  <body>
    
       <div class="container">
            <table class="table">
                <form action="login.php" method="post" onsubmit="return validateForm()">
                    <tr>LOGIN FORM</tr>
                    <tr><td>email</td>
                    <td><input type="email" name="email" id="email"><div class="error" id="emailErr"><?php //echo $emailErr; ?></div></td></tr>
                    <tr><td>password</td>
                    <td><input type="password" name="password" id="password"><div class="error" id="passErr"><?php //echo $passErr; ?></div></td></tr>
                    <tr><td><input class="btn btn-primary" type="submit" value="login" name='submit'>  <a class="btn btn-primary" type="button" value="register" href="registration.php">Registration</a></td></tr>
                </form>
            </table>
       </div>
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="js/login.js"></script>
   
  </body>
</html>