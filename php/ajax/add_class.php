<?php 
    include '../connect.php';
    $teacher = $_POST['teacher'];
    $name_class = $_POST['name_class'];
    $tutors = $_POST['tutors'];
    $date_from = $_POST['date_from'];
    $date_to = $_POST['date_to'];
    $time_from = $_POST['time_from'];
    $time_to = $_POST['time_to'];
    $weekdays =$_POST['weekDay'];
    $id_course = $_POST['id_course'];
    $id_room = $_POST['id_room'];
    $id = 1;
    $sql_class = "SELECT id from class ORDER BY id DESC";
    $res = mysqli_query($conn,$sql_class);
    if($res){
        if(mysqli_num_rows($res) != 0){
            $res_array = mysqli_fetch_array($res);
            $id = $res_array['id'] + 1;
        }
    }

    $sql_class = "INSERT INTO `class`(`id`, `name`, `date_from`, `date_to`, `time_from`, `time_to`, `weekdays`, `course_id`, `room_id`) 
    VALUES ('$id','$name_class','$date_from','$date_to','$time_from','$time_to','$weekdays','$id_course','$id_room');";

    $sql_teacher = "INSERT INTO `class_staff_rel`(`class_id`, `staff_ref`) VALUES ('$id','$teacher');";

    $sql_tutors = '';

    foreach ($tutors as $tutor) {
        $sql_tutors .= "INSERT INTO `class_staff_rel`(`class_id`, `staff_ref`) VALUES ('$id','$tutor');";
      }
    

    if(mysqli_query($conn, $sql_class) && mysqli_query($conn, $sql_teacher) && mysqli_multi_query($conn, $sql_tutors)){
        echo 'success';
    }
    else{
        echo $sql_class;
        echo $sql_teacher;
        echo $sql_tutors;
    }

?>