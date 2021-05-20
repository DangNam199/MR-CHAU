<?php 
    session_start();
    include '../connect.php';
    include '../weekday.php';
    $user = $_SESSION['user'];
    $sql_user = "SELECT * FROM hocvien where email = '" . $user . "' limit 1";
    $row = mysqli_fetch_assoc(mysqli_query($conn,$sql_user));
    $sql = "SELECT * FROM class_have where class_id = ". $row['class_id'];
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