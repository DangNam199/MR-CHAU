<?php 
    include '../connect.php';
    if ( empty($_FILES['homework']['tmp_name'])==false && isset($_POST['deadline'])){
        $file = addslashes(file_get_contents($_FILES['homework']['tmp_name']));
        $deadline = $_POST['deadline'];
        $file_name =  $_FILES['homework']['name'];
        $class_id =  $_POST['class_id'];
        $sql_student = "SELECT id FROM hocvien where class_id = $class_id and state='studing'";
        $res_student = mysqli_query($conn, $sql_student);
        $sql = "INSERT INTO `homework`(`id`, `name`, `file`, `deadline`, `class_id`, `state`)
         VALUES (null,'$file_name','$file','$deadline','$class_id', 'new')";
        if (mysqli_query($conn, $sql)){
            $id = mysqli_insert_id($conn);
            $sql_home_stu = '';
             while($row_student = mysqli_fetch_assoc($res_student)) {
                $id_student = $row_student['id'];
                $sql_home_stu .= "INSERT INTO `homework_student_rel`(`homework_id`, `student_id`, `file`, `datetime_submit`) 
                VALUES ('$id','$id_student',null,null)";
             }
            
             if ( mysqli_multi_query($conn, $sql_home_stu)){
                 echo 'success';
             }
        }
        else {
            echo 'fail';
        }
    }
    else {
    echo 'empty';
    }
?>