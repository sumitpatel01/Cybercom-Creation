<?php

$a = 1;
$day = friday;

// this is switch  in php.
switch($a){
	case 1:
		echo "one";
		break;
	case 2:
		echo "two";
		break;
	case 3:
		echo "three";
		break;
	case 4:
		echo "four";
		break;
	default :
		echo "number not found";
		break;
}

switch($day){
	case saturday :
	case sunday :
	     echo 'It\'s a weekend';
}

?>