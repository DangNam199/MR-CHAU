<?php 
    $sql_setting = "SELECT * FROM general_setting where state = 'primary'";
    $res_setting = mysqli_fetch_assoc(mysqli_query($conn, $sql_setting));
    $sql_setting_social = "SELECT * FROM social_setting where state = 'primary'";
    $res_social_setting = mysqli_fetch_assoc(mysqli_query($conn, $sql_setting_social));
    
?>