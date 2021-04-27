<?php 
    include '../../php/connect.php';
    if (isset($_POST['submit']) && empty($_FILES['image']['tmp_name'])==false){
        $user_name = $_POST['user_name'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $date = $_POST['dob'];
        $phone = $_POST['phone'];
        $chungchi = $_POST['chungchi'];
        $chucvu = $_POST['position'];
        $cmnd = $_POST['cmnd'];
        $gender = $_POST['gender'];
        $hsl = $_POST['hsl'];
        
        list($day,$month,$year,$hour,$min,$sec) = explode("/",date('d/m/Y/h/i/s'));
        $password =  $day.'/'.$month.'/'.$year;
        echo $password;
        $password = md5($password);
        $file = addslashes(file_get_contents($_FILES['image']['tmp_name']));
        $sql = "INSERT INTO `nhanvien`(`id`, `TenNV`, `NgaySinh`,`gender`, `SoDT`, `CMND`, `ChungChi`, `HSL`, `email`, `password`, `level`, `avatar`) 
        VALUES ('','$user_name','$date','$gender','$phone',$cmnd,'$chungchi','$hsl','$email','$password','$chucvu','$file')";
        $sql_select = "SELECT `email` FROM `nhanvien` WHERE email='$email' ";
        $res_select = mysqli_fetch_array(mysqli_query($conn, $sql_select));
        if(empty($res_select)){
            $res = mysqli_query($conn, $sql);
            if($res){
                echo 'dang ky tai cong';
            }
            else {
                echo $sql;
            }
        }
        else {
            echo 'ten da co nguoi dung';
            echo $res_select;
        }
        
}
?>
