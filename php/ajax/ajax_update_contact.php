<?php 
    include '../connect.php';
    $id = $_POST['id'];
    $sql = "UPDATE `lienhe` SET `state`='contacted' WHERE id = $id";
    if (mysqli_query($conn, $sql)){
        echo "success";
    }
?>