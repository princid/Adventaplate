<?php

session_start();

require ('../../config/connectDB.php');

if (isset($_POST["update_user_role"])) {

    $user_data_id = $_POST['user_data_id'];
    $new_role = $_POST['role'];

    $update_role = "UPDATE users_table SET user_role_status = '$new_role' WHERE id = '$user_data_id' ";
   
    $update_role_run = mysqli_query($conn, $update_role);
    
    if ($update_role_run) {
        header("location: http://localhost/PHP_Assesments/Adventaplate/admin/Dashboard.php");
        exit;
    }

}



?>