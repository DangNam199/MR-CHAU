<?php 
    include '../connect.php';
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $date = $_POST['dob'];
    $gender = $_POST['gender'];
    $lead_id = $_POST['lead_id'];
    if ( empty($_FILES['avatar']['tmp_name'])==false){
        $file = addslashes(file_get_contents($_FILES['avatar']['tmp_name']));
        list($year,$month,$day) = explode("-",$date);
        $password =  $day.'/'.$month.'/'.$year;
        $password = md5($password);
        $sql = "INSERT INTO `hocvien`(`id`, `name`, `dob`, `address`, `sdt`, `email`, `password`, `gender`,`avatar`, `ngaynhaphoc` ) 
        VALUES (null,'$name','$date','$address','$phone','$email','$password','$gender','$file',now());";
        $sql .= "UPDATE `lienhe` SET`state`='success' WHERE id = $lead_id;";
        $res = mysqli_multi_query($conn, $sql);
        if($res){
            echo 'success';
        }
        else {
            echo 'fail';
        }

    }

?>