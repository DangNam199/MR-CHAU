<?php 
include '../connect.php';
    $id = $_POST['id'];
    $sql_check = "SELECT nhanvien.id as 'staff_id', class_id, class.state as 
    'class_state', class.name as 'class_name', class.id as 'class_id' FROM `class_staff_rel` 
    INNER JOIN class on class_staff_rel.class_id = class.id inner JOIN
     nhanvien on class_staff_rel.staff_ref = nhanvien.id WHERE class.state in( 'studing', 'waiting') and nhanvien.id = $id";
    $res_check = mysqli_query($conn, $sql_check);
    if (mysqli_num_rows($res_check) == 0){
        $sql = "UPDATE `nhanvien` SET `state`='done' WHERE id = ".$id .';';
        $sql .= "UPDATE `contract` SET `state`='done' WHERE staff_id = $id;";
        if (mysqli_multi_query($conn, $sql)){
            echo 'success';
        }
        else {
            echo 'fail';
        }
    }
    else {
        echo "cannot";
    }
?>