<?php 
    include '../connect.php';
    if ( empty($_FILES['homework']['tmp_name'])==false && isset($_POST['deadline'])){
        $file = addslashes(file_get_contents($_FILES['homework']['tmp_name']));
        $deadline = $_POST['deadline'];
        $file_name =  $_FILES['homework']['name'];
        $class_id =  $_POST['class_id'];
        $sql = "INSERT INTO `homework`(`id`, `name`, `file`, `deadline`, `class_id`)
         VALUES (null,'$file_name','$file','$deadline','$class_id')";
        if (mysqli_query($conn, $sql)){
            echo 'success';
        }
        else {
            echo 'fail';
        }
    }
    else {
    echo 'empty';
    }
?>