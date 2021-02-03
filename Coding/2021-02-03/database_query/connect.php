<?php

$error = 'Could not connect.';
$hostname = 'localhost';
$username = 'root';
$password = '';
$db = 'batabase_practice';

@mysqli_connect($hostname, $username, $password, $db) or die('couldn\'t connect to the database');
// echo 'connected';

?>