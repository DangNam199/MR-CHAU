<?php 
    include 'connect.php';
    function auto_check_homework($conn){
        $sql_homework_set_done = "UPDATE `homework` SET `state`='done' WHERE deadline < now()";
        mysqli_query($conn, $sql_homework_set_done);
    }
    auto_check_homework($conn);
?>