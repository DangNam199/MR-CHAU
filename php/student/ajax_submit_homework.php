<?php 
    include '../connect.php';
    if ( empty($_FILES['homework']['tmp_name'])==false && isset($_POST['student_id']) && isset($_POST['homework_id']) ){
        $file = addslashes(file_get_contents($_FILES['homework']['tmp_name']));
        $student_id = $_POST['student_id'];
        $homework_id = $_POST['homework_id'];
        $sql = "INSERT INTO `homework_student_rel`(`homework_id`, `student_id`, `file`, `datetime_submit`) 
        VALUES ('$homework_id','$student_id','$file',now())";
        if (mysqli_query($conn,$sql)){
            echo 'success';
        }
        else {
            echo $sql;
            echo 'fail';
        }
    }
    else {
    echo 'empty';
    }
?>