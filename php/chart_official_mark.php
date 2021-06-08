<?php 
    include 'connect.php';
        $sql_student = "SELECT id from hocvien where class_id = ". 1;
        $res_student = mysqli_query($conn, $sql_student);
        $list_id = '(';
        $count = mysqli_num_rows($res_student);
        $temp_count = 0;
        while($row_student = mysqli_fetch_assoc($res_student)){
          $list_id .= $row_student['id'];
          if ($temp_count == $count -1 ){
            $list_id .= ')';
          }
          else {
            $list_id .= ',';
          }
          $temp_count++;
        }
        $sql_max_min = "SELECT max(total) as 'max' , min(total) as 'min' FROM official_mark where student_id in $list_id";
        $res_max_min = mysqli_fetch_assoc(mysqli_query($conn, $sql_max_min));
        $max = $res_max_min['max'];
        $min = $res_max_min['min'];
        $label = array();
        $mark = array();
        $color = array();

        for ($i = $min; $i<=$max; $i += 0.5)
        {
            $label[] = floatval($i);
            $sql_count = "SELECT COUNT(id) as 'count_total' from official_mark where total = $i" ;
            $count = mysqli_fetch_assoc(mysqli_query($conn, $sql_count))['count_total'];
            $mark[] = floatval($count);
            $color[] = getColor($i);

        }
        $temp_count = array();
        $return_arr = array();
        array_push($return_arr, $label);
        array_push($return_arr, $mark);
        array_push($return_arr, $color);
        echo json_encode($return_arr);

        function getColor($num) {
          $hash = md5('color' . $num); // modify 'color' to get a different palette
          $return_arr = array(
              hexdec(substr($hash, 0, 2)), // r
              hexdec(substr($hash, 2, 2)), // g
              hexdec(substr($hash, 4, 2))); //b
          $red = $return_arr[0];
          $green = $return_arr[1];
          $blue = $return_arr[2];
          $val = "rgba($red, $green, $blue, 0.6)";
          return $val;
      }
?>