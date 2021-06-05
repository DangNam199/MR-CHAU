<?php 
    include '../connect.php';

    $staff_id = $_POST['id'];
    $sql = "SELECT * FROM contract where staff_id = $staff_id";
    $return_arr = [];
    if(mysqli_query($conn,$sql)){
        $res = mysqli_query($conn,$sql);
        while ($row = mysqli_fetch_assoc($res)){

            if ($row['type'] == 'probation'){
                $type_temp = "Thử việc";
            }
            else if ($row['type'] == 'official'){
                $type_temp = "Chính thức";
            }
            if ($row['state'] == 'effected'){
                $color = '#00FF00';
                $temp_state = "Có hiệu lực";
            }
            else if ($row['state'] == 'done'){
               
                $color = '#FF0000';
                $temp_state = "Đã kết thức";
            }
            $res_arr = array(
            "id" => $row['id'],
            "name" => $row['name'],
            "date_from" => $row['date_from'],
            "date_to" => $row['date_to'],
            "type" => $type_temp,
            "state" => $temp_state,
            "color" => $color,
            );
            array_push($return_arr, $res_arr);
        }
        echo json_encode($return_arr);
    }
    
?>