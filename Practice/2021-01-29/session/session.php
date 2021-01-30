<!-- session :
  used to manage information across different pages 
-->

<?php

session_start();
$_SESSION['username'] = 'sumit';
$_SESSION['password'] = 'sumit123';

echo 'we have set your session.';
?>