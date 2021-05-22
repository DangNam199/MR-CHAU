<?php 
    session_start();
    include 'connect.php';
    $user = $_SESSION['user'];
    if(!isset($_SESSION['user']))
    {
        header("location: login.php");
    }
    if (!isset($_SESSION['level'])){
        $sql_user = "SELECT * FROM nhanvien where email ='".$user."' limit 1";
        $row = mysqli_fetch_assoc(mysqli_query($conn,$sql_user));
        $_SESSION['level'] = $row['level_id'];
        $_SESSION['name'] = $row['TenNV'];
        $_SESSION['avatar'] = $row['avatar'];
        $_SESSION['staff_id'] = $row['id'];
    }
?>
