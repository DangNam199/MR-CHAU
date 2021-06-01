<?php 
    include 'connect.php';
    function auto_check_homework(){
        $sql_homework_set_done = "UPDATE `homework` SET `state`='[value-6]' WHERE deadline < now()";
    }
?>