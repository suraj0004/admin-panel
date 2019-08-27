<?php
include("../config.php");
$id = $_GET['id'];
$page_id = $_GET['p_id'];
$sql = "DELETE FROM cat WHERE id = $id";
mysqli_query($conn,$sql);
if($page_id==1){
	header("location: ../pages/category-Lvl-1.php");
}
if($page_id==2){
	header("location: ../pages/category-Lvl-2.php");
}
if($page_id==3){
	header("location: ../pages/category-Lvl-3.php");
}


?>