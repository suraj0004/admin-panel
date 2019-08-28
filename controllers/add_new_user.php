<?php
include("../config.php");
$username = $_POST['username'];
$email = $_POST['email'];
$password = md5($_POST['password']);
$check = "SELECT * FROM user WHERE Email ='$email'";
$result = mysqli_query($conn,$check);
if(mysqli_num_rows($result)>0){
	echo "401";
}
else{
	$sql ="INSERT INTO user (user_name,email,password,created_at) VALUES ('$username','$email','$password',now())";
	if(mysqli_query($conn,$sql)){
		echo "200";
	}
	else{
		echo"404";
	}	
}


?>