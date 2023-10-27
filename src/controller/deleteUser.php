
<?php 

session_start();

require('../../config/connectDB.php');


if(isset($_GET['id'])){
    // echo "hfjhf";
    $id = $_GET['id'];
    $action = $_GET['action'];
    $roleAction = $_GET['roleAction'];

    $sql = "UPDATE users_table SET is_deleted = '$action', active_status = '$roleAction' WHERE id = '$id' ";
    $sql_run = mysqli_query($conn, $sql);

    if($sql_run){
        header("location: http://localhost/PHP_Assesments/Adventaplate/admin/Dashboard.php");
    }
    else{
        echo "Failed to delete the user";
    }
}



?>