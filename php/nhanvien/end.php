<?php 
include '../connect.php';
    $id = $_POST['id'];
    $sql = "UPDATE `nhanvien` SET `state`='done' WHERE id = ".$id .';';
    $sql .= "UPDATE `contract` SET `state`='done' WHERE staff_id = $id;";
    if (mysqli_multi_query($conn, $sql)){
        echo 'success';
    }
    else {
        echo 'fail';
    }
?>