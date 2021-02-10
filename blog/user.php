<?php
session_start();

$conn = mysqli_connect('localhost','root','','blog');

$id = $_SESSION['uid'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container">
<a href="categorylist.php" class="btn btn-success">Manage category</a>    
<a href="#" class="btn btn-primary">my profile</a>
<a  class="btn btn-danger" href="logout.php">logout</a>
    </div>
    <div class="container">
        <h2>Blog Posts</h2><br>
        <a href="addblogpost.php" class="btn btn-success">add blog posts</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Post id</th>
                    <th>Category name</th>
                    <th>title</th>
                    <th>published date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM `blog_post`,`post_category` WHERE `blog_post`.`user_id` = '".$id."' AND `blog_post`.`id` = `post_category`.`post id`";
                $query_run = mysqli_query($conn , $sql);
            

                while($row = mysqli_fetch_assoc($query_run)){
                    $categoryValue = explode(',',$row['category id']);
					$categoryName = '';
					foreach ($categoryValue as $value) {
                        $sql = "SELECT `title` FROM `category` WHERE `id` = '".$value."'";
                        $result = mysqli_query($conn, $sql);
                        if($result) { 
                        $row1 = mysqli_fetch_array($result);
                        $categoryName .= $row1['title'];
                        }  
					}
							$categoryName = substr($categoryName, 0,-1);

                echo "<tr><td>".$row['id']."</td><td>".$categoryName."</td><td>".$row['title']."</td><td>".$row['published at']."</td><td><a href='update.php?blogid=".$row['id']."' class='edit btn btn-sm btn-primary'>Edit</a> <button onclick='delete_user(".$row['id'].")' class='btn btn-sm btn-primary'>Delete</button></td></tr>";
                
            }

                ?>
            </tbody>
        </table> 
    </div>
    <script type="text/javascript">
	var delete_user = function(value) {
		if (window.XMLHttpRequest) {
			xmlhttp = new XMLHttpRequest();
		} else {
			xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
		}
		xmlhttp.onreadystatechange = function () {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				alert(xmlhttp.responseText);
				window.location.href = 'user.php';
			}
		}
		param = 'userid='+value;
		xmlhttp.open('POST','delete.php',true);
		xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
		xmlhttp.send(param);
	}
</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>

</html>