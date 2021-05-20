<?php 
    include '../../connect.php';
    $id = $_POST['id'];
    $name = $_POST['name'];
    $certi = $_POST['certi'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $level_id = $_POST['level_id'];
    $hsl = $_POST['hsl'];
    $cmnd = $_POST['cmnd'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    if ( empty($_FILES['avatar']['tmp_name'])==false){
        $file = addslashes(file_get_contents($_FILES['avatar']['tmp_name']));
        $sql = "UPDATE `nhanvien` SET `TenNV`='$name',`NgaySinh`='$dob',`gender`='$gender',
        `sdt`='$phone',`address`='$address',
        `CMND`='$cmnd',`ChungChi`='$certi',`HSL`='$hsl',
        `email`='$email',`level_id`='$level_id', `avatar`='$file' WHERE id = $id";
    }
    else {
        $sql = "UPDATE `nhanvien` SET `TenNV`='$name',`NgaySinh`='$dob',`gender`='$gender',
        `sdt`='$phone',`address`='$address',
        `CMND`='$cmnd',`ChungChi`='$certi',`HSL`='$hsl',
        `email`='$email',`level_id`='$level_id' WHERE id = $id";
    }
    if (mysqli_query($conn, $sql)){
        echo 'success';
        
    }
    else {
        echo 'fail';
    }

?>
