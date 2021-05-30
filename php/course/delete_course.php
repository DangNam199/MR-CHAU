<?php
include '../php/connect.php';
if (isset($_GET['id'])){
    $id=$_GET['id'];
    $sql = "DELETE FROM `degree` WHERE id = '$id' AND DELETE FROM `course` WHERE id = '$id'" ;
    echo $sql;
    if(mysqli_query($conn, $sql)){
        header("location: ../administration/all_courses.php");
    }
}
?>
