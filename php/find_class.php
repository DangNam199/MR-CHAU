<?php 
    include 'connect.php';
    $sql_class = "SELECT * FROM class where state = 'studing'";
    $res_class = mysqli_query($conn, $sql_class);
    $arr_id = [];
    while($row_class = mysqli_fetch_assoc($res_class)){
        echo $row_class['id'];
    }
?>