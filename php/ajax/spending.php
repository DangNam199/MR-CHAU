<?php 
    include '../connect.php';
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $type = $_POST['type'];
    $sql_spending = "INSERT INTO `spending`(`id`, `name`, `price`, `description`, `date`, `type`) VALUES (null,'$name','$price','$description',now(), '$type')";
    $res = mysqli_query($conn, $sql_spending);
    if($res){
        $id = mysqli_insert_id($conn);
        echo $id;
    }
    else {
        echo 'fail';
    }
    


?>