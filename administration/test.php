<?php 
    include '../php/connect.php';
    $sql = "INSERT INTO `degree`(`id`, `tenDegree`) VALUES (null,'Ten Degree')";
    echo $sql;
    $res = mysqli_query($conn, $sql);
    $id = mysqli_insert_id($conn);
    echo $id;

?>