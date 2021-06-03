<?php 
    include '../connect.php';
    if (isset($_POST['approve'])){
        $id = $_POST['id'];
        $date = $_POST['date'];
        if($_POST['approve'] == 'true'){
            if(isset($_POST['value']) ){
            
            $value = $_POST['value'];
            
            $sql_search = "UPDATE `chamcong` SET `real_work_time`='$value',`state`='approve' WHERE id = $id and date = '$date'";
            if (mysqli_query($conn, $sql_search)){
                echo 'success';
            }
            else {
                echo 'fail';
            }
        }
        }
       
        if ($_POST['approve'] == 'false'){
            $sql_reject = "UPDATE `chamcong` SET `state`='reject' WHERE id = $id and date = '$date'";
            if (mysqli_query($conn, $sql_reject)){
                echo 'success';
            }
            else {
                echo 'fail';
            }
        }
}

?>