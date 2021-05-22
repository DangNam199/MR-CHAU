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
        return '#'.random_color_part() . random_color_part() . random_color_part();
    }
    
    while($row = mysqli_fetch_array($res))
        {
            $color = random_color();
            $lession = 1;
            $date_from = $row['date_from'];
            $date_to = $row['date_to'];
            $weekdays = getListWeekdayInFull($row['weekdays']);
            while (strtotime($date_from) <= strtotime($date_to)) {
                if (in_array(date('l', strtotime($date_from)), $weekdays)){
                    $time_from = $row['time_from'];
                    $time_to = $row['time_to'];
                    $start = date('Y-m-d H:i:s', strtotime("$date_from $time_from"));
                    $end = date('Y-m-d H:i:s', strtotime("$date_from $time_to"));
                    // $start = $date_from;
                    // $end = date('Y-m-d H:i:s', strtotime("$date_from $time_to"));
                    $temp_arr[] = array(
                    "id" => $row['class_id'],
                    "title" => $row['class_name'] .' |Buổi: '. $lession,
                    "start" => $start,
                    "end" => $end,
                    'color'=> $color,
                    'url'=> 'attendance.php?lession='. $lession.'&class_id='.$row['class_id']
                    );
                    $lession++;
                }
                $date_from = date ("Y-m-d", strtotime("+1 days", strtotime($date_from)));
            }  
        }
        echo json_encode($temp_arr);
?>