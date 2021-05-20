<?php 
    include '../connect.php';
    include '../weekday.php';
    include '../session.php';
        
    
    $sql = "SELECT class.name as 'class_name', class.id as 'class_id', class.time_from, class.time_to, class.weekdays, class.date_from, class.date_to FROM `class_staff_rel` INNER JOIN nhanvien on class_staff_rel.staff_ref = nhanvien.id INNER JOIN class on class_staff_rel.class_id = class.id WHERE nhanvien.email = '" . $user . "' and class.state = 'studing'";
    $res = mysqli_query($conn, $sql);
    $array = array();
    function random_color_part() {
        return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
    }
    
    function random_color() {
        return random_color_part() . random_color_part() . random_color_part();
    }
    while($row = mysqli_fetch_array($res))
        {
            $id = $row['class_id'];
            $title = $row['class_name'];
            $startTime = $row['time_from'];
            $endTime = $row['time_to'];
            $startRecur = $row['date_from'];
            $endRecur = $row['date_to'];
            $daysOfWeek = getListWeekdayInFull($row['weekdays']);
            $return_arr[] = array("id" => $id,
                    "id" => $id,
                    "title" => $title,
                    "startTime" => $startTime,
                    "endTime" => $endTime,
                    "startRecur" => $startRecur,
                    "endRecur" => $endRecur,
                    "daysOfWeek" => $daysOfWeek,
                );
        }
        $json = json_encode($return_arr);
        echo $json;
    
?>