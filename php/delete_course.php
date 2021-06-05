<?php 
    include 'connect.php';
    if(isset($_POST['course_id']) && $_POST['course_id'] !=''){
        $id= $_POST['course_id'];
        echo delete_course($id, $conn);
    }
    function delete_course($id, $conn){
        $sql_check = "SELECT * FROM class where course_id = $id and state in ('studing', 'waiting')";
        $res_check = mysqli_query($conn, $sql_check);
        if (mysqli_num_rows($res_check) == 0){
            $sql = "DELETE FROM `course` WHERE id = $id" ;
            if(mysqli_query($conn, $sql)){
                return 'success';
            }
            else {
                return 'fail';
            }
        }   
        else {
            return 'cannot';
        }
    }

?>