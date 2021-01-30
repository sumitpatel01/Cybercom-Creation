<?php

echo "Cookie";

// cookie(no sensitive data) | session(sensitive data)

//syntax
setcookie('category','books',time() + 86400,"/");

$category = $_COOKIE['category'];
echo "here is the list of all $category";

?>