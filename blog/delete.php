<?php
	$conn = mysqli_connect('localhost','root','','blog');
	if (isset($_POST['userid']) && $_POST['userid'] != '' && !empty(trim($_POST['userid'])) ) {
		$sql = "DELETE FROM `blog_post` WHERE `id`='".$_POST['userid']."'";
		$result = mysqli_query($conn,$sql);

    }
    echo "Post Deletd";
?>
		