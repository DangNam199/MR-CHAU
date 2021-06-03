<?php 
    include '../connect.php';
    if (isset($_POST['id']) && $_POST['student'] ){
        $id = $_POST['id'];
        $students = $_POST['student'];
        $sql_price = 'SELECT * FROM `price_by_class` where id ='.$id;
        $res_price = mysqli_fetch_assoc(mysqli_query($conn, $sql_price));
        $price = $res_price['price'];
        $sql = "";
        foreach ($students as $st){
            $sql .= "UPDATE `hocvien` SET class_id='$id', state='studing' WHERE id = $st;";
        }
        $res = mysqli_multi_query($conn, $sql);
        if ($res){
            echo 'success';
        }
        else {
            echo $sql;
            echo 'fail';
        }
    }

?>