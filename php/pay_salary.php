<?php 
    include 'connect.php';  
    $id = $_POST['id'];
    $sql = "UPDATE `pay_salary` SET `date`=now(),`state`='paid' WHERE id = $id";
    if (mysqli_query($conn, $sql)){
        echo 'success';
    }
    else {
        echo 'fail';
    }
?>