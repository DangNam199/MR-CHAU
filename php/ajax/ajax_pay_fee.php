<?php 
    include '../connect.php';
    $price = $_POST['price'];
    $student_id = $_POST['student_id'];
    $course_id = $_POST['course_id'];

       
    $sql = "INSERT INTO `invoice`(`id`, `total`, `paid`, `date`, `student_id`, `course_id`) 
    VALUES (null,'$price','$price',now(),'$student_id', '$course_id')";
    $sql_sub_doc = "UPDATE course_doc SET soluong = soluong - 1 WHERE course_id = ". $course_id;
    if( mysqli_query($conn, $sql) && mysqli_query($conn, $sql_sub_doc)){
        $sql_check = "SELECT id from invoice order by id desc limit 1";
        $res_check = mysqli_query($conn,$sql_check);
        echo mysqli_fetch_assoc($res_check)['id'];
        $sql_student = "UPDATE `hocvien` SET `tinhtranghocphi`= 1 WHERE id = ". $student_id;
        mysqli_query($conn, $sql_student);
    }
    else {
        echo 'fail';
    }
    
?>