<?php 
    include '../php/connect.php';
if (isset($_GET['file_id'])) {
    $id = $_GET['file_id'];

    // fetch file to download from database
    $sql = "SELECT * FROM homework WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($result);
    $file = $row['file'];
    $name = $row['name'];
    header("Content-type: application/pdf");
    header('Content-disposition: attachment; filename="'.$name.'"');
    print $file;
}
if (isset($_GET['submit_id'])) {
    $id = $_GET['submit_id'];

    // fetch file to download from database
    $sql = "SELECT * FROM homework_student_rel WHERE student_id =$id";
    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($result);
    $file = $row['file'];
    $sql_name = "SELECT name from hocvien where id = ". $id;
    $name = mysqli_fetch_assoc(mysqli_query($conn, $sql_name))['name'];
    header("Content-type: application/pdf");
    header('Content-disposition: attachment; filename="'.$name.'"');
    print $file;
}
?>