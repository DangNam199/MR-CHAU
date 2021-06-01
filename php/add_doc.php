<?php 
    include 'connect.php';
    if (isset($_POST['id'])){
        $id = $_POST['id'];
        $soluong = $_POST['number'];
        $sql = 'SELECT `soluong`, tenTL, price from `tailieu` WHERE id ='. $id;
        $res =  mysqli_fetch_array(mysqli_query($conn,$sql));
        $new = (int)$soluong +  (int)$res['soluong'];
        $sql ='UPDATE `tailieu` SET `soluong`= '.$new.' WHERE id ='. $id;
        $res = mysqli_query($conn, $sql);
        $sql_doc = 'SELECT `soluong`, tenTL, price from `tailieu` WHERE id ='. $id;
        $res_new =  mysqli_fetch_array(mysqli_query($conn,$sql_doc));
        $name = "Thêm số lượng tài liệu";
        $decripstion = "Thêm ". $soluong .' cho '. $res_new['tenTL'];
        $total = $res_new['price'] * $soluong;
        $sql_spending = "INSERT INTO `spending`(`id`, `name`, `price`, `description`, `date`, `type`) 
        VALUES (null,'$name','$total','$decripstion',now(),'add document')";
        $res_invoice = mysqli_query($conn, $sql_spending);
        echo $new;
    }
?>