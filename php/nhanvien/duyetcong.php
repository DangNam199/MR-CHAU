<?php 
    include '../connect.php';
    if (isset($_POST['approve']) && isset($_POST['value'])){
        $id = $_POST['id'];
        $value = $_POST['value'];
        $date = $_POST['date'];
        $sql_search = "UPDATE `chamcong` SET `real_work_time`='$value',`state`='approve' WHERE id = $id and date = '$date'";
        if (mysqli_query($conn, $sql_search)){
            echo 'success';
        }
        else {
            echo 'fail';
        }
    }

?>