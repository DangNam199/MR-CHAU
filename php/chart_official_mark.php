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
        $count = 1;
        for ($i = $min; $i<=$max; $i += 0.5)
        {
            $label[] = floatval($i);
            $sql_count = "SELECT COUNT(id) as 'count_total' from official_mark where total = $i" ;
            $count = mysqli_fetch_assoc(mysqli_query($conn, $sql_count))['count_total'];
            $mark[] = floatval($count);
            $count ++;
        }
        $temp_count = array();
        $return_arr = array();
        $temp_count[] = $count;
        array_push($return_arr, $temp_count);
        array_push($return_arr, $label);
        array_push($return_arr, $mark);
        echo json_encode($return_arr);

        
?>