<?php 
    include 'connect.php';
    function get_end_contract($conn){
    $sql_probation = "SELECT * FROM contract_end";
    $contracts = [];
    $res = mysqli_query($conn, $sql_probation);
    while ($row = mysqli_fetch_assoc($res)){
        $array = array(
            "contract_id" => $row['contract_id'],
            'contract_name' => $row['contract_name'],
            "date_from" => $row['date_from'],
            "type" => $row['type'],
            "staff_name" => $row['staff_name'],
            "staff_id" => $row['staff_id'],
            "level_name" => $row['level_name'],
        );
        array_push($contracts, $array);
        }
        return $contracts;
    }
    // function salary($conn){
    //     $sql_salary = "SELECT * FROM chamcong";
    //     echo $sql_salary;   
    //     $res = mysqli_query($conn, $sql_salary);
    //     if ($res){
    //         echo 'true';
    //     }
    //     while($row = mysqli_fetch_assoc($res)) {
    //         //$total = $row['sum_salary'] * $row['HSL'];
    //         $staff_id = $row['staff_id'];
    //         $sql_pay  = "INSERT INTO `pay_salary`(`id`, `staff_id`, `date`, `paied`) 
    //         VALUES (null,'$staff_id',now(),'')";
    //         $res = mysqli_query($conn, $sql_pay);
    //     }
    
    
        if(date('d') == 1){
            $sql_salary = "SELECT sum(chamcong.real_work_time) as 'sum_salary' ,staff_id, chamcong.id as 'chamcong_id', nhanvien.HSL from chamcong INNER JOIN nhanvien on chamcong.staff_id = nhanvien.id where chamcong.state = 'approve' 
            and real_work_time is NOT NULL and date>now() - interval 1 month GROUP BY staff_id"; 
        $res_salary = mysqli_query($conn, $sql_salary);
        if ($res){
           while($row = mysqli_fetch_assoc($res_salary)) {
            $staff_id = $row['staff_id'];
            $sql_check_contract = "SELECT * FROM contract where state = 'effected' and staff_id = $staff_id";
            $type = mysqli_fetch_assoc(mysqli_query($conn, $sql_check_contract))['type'];
            if ($type == 'probation'){
                $total = $row['sum_salary'] * $row['HSL'] * 0.75;
                echo $staff_id;
            }
            else if ($type == 'official'){
                $total = $row['sum_salary'] * $row['HSL'];
            }
            $sum = $row['sum_salary'];
            $sql_pay  = "INSERT INTO `pay_salary`(`id`, `staff_id`, `paied`,`total`, `state`) 
            VALUES (null,'$staff_id','$total', '$sum',`unpaid`)";
            $res = mysqli_query($conn, $sql_pay);
        }
        }
    }
    
    $sql_class_exam = "SELECT * FROM class where state = 'studing' and date_to < now()";
    $res_class_exam = mysqli_query($conn, $sql_class_exam);
    while ($row_class_exam = mysqli_fetch_assoc($res_class_exam)){
        $sql_update_class_exam = "UPDATE `class` SET `state`='waiting_exem' WHERE id = ". $row_class_exam['id'];
        mysqli_query($conn, $sql_update_class_exam);
        $sql_student = "UPDATE `hocvien` SET `class_id`=null,`tinhtranghocphi`= null,`state`= 'draft' WHERE class_id =  ". $row_class_exam['id'];
        $res_student = mysqli_query($conn, $sql_student);

    }

    $sql_class_waiting = "SELECT * FROM class where state ='waiting'";
    $res_class_waiting = mysqli_query($conn, $sql_class_waiting);
    while($row_class_waiting = mysqli_fetch_assoc($res_class_waiting)){
        if ($row_class_waiting['date_from'] == date("Y-m-d")){
        $sql_update_class_waiting = "UPDATE `class` SET `state`='studing' WHERE id = " . $row_class_waiting ['id'];
        mysqli_query($conn, $sql_update_class_waiting);
        }
    }
    
    
    $sql_class_done_exam = "SELECT * FROM class where state ='waiting_exam'";
    $res_class_done_exam = mysqli_query($conn, $sql_class_done_exam);
    while($row_class_done_exam = mysqli_fetch_assoc($res_class_done_exam)){
        if ($row_class_done_exam['date_exam'] == date("Y-m-d")){
        $sql_update_class_done_exam = "UPDATE `class` SET `state`='marking' WHERE id = " . $row_class_done_exam ['id'];
        mysqli_query($conn, $sql_update_class_done_exam);
        }
    }

?>