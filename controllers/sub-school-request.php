<?php

include("../config.php");

if (isset($_POST)) {
    $action = $_POST["action"];
    $id = $_POST["id"];

    if ($action == "approve") {
        $sql = "UPDATE school_registration SET doc_verified ='true' WHERE id = '$id' ";
        $conn->query($sql);
        echo "Successfully Approved";
    }
    if ($action == "reject") {
        $sql = "DELETE FROM schools_data WHERE school_id = '$id' ";
        $conn->query($sql);
        $sql = "UPDATE school_registration SET doc_uploaded ='false' WHERE id = '$id' ";
        $conn->query($sql);
        echo "Successfully Rejected";
    }
    
}


?>