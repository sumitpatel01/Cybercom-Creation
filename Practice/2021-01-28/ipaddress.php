<?php

// $user_ip = $_SERVER['REMOTE_ADDR'];
// //$IP_BLOCKED = array('127.0.0.1','100.0.0.1');

// echo $user_ip;

$http_client_address = $_SERVER['HTTP_CLIENT_ADDRESS']
$http_x_forwarded_for = $_SERVER['HTTP_X_FORWARDED_FOR'];
$remote_addr = $_SERVER['REMOTE_ADDR'];

if (!empty($http_client_address)) {
    $ip_ad = $http_client_address;
} elseif (!empty($http_x_forwarded_for)) {
    $ip_ad = $http_x_forwarded_for;
} else {
    $ip_ad = $remote_addr;
}

echo $ip_ad;


?>