<?php
include("../config.php");
$cat_name = $_POST['category_name'];
$dir = "cat_images/";
$location_file = $dir . basename($_FILES["category_logo"]["name"]);
move_uploaded_file($_FILES["category_logo"]["tmp_name"], $location_file);
$sql ="INSERT INTO cat (cat_name,cat_logo,created_at,parent_id,level) VALUES ('$cat_name','$location_file',now(),'0','1')";
// $check = "SELECT * FROM cat WHERE cat_name = '$cat_name'";
// $result = mysqli_query($conn,$check);
// if(mysqli_nums_rows($result)>0){
// 	header("location: ../pages/category-Lvl-2.php?status=failed");
// 	die();
// }
if(mysqli_query($conn,$sql)){
	header("location: /pages/category-Lvl-1.php");
}
else{
	echo "failed".mysqli_error($conn);
}

?>