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
?>
