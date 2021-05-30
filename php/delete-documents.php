<?php
include '../php/connect.php';
if (isset($_GET['id'])){
    $sql = "DELETE FROM `tailieu` WHERE id = " .$_GET['id'] ;
    echo $sql;
    if(mysqli_query($conn, $sql)){
        header("location: ../administration/all_news.php");
    }
}
?>