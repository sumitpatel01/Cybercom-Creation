<?php

require "database/db_connect.php";

$username = "";
$password = "";
$address = "";
$gender = "";
$marital = "";
$date = "";
$month = "";
$year = "";
$games = "";

$gameErr = $nameErr = $passErr = $addressErr = $genderErr = $maritalErr = $dobErr= $agreeErr ="";
    

if (isset($_POST['submit'])) {

	$username = $_POST['name'];
	$password = $_POST['password'];
	$address = $_POST['address'];
	$gender = $_POST['gender'];
	$marital = $_POST['marital'];
	$date = $_POST['date'];
	$month = $_POST['month'];
	$year = $_POST['year'];
	if(isset($_POST['games'])){
		$games = implode(',', $_POST['games']);
	}


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
            $gameErr = 'please select game.';
        } else {
            $gameErr = '';
		}
		
		if (empty($marital) && !$marital) {
            $maritalErr = 'please select your gender.';
        } else {
            $maritalErr = '';
		}
		
		if (empty($date) && !$date && empty($month) && !$month && empty($year) && !$year) {
			if ($date == 'select' || $month == 'select' || $year == 'select') {
				$dobErr = 'please select your dob.';
			} else {
				$dobErr = "";
			}
		}
        
	

	if (!$gameErr && !$nameErr && !$passErr && !$addressErr && !$genderErr && !$maritalErr && !$dobErr) {

		$sql = "INSERT INTO `form2` (`name`, `passowrd`, `gender`, `address`, `date`, `month`, `year`, `marital status`,`games`) VALUES ('$name', '$password', '$gender', '$address', '$date', '$month', '$year', '$marital','$games')";
        $result = mysqli_query($conn, $sql);
		
	 $table_content = '<table class=\"tab\"><tr><th colspan=\"2\">Your form details:</th><tr><td>First Name</td><td>'. $username .'</td></tr><tr><td>Password</td><td>'. $password .'</td></tr><tr><td>address</td><td>'. 
						$address .'</td></tr><tr><td>gender</td><td>'. $gender .'</td></tr><tr><td>DOB</td><td>'. $date .'-'. $month .'-'. $year .'</td></tr><tr><td>Marital status</td><td>'.
						$marital .'</td></tr><tr><td>Games</td><td>'.$games.'</td></tr></table>';
	
	}

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/form2.css">
    <title>Form2</title>
