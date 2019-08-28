<?php
session_start();
include("../config.php");
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$id = $_POST['id'];
if($password != "xxxxxxxx"){
	$update_pass = "UPDATE user SET password = '$password' WHERE id = '$id'";
	mysqli_query($conn,$update_pass);
}
$update = "UPDATE user SET user_name = '$username',email='$email' WHERE id= '$id'";
if(mysqli_query($conn,$update)){
	$_SESSION['success'] = "1";
	header("location: ../pages/user.php");	
}
?>