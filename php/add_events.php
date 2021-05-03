<?php 
    include 'connect.php';
    if (isset($_POST['submit']) && empty($_FILES['image']['tmp_name'])==false){
        $file = addslashes(file_get_contents($_FILES['image']['tmp_name']));
        $name = $_POST['news_name'];
        $context = $_POST["textarea"];
        $sql = "INSERT INTO `tintuc`(`id`, `TenTT`, `NoiDungTT`, `thumbnail`) VALUES ('','$name','$context','$file')";
        if(mysqli_query($conn, $sql)){
            header("location: ../administration/all_news.php");
        }
    }
?>