</head>
<body>
<fieldset>
    <legend>USER FORM</legend>
        <table>

    <form action="form2.php" method="post" onsubmit="return validateForm()">
        
        <tr>
            <td>ENTER NAME</td>
            <td><input type="text" name="name" id="name">
            <div class="error" id="nameErr"><?php echo $nameErr; ?></div></td>
        </tr>
        <tr>
            <td>ENTER PASSWORD</td>
            <td><input type="password" name="password" id="password">
            <div class="error" id="passErr"><?php echo $passErr; ?></div></td>
        </tr>
        <tr>
            <td>GENDER</td>
            <td>
                <input type="radio" name="gender" id="male" value="male" checked>male 
                <input type="radio" name="gender" id="female" value="female">female
                <div class="error" id="genderErr"><?php echo $genderErr; ?></div>
            </td>
        </tr>
        <tr>
            <td>ENTER ADDRESS</td>
            <td><textarea name="address" id="address" cols="30" rows="6"></textarea>
            <div class="error" id="addErr"><?php echo $addressErr; ?></div></td>
        </tr>
        <tr>
            <td>
            DATE OF BIRTH
            </td>
            <td>
				<select name="month" id="month" required>
                            <option value="select">select</option>
							<option value="January">January</option>
							<option value="Febuary">Febuary</option>
							<option value="March">March</option>
							<option value="April">April</option>
							<option value="May">May</option>
							<option value="June">June</option>								
                            <option value="July">July</option>
							<option value="August">August</option>
							<option value="September">September</option>
							<option value="October">October</option>
							<option value="November">November</option>
							<option value="December">December</option>
				</select>	     
			    <select name="date" id="date" required>
                                <option value="select">select</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
								<option value="6">6</option>
								<option value="7">7</option>
								<option value="8">8</option>
								<option value="9">9</option>
								<option value="10">10</option>
								<option value="11">11</option>
								<option value="12">12</option>
								<option value="13">13</option>
								<option value="14">14</option>
								<option value="15">15</option>
								<option value="16">16</option>
								<option value="17">17</option>
								<option value="18">18</option>
								<option value="19">19</option>
								<option value="20">20</option>
								<option value="21">21</option>
								<option value="22">22</option>
								<option value="23">23</option>
								<option value="24">24</option>
								<option value="25">25</option>
								<option value="26">26</option>
								<option value="27">27</option>
								<option value="28">28</option>
								<option value="29">29</option>
								<option value="30">30</option>
								<option value="31">31</option>
						</select>
						<select name="year" id="year" required>
                            <option value="select">Select</option>
							<option value="2021">2021</option>
							<option value="2020">2020</option>
							<option value="2019">2019</option>
							<option value="2018">2018</option>
							<option value="2017">2017</option>
							<option value="2016">2016</option>
							<option value="2015">2015</option>
							<option value="2014">2014</option>
							<option value="2013">2013</option>
							<option value="2012">2012</option>
							<option value="2011">2011</option>
							<option value="2010">2010</option>
							<option value="2009">2009</option>
							<option value="2008">2008</option>
							<option value="2007">2007</option>
							<option value="2006">2006</option>
							<option value="2005">2005</option>
							<option value="2004">2004</option>
							<option value="2003">2003</option>
							<option value="2002">2002</option>
							<option value="2001">2001</option>
							<option value="2000">2000</option>
							<option value="1999">1999</option>
							<option value="1998">1998</option>
							<option value="1997">1997</option>
							<option value="1996">1996</option>
							<option value="1995">1995</option>
							<option value="1994">1994</option>
							<option value="1993">1993</option>
							<option value="1992">1992</option>
							<option value="1991">1991</option>
							<option value="1990">1990</option>
							<option value="1989">1989</option>
							<option value="1988">1988</option>
							<option value="1987">1987</option>
							<option value="1986">1986</option>
							<option value="1985">1985</option>
							<option value="1984">1984</option>
							<option value="1983">1983</option>
							<option value="1982">1982</option>
							<option value="1981">1981</option>
							<option value="1980">1980</option>
							<option value="1979">1979</option>
							<option value="1978">1978</option>
							<option value="1977">1977</option>
							<option value="1976">1976</option>
							<option value="1975">1975</option>
							<option value="1974">1974</option>
							<option value="1973">1973</option>
							<option value="1972">1972</option>
							<option value="1971">1971</option>
							<option value="1970">1970</option>
							<option value="1969">1969</option>
							<option value="1968">1968</option>
							<option value="1967">1967</option>
							<option value="1966">1966</option>
							<option value="1965">1965</option>
							<option value="1964">1964</option>
							<option value="1963">1963</option>
							<option value="1962">1962</option>
							<option value="1961">1961</option>
							<option value="1960">1960</option>
							<option value="1959">1959</option>
							<option value="1958">1958</option>
							<option value="1957">1957</option>
							<option value="1956">1956</option>
							<option value="1955">1955</option>
							<option value="1954">1954</option>
							<option value="1953">1953</option>
							<option value="1952">1952</option>
							<option value="1951">1951</option>
							<option value="1950">1950</option>
							<option value="1949">1949</option>
							<option value="1948">1948</option>
							<option value="1947">1947</option>
							<option value="1946">1946</option>
							<option value="1945">1945</option>
							<option value="1944">1944</option>
							<option value="1943">1943</option>
							<option value="1942">1942</option>
							<option value="1941">1941</option>
							<option value="1940">1940</option>
							<option value="1939">1939</option>
							<option value="1938">1938</option>
							<option value="1937">1937</option>
							<option value="1936">1936</option>
							<option value="1935">1935</option>
							<option value="1934">1934</option>
							<option value="1933">1933</option>
							<option value="1932">1932</option>
							<option value="1931">1931</option>
							<option value="1930">1930</option>
							</select>
                            <div class="error" id="dobErr"><?php echo $dobErr; ?></div>
             </td>
        </tr>
        <tr>
            <td>SELECT GAMES</td>
            <td>
                <input type="checkbox" name="games[]" value="hockey" >hockey 
                <input type="checkbox" name="games[]" value="football">football 
                <input type="checkbox" name="games[]" value="badminton">badminton 
                <input type="checkbox" name="games[]" value="volleyball">volleyball 
                <div class="error" id="gameErr"><?php echo $gameErr; ?></div>
            </td>
        </tr>    
        <tr>
            <td>MARITAL STATUS</td>
            <td>
                <input type="radio" name="marital" id="married" value="married" checked>married
                <input type="radio" name="marital" id="unmarried" value="unmarried">Unmarried
                <div class="error" id="maritalErr"><?php echo $maritalErr; ?></div>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="reset" value="reset">
                <input type="submit" name="submit" value="submit form">
            </td>
        </tr>
        <tr>
            <td></td>
           <td>
           <input type="checkbox" name="agree" id="agree">I accept this agreement
		   <div class="error" id="agreeErr"><?php echo $agreeErr; ?></div>
           </td>
        </tr>
        
        </form>
        </table>
        </fieldset>
		<div>
		<?php if(isset($table_content)) {
                echo $table_content;
            } ?>
        </div>
        <script src="js/form2.js"></script>
</body>
</html>