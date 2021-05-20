<?php 
    include '../connect.php';
    if(isset($_POST['id_course'])){
        $id_course = $_POST['id_course'];
        $sql = "SELECT * FROM course where id =". $id_course;

        if(mysqli_query($conn,$sql)){
            $res = mysqli_fetch_assoc(mysqli_query($conn,$sql));
            $res_arr = array(
            "name" => $res['tenKH'],
            "duration" => $res['duration'],
            "price" => $res['price'],
            "time" => $res['time'],
                );
            echo json_encode($res);
        }
    }
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