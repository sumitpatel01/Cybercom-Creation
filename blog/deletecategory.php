<?php
	$conn = mysqli_connect('localhost','root','','blog');
	if (isset($_POST['categoryid']) && $_POST['categoryid'] != '' && !empty(trim($_POST['categoryid'])) ) {
		$sql = "DELETE FROM `category` WHERE `id`='".$_POST['categoryid']."'";
		$result = mysqli_query($conn,$sql);

    }
    echo "Post Deletd";
?>