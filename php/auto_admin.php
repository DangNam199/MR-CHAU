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
            $total = $row['sum_salary'] * $row['HSL'];

            $staff_id = $row['staff_id'];
            $sql_pay  = "INSERT INTO `pay_salary`(`id`, `staff_id`, `date`, `paied`) 
            VALUES (null,'$staff_id',now(),'$total')";
            $res = mysqli_query($conn, $sql_pay);
        }
        }
    }
    
    

?>