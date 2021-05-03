<?php 
    include 'connect.php';
    if (isset($_POST['id']) && $_POST['table']){
        $table = $_POST['table'];
        $id = $_POST['id'];
    $sql = "DELETE FROM `$table` WHERE id = " .$id ;
    if(mysqli_query($conn, $sql)){
        echo 'success';
    }
    }
?>