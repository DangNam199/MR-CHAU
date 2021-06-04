<?php 
    include '../php/connect.php';
if (isset($_GET['file_id'])) {
    $id = $_GET['file_id'];

    // fetch file to download from database
    $sql = "SELECT * FROM homework WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($result);
    $file = $row['file'];
    
    header("Content-type: application/pdf");
    header('Content-disposition: attachment; filename="'.$name.'"');
    print $file;
}
if (isset($_GET['submit_id']) && isset($_GET['homework_id'])) {
    $id = $_GET['submit_id'];
    $homework_id = $_GET['homework_id'];


    // fetch file to download from database
    $sql = "SELECT * FROM homework_student_rel WHERE student_id = '$id' and homework_id = '$homework_id'";
    echo $sql;
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $file = $row['file'];
    header("Content-type: application/pdf");
    header('Content-disposition: attachment; filename="'.$name.'"');
    print $file;
}
?>