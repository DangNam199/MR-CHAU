<?php 
    include 'connect.php';
    if (isset($_POST['submit']) && empty($_FILES['image']['tmp_name'])==false){

        $idKH = $_POST['idKH'];
        $idTL = $_POST["idTL"];
        $sql = "INSERT INTO `temp`(`idKH`, `idTL`) VALUES ('$idKH','$idTL')";
        if(mysqli_query($conn, $sql)){
            echo 'thanh cong';
        }
    }
?>