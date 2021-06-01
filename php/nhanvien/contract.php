<?php 
    include '../connect.php';
    $staff_id = $_POST['staff_id'];
    $name = $_POST['name'];
    $contract_type = $_POST['contract_type'];
    $salary = $_POST['salary'];
    $sql_old = "UPDATE `contract` SET `state`='done' WHERE staff_id = $staff_id and state = 'effected';";
    mysqli_query($conn, $sql_old);
    $month = $_POST['month'];
    $sql_contract = "INSERT INTO `contract`(`id`, `name`, `staff_id`, `date_from`, `date_to`, `type`, `state`) 
    VALUES (null,'$name','$staff_id',now(), DATE_ADD(now(), INTERVAL $month MONTH),'$contract_type','effected');";
    if (isset($_POST['salary'])){
        $sql_contract .= "UPDATE `nhanvien` SET `HSL`='$salary' WHERE id = ". $staff_id .';';
    }
    if (mysqli_multi_query($conn, $sql_contract)){
        echo 'success';
    }
    else {
        echo 'fail';
    }

?>