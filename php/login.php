<?php
    include '../php/connect.php';
    session_start();
    if ( isset($_POST['submit'])){
        $user = $_POST['user'];
        $password = $_POST['password'];
        $password = md5($password);
        $sql = "SELECT email, password FROM `nhanvien` WHERE email='$user' and password='$password'";
        $res = mysqli_query($conn, $sql);
        if (mysqli_num_rows($res) == 1){
            header("location: ../production/index.html");
        }
        else {
            $_SESSION['message'] = 'Wrong email or password';   
        }
    }
?>
