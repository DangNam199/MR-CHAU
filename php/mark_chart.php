<?php 
    include 'connect.php';
    if(isset($_POST['student_id'])){
        $student_id = $_POST['student_id'];
    $sql_label = "SELECT DISTINCT date FROM `mark` WHERE student_id = $student_id ORDER BY date";
    $res_label = mysqli_query($conn, $sql_label);
    $return_arr = [];

    while ($row_label = mysqli_fetch_assoc($res_label)){
        $date = $row_label['date'];
        $label[] =  $date;

        $sql_listen = "SELECT mark from mark where date = '$date' and type = 'nghe'";
        $res_listen = mysqli_query($conn, $sql_listen);
        if (mysqli_num_rows($res_listen) == 0){
            $temp_listen[] = null;
        }
        else{
            while ($row_listen = mysqli_fetch_assoc($res_listen)){
                $temp_listen[] = intval ($row_listen['mark']);
            }
        }
        $sql_speak = "SELECT mark from mark where date = '$date' and type = 'noi'";
        $res_speak = mysqli_query($conn, $sql_speak);
        if (mysqli_num_rows($res_speak) == 0){
            $temp_speak[] = null;
        }
        else{
            while ($row_speak = mysqli_fetch_assoc($res_speak)){
                $temp_speak[] =  intval( $row_speak['mark']);
            }
        }
        $sql_read = "SELECT mark from mark where date = '$date' and type = 'doc'";
        $res_read = mysqli_query($conn, $sql_read);
        if (mysqli_num_rows($res_read) == 0){
            $temp_read[] = null;
        }
        else {
            while ($row_read = mysqli_fetch_assoc($res_read)){
                $temp_read[] = intval($row_read['mark']);
            }
        }
        $sql_write = "SELECT mark from mark where date = '$date' and type = 'viet'";
        $res_write = mysqli_query($conn, $sql_write);
        if (mysqli_num_rows($res_write) == 0){
            $temp_write[] = null;
        }
        else {
            while ($row_write = mysqli_fetch_assoc($res_write)){
                $temp_write[] = intval($row_write['mark']);
            }
        }
    }
    array_push($return_arr,$label);
    array_push($return_arr,$temp_listen);
    array_push($return_arr,$temp_speak);
    array_push($return_arr,$temp_read);
    array_push($return_arr,$temp_write);
     echo json_encode($return_arr);
    }
    else {
        echo 'fail';
    }
?>