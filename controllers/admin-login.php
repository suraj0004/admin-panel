<?php

include("../config.php");

if (isset($_POST)) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $password = md5($password);
    $sql = "SELECT * FROM users WHERE type = 'admin' AND email = '$email' AND password = '$password' ";
    if ($result = $conn->query($sql)) {
       if ($result->num_rows == 1 ) {
           session_start();
           session_regenerate_id();
           $_SESSION["admin_email"] = $email;
        $res = array(
            "status" => "200",
            "message" => "successfully loged in"
        );
        
       } else {
        $res = array(
            "status" => "404",
            "message" => "Inccorect password or email not found"
        );
       }
       
    } else {
        $res = array(
            "status" => "500",
            "message" => mysqli_error($conn)
        );
        
    }
    echo json_encode($res); 
}

$conn->close();

?>