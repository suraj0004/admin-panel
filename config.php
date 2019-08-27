<?php

error_reporting(0);

$conn;
function createConnection()
{
  global $conn;
    $host = "localhost";

//  $user = "u401986195_cat";
$user = "root";
 //$password = "abcdefg";

$password = "";
 $database = "cat_admin";
//$database = "u401986195_cat";
  $conn = new mysqli($host, $user, $password,$database);
    if($conn->connect_error)
    {
        throw new Exception("Error : While connecting to Database");
    //die("Connection failed :".mysqli_connect_error());
    }
    return true;
}
  //trigger exception in a "try" block
  try {
    createConnection();
    //If the exception is thrown, this text will not be shown
    //echo 'If you see this, then coonection successful';
  }
  
  //catch exception
  catch(Exception $e) {
    $res = array(
        "status" => 500,
        "message" => $e->getMessage()
       );
        die(json_encode($res));
  }
?>