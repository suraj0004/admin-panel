<?php
include("../config.php");

$id = $_POST["id"];
$post_title = $_POST['post_title'];
$post_des = $_POST['post_des'];

$cat_1 = $_POST['cat_1'];
$cat_2 = $_POST['cat_2'];
$cat_3 = $_POST['cat_3'];

$dir = "post_images/";
$location_file = $dir . basename($_FILES["post_image"]["name"]);
move_uploaded_file($_FILES["post_image"]["tmp_name"], $location_file);

if (empty($_FILES["post_image"]["name"])) {
    $location_file = "post_images/".$_POST["current_img"];
}

$sql = "UPDATE `posts` SET `title` = '$post_title',`description` = '$post_des' ,`img` = '$location_file' ,`cat_1` = '$cat_1' ,`cat_2` = '$cat_2' ,`cat_3` = '$cat_3' WHERE id = '$id' ";

// $check = "SELECT * FROM cat WHERE cat_name = '$cat_name'";
// $result = mysqli_query($conn,$check);
// if(mysqli_nums_rows($result)>0){
// 	header("location: ../pages/category-Lvl-2.php?status=failed");
// 	die();
// }
if(mysqli_query($conn,$sql)){
	header("location: /pages/posts.php");
}
else{
	echo "failed".mysqli_error($conn);
}

?>