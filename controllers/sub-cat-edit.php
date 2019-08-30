<?php
include("../config.php");

$id = $_POST["id"];

$parent_category = $_POST['parent_category'];
$category_name = $_POST['category_name'];

print_r($_FILES);
$dir = "cat_images/";
$location_file = $dir . basename($_FILES["category_logo"]["name"]);
move_uploaded_file($_FILES["category_logo"]["tmp_name"], $location_file);

if (empty($_FILES["category_logo"]["name"])) {
    $location_file = "cat_images/".$_POST["current_img"];
}

$sql = "UPDATE `cat` SET `cat_name` = '$category_name',`parent_id` = '$parent_category' ,`cat_logo` = '$location_file'  WHERE id = '$id' ";

// $check = "SELECT * FROM cat WHERE cat_name = '$cat_name'";
// $result = mysqli_query($conn,$check);
// if(mysqli_nums_rows($result)>0){
// 	header("location: ../pages/category-Lvl-2.php?status=failed");
// 	die();
// }
if(mysqli_query($conn,$sql)){
	if ($parent_category == 0) {
		header("location: /pages/category-Lvl-1.php");
		die();
	} else {
		if ($_POST["sub-cat"] == 2) {
			header("location: /pages/category-Lvl-2.php");
		} else {
			header("location: /pages/category-Lvl-3.php");
		}
		
	}
	
	
}
else{
	echo "failed".mysqli_error($conn);
}

?>