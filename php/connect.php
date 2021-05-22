<?php
    $hostname = '127.0.0.1';
    $username = 'root';
    $password = '';
    $dbname = "doan";
    $conn = mysqli_connect($hostname, $username, $password,$dbname);
    mysqli_set_charset($conn, "utf8");
    if (!$conn) {
        exit();
    }
    date_default_timezone_set("Asia/Bangkok");      
    $sql_class = "SELECT * FROM class where state !='studing'";
    $res = mysqli_query($conn, $sql_class);
    if (mysqli_num_rows($res) >=0 ){
        while($row = mysqli_fetch_assoc($res)){
            if ($row['date_from '] == date()){
                $sql_set = "UPDATE `class` SET `state`='studing' WHERE id = " . $row['id'];
                mysqli_query($conn, $sql_set);
            }
        }
    }




?>