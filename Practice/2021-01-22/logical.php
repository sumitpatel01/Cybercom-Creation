<?php

$age = 21;

//this is about logical operator in php. &&, || , !
if($age <= 18){
	echo 'child';
}elseif($age >= 18 && $age <= 60){
	echo 'men';
}else{
	echo 'senior citizen';
}
?>