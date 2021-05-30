<?php 
    include '../connect.php';
    if(isset($_POST['id_degree'])){
        $id_degree = $_POST['id_degree'];
        $return_arr = array();

    $res_course = mysqli_query($conn, "SELECT * FROM `course` WHERE `degree_id` = $id_degree");
    while($row = mysqli_fetch_array($res_course))
        {
            $id = $row['id'];
            $name = $row['tenKH'];
            $duration = $row['duration'];
            $price = $row['price'];
            $time = $row['time'];
            $return_arr[] = array("id" => $id,
                    "name" => $name,
                    "duration" => $duration,
                    "price" => $price,
                    "time" => $time,
                );
        }
        $json = json_encode($return_arr);
        echo $json;
}
?>