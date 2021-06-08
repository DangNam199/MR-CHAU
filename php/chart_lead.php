<?php 
    include 'connect.php';
    $date = $_POST['date'];
    $year = $_POST['year'];
    $sql_success = "SELECT COUNT(id) as 'count_success' from lienhe WHERE state = 'success' and MONTH(date) = $date and YEAR(date) = $year";
    $res_success = mysqli_fetch_assoc(mysqli_query($conn, $sql_success))['count_success'];
    $sql_fail = "SELECT COUNT(id) as 'count_normal' from lienhe WHERE state in ('draft','contacted') and MONTH(date) = $date and YEAR(date) = $year";

    $res_fail = mysqli_fetch_assoc(mysqli_query($conn, $sql_fail))['count_normal'];
    $re = intval($res_success) .",". intval($res_fail);
    echo $re;


?>