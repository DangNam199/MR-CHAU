<?php 
    include '../connect.php';
    $class_id = $_POST['class_id'];
    $student_ids = $_POST['student_ids'];
    $lession = $_POST['lession'];
    $sql = '';
    foreach($student_ids as $st){
        $sql .= "INSERT INTO `attendance`(`class_id`, `student_id`, `lession`) 
        VALUES ('$class_id','$st','$lession');";
    }
    $res = mysqli_multi_query($conn,$sql);
    if ($res){
        echo 'success';
    }
    else {
        echo 'fail';
    }

?>