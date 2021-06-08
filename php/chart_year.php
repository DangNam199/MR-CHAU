<?php 
    include 'connect.php';
    if (isset($_POST['year'])){
    $year = intval($_POST['year']);
    $months = [1,2,3,4,5,6,7,8,9,10,11,12];
    $all_in = [];
    $all_out = [];
    foreach($months as $month){
        $all_in[] =  get_in($conn, $month, $year);
        $all_out[] =  get_out($conn, $month, $year);
    }
    $re = array();
    array_push($re, $all_in);
    array_push($re, $all_out);
    echo json_encode($re);
}
function get_out($conn, $month, $year){
    $sql_paid = "SELECT sum(paied) as 'sum_paid'  FROM pay_salary WHERE month(pay_salary.date) = $month  and YEAR(pay_salary.date) = $year and `state` = 'paid'";
    $res_paid = mysqli_fetch_assoc( mysqli_query($conn,$sql_paid))['sum_paid'];
    $sql_spending = "SELECT SUM(price) as 'sum_price' from spending WHERE month(spending.date) = $month  and YEAR(spending.date) = $year";
    $res_spending = mysqli_fetch_assoc(mysqli_query($conn, $sql_spending))['sum_price'];
    $total_out = intval($res_paid) + intval($res_spending);
    return $total_out;
}
function get_in ($conn, $month, $year){
    $sql_in = "SELECT SUM(paid) as 'sum_pay', COUNT(invoice.student_id) as 'student_count', invoice.date, course.tenKH  FROM invoice INNER JOIN course on invoice.course_id = course.id 
     WHERE month(invoice.date) = $month  and YEAR(invoice.date) = $year GROUP BY `course_id`";
    $res_in =intval( mysqli_fetch_assoc( mysqli_query($conn,$sql_in))['sum_pay']);
    return $res_in;
}
?>