<?php 
    include '../connect.php';
    if(isset($_POST['time_from']) && isset($_POST['time_to']) && isset($_POST['date_from']) && isset($_POST['date_to']) && isset($_POST['sum_weekDay'])){
        $time_from = $_POST['time_from'];
        $time_to = $_POST['time_to'];
        $date_from = $_POST['date_from'];
        $date_to = $_POST['date_to'];
        $sum_weekDay = (int)$_POST['sum_weekDay'];
        $sql = "SELECT room.id as 'room_id', class.id as 'class_id', class.name as 'class_name', class.weekdays ,
        class.date_from, class.date_to, class.time_from, class.time_to FROM class INNER JOIN room ON class.room_id = room.id 
        WHERE `class.date_from`<= $date_from and `class.date_to` => $    and `class.time_from` and `class.time_to`
        ";
    }

?>