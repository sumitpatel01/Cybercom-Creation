<?php

$age = 21;

//this is if else in php.
if(1==1){
	echo 'true';
}else{
	echo 'false';
}

//this is elseif ladder in php.
if($age <= 18){
	echo 'child';
}elseif($age >= 18 && $age <= 60){
	echo 'men';
}else{
	echo 'senior citizen';
}
?>