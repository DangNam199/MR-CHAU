<?php 
    include '../../php/connect.php';
    if (isset($_POST['submit']) && empty($_FILES['image']['tmp_name'])==false){
        $id = $_POST['id'];
        $tenkh = $_POST['TenKH'];
        $date_from = $_POST['TimebdKH'];
        $date_to = $_POST['TimektKH'];
        
        list($day,$month,$year,$hour,$min,$sec) = explode("/",date('d/m/Y/h/i/s'));
        $password =  $day.'/'.$month.'/'.$year;
  
        $sql = "INSERT INTO `course`(`id`, `TenKH`, `TimebdKH`,`TimektKH`) VALUES (null,'$tenkh','$date_from','$date_to')";

        if(mysqli_query($conn, $sql)){
            echo 'dang ky thanh cong';
        }
    }
?>