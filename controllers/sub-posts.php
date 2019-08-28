<?php
include("../config.php");


$post_title = $_POST['post_title'];
$post_des = $_POST['post_des'];

$cat_1 = $_POST['cat_1'];
$cat_2 = $_POST['cat_2'];
$cat_3 = $_POST['cat_3'];

$dir = "post_images/";
$location_file = $dir . basename($_FILES["post_image"]["name"]);
move_uploaded_file($_FILES["post_image"]["tmp_name"], $location_file);
$sql ="INSERT INTO `posts` (`title`,`description`,`img`,`cat_1`,`cat_2`,`cat_3`,`created_at`) VALUES ('$post_title','$post_des','$location_file','$cat_1','$cat_2','$cat_3',now())";
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