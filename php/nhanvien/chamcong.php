<?php 
    include '../connect.php';
    if (isset($_POST['check_in'])){
        $all_time = $_POST['all_time'];
        $time_begin = strtotime($all_time[0]);
        $staff_id = $_POST['staff_id'];
        $check_in = $_POST['check_in'];
        $time_end = strtotime($all_time[1]);
        $this_date  = date('Y/m/d', $time_begin);
        $shift_begin = date('H:i:s', $time_begin);
        $shift_end = date('H:i:s', $time_end);
        $sql_check = "SELECT * FROM `chamcong` where staff_id = $staff_id and date = '$this_date'";
        $res = mysqli_query($conn, $sql_check);
        if (mysqli_num_rows($res)  == 0 ) {
        $sql_first = "INSERT INTO `chamcong`(`id`, `staff_id`,`shift_begin`, `shift_end`, `real_begin`, `real_end`, `date`, `real_work_time`, state) 
        VALUES (null, $staff_id,'$shift_begin','$shift_end','$check_in','','$this_date','','pending')";
        if (mysqli_query($conn, $sql_first)){
            echo 'success';
        }
        else {
            echo $sql_first;
        }
        }
    }
    if (isset($_POST['check_out']) && isset($_POST['date']) ){
        $orgDate = $_POST['date'];
        $date = date("Y-m-d", strtotime($orgDate));  
        $staff_id = $_POST['staff_id'];
        $sql_check = "SELECT * FROM `chamcong` where staff_id = $staff_id and date = '$date'";
        $res = mysqli_query($conn, $sql_check);
        if (mysqli_num_rows($res) == 1 ) {
            $sql = "UPDATE `chamcong` SET `real_end`= now() WHERE staff_id = 69 and date = '$date'";
            if (mysqli_query($conn, $sql)){
                echo 'success';
            }
        }
        else {
            echo 'no check_in';
        }
    }


?>