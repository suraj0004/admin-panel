<?php
include("../config.php");
$id = $_GET['id'];
session_start();
$sql = "DELETE FROM user WHERE id = $id";
if(mysqli_query($conn,$sql)){
	$_SESSION['msg'] = "1";
	header("location: ../pages/user.php");
}
else{
	echo "error";
}
?>