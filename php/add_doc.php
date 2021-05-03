<?php 
    include 'connect.php';
    if (isset($_POST['id'])){
        $id = $_POST['id'];
        $soluong = $_POST['number'];
        $sql = 'SELECT `soluong` from `tailieu` WHERE id ='. $id;
        $res =  mysqli_fetch_array(mysqli_query($conn,$sql));
        $new = (int)$soluong +  (int)$res['soluong'];
        $sql ='UPDATE `tailieu` SET `soluong`= '.$new.' WHERE id ='. $id;
        $res = mysqli_query($conn, $sql);
        echo $new;
    }
?>