<?php
include '../connect.php';
if (isset($_GET['id'])){
    $id=$_GET['id'];
    $sql = "DELETE FROM `room` WHERE id = '$id'" ;
    echo $sql;
    if(mysqli_query($conn, $sql)){
        header("location: ../../administration/all_room.php");
    }
}
?>
