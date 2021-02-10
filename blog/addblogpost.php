<?php

session_start();

$id = $_SESSION['uid'];
$conn = mysqli_connect('localhost','root','','blog');

$title = "";
$content = "";
$url = "";
$published = "";
$category = "";
$image = "";

$contentErr = $titleErr = $urlErr = $publishedErr = $imageErr = $categoryErr="";


if(isset($_POST['submit'])){

    // echo "post";

    $title = $_POST['title'];
    $content = $_POST['content'];
    $url = $_POST['url'];
    $published = $_POST['published'];
    $pcategory = $_POST['category'];
    $image = $_FILES['image']['name'];

    $location = "upload";
    
	if(empty($content)){
        $contentErr = "Please enter your first name.";
    } else {
			$contentErr = "";
	}
    if(empty($title)){
        $tilteErr = "Please enter your title.";
    } else {
			$titleErr = "";
	}
	
    if(empty($url)){
        $urltErr = "Please enter your first name.";
    } else {
			$urlErr = "";
	}
	
    if(empty($published)){
        $publishedErr = "Please enter your first name.";
    } else {
			$publishedErr = "";
	}
	

	if (empty($category) && !$category) {
		$categoryErr = 'please select your pcategory';
	} else {
			if ($category == 'select') {
				$categoryErr = 'please select your pcategory';
		} else {
		$categoryErr = "";
        echo "pf";
	   }
    }

	if (1) {
	
        $category_logo_temp_name = $_FILES['image']['tmp_name'];
	    $category_logo_extension = pathinfo($_FILES['image']['name'],PATHINFO_EXTENSION);
	    $category_logo_name = time().'.'.$category_logo_extension;
	    $url = $location.'/'.$category_logo_name;
	    move_uploaded_file($category_logo_temp_name, $url);
        echo "success";
		$sql = "INSERT INTO `blog_post` (`user_id`, `title`, `url`, `content`, `image`, `published at`, `created at`, `updated at`) VALUES ('$id', '$title', '$url', '$content', '$category_logo_name', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, '')";
        $result = mysqli_query($conn, $sql);
        $sql = "SELECT LAST_INSERT_ID()";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
        $post_id = $row[0];
        $category_id =  implode(',', $pcategory);
        $sql = "INSERT INTO `post_category` (`post id`,`category id`) VALUES ('".$post_id."','".$category_id."')";
        $result = mysqli_query($conn,$sql);
        header("location: user.php");
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>Add category</title> 
</head>

<body>
    <div class="container">

        <table class="table">
        <form action="addblogpost.php" method="post" enctype="multipart/form-data">
            <tr>
                <th colspan="2">Add New Blog Post</th>
            </tr>
            <tr>
                <td>Title</td>
                <td><input type="text" name="title" id="title"><div class="error" id="titleErr"><?php echo $titleErr; ?></div></td>
            </tr>
            <tr>
                <td>Content</td>
                <td><input type="text" name="content" id="content"><div class="error" id="contentErr"><?php echo $contentErr; ?></div></td>
            </tr>
            <tr>
                <td>Url</td>
                <td><input type="text" name="url" id="url"><div class="error" id="urlErr"><?php echo $urlErr; ?></div></td>
            </tr>
            <tr>
                <td>Published At</td>
                <td><input type="datetime-local" name="published" id="published"><div class="error" id="publishedErr"><?php echo $publishedErr; ?></div></td>
            </tr>
            <tr>
                <td>Category</td>
                <td><select name="category[]" id="category" range="4" multiple>
                <?php
                $sql = "SELECT * FROM `category`";
                $query_run = mysqli_query($conn , $sql);
            

                while($row = mysqli_fetch_assoc($query_run)){
                    ?>
                    <option value="<?php echo $row['id'];?>"><?php echo $row['title']?></option>
                    
                    <?php
                }?>
                </select><div class="error" id="categoryErr"><?php echo $categoryErr; ?></div></td>
            </tr>
            <tr>
                <td>Image</td>
                <td><input type="file" name="image" id="image"><div class="error" id="imageErr"><?php echo $imageErr; ?></div></td>
            </tr>
            <tr>
                <td colspan="2"><input class="btn btn-primary" type="submit" value="submit" name="submit"></td>
            </tr>
</form>
        </table>

    </div>
    <!-- <script src="js/registration.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
        crossorigin="anonymous"></script>

</body>

</html>