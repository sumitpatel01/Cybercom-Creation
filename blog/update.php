<?php

session_start();

$id = $_SESSION['uid'];
$conn = mysqli_connect('localhost','root','','blog');


$title = "";
$content = "";
$url = "";
$published = "";
$pcategory = "";
$image = "";

if (isset($_GET['blogid'])) {
    $blogid = $_GET['blogid'];
} else if (isset($_POST['blog_id'])) {
    $blogid = $_POST['blog_id'];
} else {
    $blogid = '';
}

if ($blogid != '' && !empty(trim($blogid)) ) {
    $sql = "select * from `blog_post` WHERE `id` = '$blogid'";
    $result = mysqli_query($conn , $sql);
    $count = mysqli_num_rows($result);


        $array1 = mysqli_fetch_assoc($result);
        $title = $array1['title'];
        $content = $array1['content'];
        $url = $array1['url'];
        $published = $array1['published at'];
        $pcategory = $array1['parent category'];
        $image = "";

    
}


    $contentErr = $titleErr = $urlErr = $publishedErr = $imageErr = $categoryErr= "";


if(isset($_POST['submit'])){

    // echo "post";
    $blogid = $_POST['blogid'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $url = $_POST['url'];
    $published = $_POST['published'];
    $category = $_POST['category'];
    echo $image = $_FILES['image']['name'];
	

	

	if(empty($content)){
        $contentErr = "Please enter your first name.";
    } else {
			$contentErr = "";
            echo "f";
	}
    if(empty($title)){
        $tilteErr = "Please enter your title.";
    } else {
			$titleErr = "";
            echo "f";
	}
	
    if(empty($url)){
        $urltErr = "Please enter your first name.";
    } else {
			$urlErr = "";
            echo "f";
	}
	
    if(empty($published)){
        $publishedErr = "Please enter your first name.";
    } else {
			$publishedErr = "";
            echo "f";
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
	

        echo "success";
		$sql = "UPDATE `blog_post` SET `user_id` = '$id', `title` = '$title', `url` = '$url', `content` = '$content', `image` = '', `published at` = '2021-02-09 00:00:00', `created at` = '2021-02-16 13:39:08', `updated at` = 'CURRENT_TIMESTAMP' WHERE `blog_post`.`id` = $blogid ";
        $result = mysqli_query($conn, $sql);
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

    <title>update category</title>
</head>

<body>
    <div class="container">

        <table class="table">
            <form action="update.php" method="post">
                <input type="hidden" name="blogid" value="<?php echo $blogid;?>">
                <tr>
                    <th colspan="2">update Blog Post</th>
                </tr>
                <tr>
                    <td>Title</td>
                    <td><input type="text" name="title" id="title" value="<?php echo $title; ?>">
                        <div class="error" id="titleErr">
                            <?php echo $titleErr; ?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Content</td>
                    <td><input type="text" name="content" id="content" value="<?php echo $content; ?>">
                        <div class="error" id="contentErr">
                            <?php echo $contentErr; ?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Url</td>
                    <td><input type="text" name="url" id="url" value="<?php echo $url; ?>">
                        <div class="error" id="urlErr">
                            <?php echo $urlErr; ?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Published At</td>
                    <td><input type="datetime-local" name="published" id="published" value="<?php echo $published; ?>">
                        <div class="error" id="publishedErr" value="<?php echo $title; ?>">
                            <?php echo $publishedErr; ?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Category</td>
                    <td><select name="category" id="category" range="4">
                            <option value="music">music</option>
                            <option value="education">education</option>
                            <option value="lifestyle">lifestyle</option>
                            <option value="health">health</option>
                        </select>
                        <div class="error" id="categoryErr">
                            <?php echo $categoryErr; ?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Image</td>
                    <td><input type="file" name="image" id="image">
                        <div class="error" id="imageErr">
                            <?php echo $imageErr; ?>
                        </div>
                    </td>
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