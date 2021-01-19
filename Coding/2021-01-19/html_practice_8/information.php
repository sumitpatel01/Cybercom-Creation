  <?php
	if (isset($_POST['submit'])) {
		$firstName = $_POST['fname'];
		$lastName = $_POST['lname'];
        $date = $_POST['date'];
        $month = $_POST['month'];
		$year = $_POST['year'];
		$gender = $_POST['gender'];
		$email = $_POST['email'];
		$retype_Email = $_POST['retype-email'];
		$password = $_POST['password'];
		$retype_Password = $_POST['retype-password'];
		$securityQuestion = $_POST['question'];
		$securityAnswer = $_POST['sp'];
		$address = $_POST['address'];
		$city = $_POST['city'];
		$state = $_POST['state'];
		$zipCode = $_POST['zip'];
		$phone = $_POST['phone'];
		$mobile = $_POST['mobile'];
    }
    else{
		header("Location: index.html");
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Form Data</title>
	<link rel="stylesheet" href="css/info.css">
</head>
<body>
	
	<div class="container">
		<form action="Information.php" method="post">
			<table>
				<tr>
					<th colspan="2"><h2>Form Data</h2></th>
				</tr>
				<tr>
					<td colspan="2">
						<b>Personal Information</b>
					</td>
				</tr>
				<tr>
					<td>
						First Name:
					</td>
					<td>
						<?php echo $firstName;?>
					</td>
				</tr>
				<tr>
					<td>
						Last Name:
					</td>
					<td>
						<?php echo $lastName;?>
					</td>
				</tr>
				<tr>
					<td>
						Date of Birth:
					</td>
					<td>
						<?php echo $date;?> -
						<?php echo $month;?> -
						<?php echo $year;?>
						[dd - mm - yyyy]
					</td>
				</tr>
				<tr>
					<td>
						Gender:
					</td>
					<td>
						<?php echo $gender;?>
					</td>
				</tr>

				<tr>
					<td colspan="2">
						<b>Account Information</b>
					</td>
				</tr>
				<tr>
					<td>
						Email:
					</td>
					<td>
						<?php echo $email;?>
					</td>
				</tr>
				<tr>
					<td>
						Re-type Email:
					</td>
					<td>
						<?php echo $retype_Email;?>
					</td>
				</tr>
				<tr>
					<td>
						Password:
					</td>
					<td>
						<?php echo $password;?>
					</td>
				</tr>
				<tr>
					<td>
						Re-type Password:
					</td>
					<td>
						<?php echo $retype_Password;?>
					</td>
				</tr>
				<tr>
					<td>
						Security Question:
					</td>
					<td>
						<?php echo $securityQuestion;?>
					</td>
				</tr>
				<tr>
					<td>
						Security Answer:
					</td>
					<td>
						<?php echo $securityAnswer;?>
					</td>
				</tr>

				<tr>
					<td colspan="2">
						<b>Contact Information</b>
					</td>
				</tr>
				<tr>
					<td>
						Address:
					</td>
					<td>
						<?php echo $address;?>
					</td>
				</tr>
				<tr>
					<td>
						City:
					</td>
					<td>
						<?php echo $city;?>
					</td>
				</tr>
				<tr>
					<td>
						State:
					</td>
					<td>
						<?php echo $state;?>
					</td>
				</tr>
				<tr>
					<td>
						Zip Code:
					</td>
					<td>
						<?php echo $zipCode;?>
					</td>
				</tr>
				<tr>
					<td>
						Phone:
					</td>
					<td>
						<?php echo $phone;?> 
						[ <?php echo $mobile;?> ]
					</td>
				</tr>
			</table>
		</form>
	</div>
</body>
</html>