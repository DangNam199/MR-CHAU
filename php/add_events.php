<?php
    include 'connect.php';
    if (isset($_POST['submit']) && empty($_FILES['image']['tmp_name'])==false){

        $uploaddir = '../images/';
        move_uploaded_file($_FILES['image']['tmp_name'], $uploaddir.time().$_FILES['image']['name']);
        $file = $uploaddir.time().$_FILES['image']['name'];

        $name = $_POST['news_name'];
        $context = $_POST["textarea"];
        $sql = "INSERT INTO `tintuc`(`id`, `TenTT`, `NoiDungTT`, `thumbnail`) VALUES (null,'$name','$context','$file')";
        if(mysqli_query($conn, $sql)){
            header("location: ../administration/all_news.php");
        }
    }
?>
