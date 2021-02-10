<?php

$conn = mysqli_connect('localhost','root','','blog');

// if($conn){
//     echo "success";
// }
$title = "";
$content = "";
$url = "";
$metatitle = "";
$pcategory = "";
$image = "";

$contentErr = $titleErr = $urlErr = $metatitleErr = $imageErr = $pcategoryErr="";


if(isset($_POST['submit'])){

    // echo "post";

    $title = $_POST['title'];
    $content = $_POST['content'];
    $url = $_POST['url'];
    $metatitle = $_POST['metatitle'];
    $pcategory = $_POST['pcategory'];
    $image = $_FILES['image']['name'];

    $location = "upload";

	

	if(empty($content)){
        $contentErr = "Please enter your first name.";
    } else {
			$contentErr = "";
	}
    if(empty($title)){
        $titleErr = "Please enter your title.";
    } else {
			$titleErr = "";
	}
	
    if(empty($url)){
        $urlErr = "Please enter your first name.";
    } else {
			$urlErr = "";
	}
	
    if(empty($metatitle)){
        $metatitleErr = "Please enter your first name.";
    } else {
			$metatitleErr = "";
	}
	

	if (empty($pcategory) && !$pcategory) {
		$pcategoryErr = 'please select your pcategory';
	} else {
			if ($pcategory == 'select') {
				$pcategoryErr = 'please select your pcategory';
		} else {
		$pcategoryErr = "";
	   }
    }

	if (1) {

        
        $category_logo_temp_name = $_FILES['image']['tmp_name'];
	    $category_logo_extension = pathinfo($_FILES['image']['name'],PATHINFO_EXTENSION);
	    $category_logo_name = time().'.'.$category_logo_extension;
	    $url = $location.'/'.$category_logo_name;
	    move_uploaded_file($category_logo_temp_name, $url);
		$sql = "INSERT INTO `category` (`parent category id`, `title`, `meta title`, `url`, `content`, `image`, `created at`, `updated at`) VALUES ( '1', '$title', '$metatitle', '$url', '$content', '$category_logo_name', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)";
        $result = mysqli_query($conn, $sql);

		if($result){
            echo "success";
            header("location: categorylist.php");
        }
	}else {
        echo "error";
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
        <form action="addcategory.php" method="post" enctype="multipart/form-data">
            <tr>
                <th colspan="2">Add New Category</th>
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
                <td>Meta Title</td>
                <td><input type="text" name="metatitle" id="metatitle"><div class="error" id="metatitleErr"><?php echo $metatitleErr; ?></div></td>
            </tr>
            <tr>
                <td>Parent Category</td>
                <td><select name="pcategory" id="pcategory">
                    <option value="select">select</option>
                    <option value="education">education</option>
                    <option value="lifestyle">lifestyle</option>
                    <option value="health">health</option>
                </select><div class="error" id="pcategoryErr"><?php echo $pcategoryErr; ?></div></td>
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