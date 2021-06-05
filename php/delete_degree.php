<?php 
    include 'connect.php';
    include 'delete_course.php';
    if(isset($_POST['degree_id'])){
        $id = $_POST['degree_id'];
        $sql_course_check = "SELECT * FROM course where degree_id = $id";
        $res_course_check = mysqli_query($conn, $sql_course_check);
        if (mysqli_num_rows($res_course_check) == 0 ){
            delete($id, $conn);
        }
        else{
            $is_delete = true;
            while($row = mysqli_fetch_assoc($res_course_check)){
                $check = delete_course($row['id'], $conn);
                if ($check == 'cannot'){
                    $is_delete = false;
                    break;
                }
            }
            if($is_delete == true){
                delete($id, $conn);
            }
            else {
                echo 'cannot';
            }
        }
    }
    function delete($id, $conn){
        $sql_delete = "DELETE from degree where id = $id ";
        $res = mysqli_query($conn, $sql_delete);
        if ($res){
            echo 'success';
        }
        else {
            echo 'fail';
        }
    }

?>