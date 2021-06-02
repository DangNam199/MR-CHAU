<?php 
    include '../connect.php';
    $class_id = $_POST['id'];
    $date_exam = $_POST['date_exam'];
    $sql = "UPDATE `class` SET `date_exam`= '$date_exam' WHERE id = $class_id";
    if(mysqli_query($conn, $sql)){
        echo 'success';
    }

?>