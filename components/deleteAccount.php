<?php
session_start();
require("../config/connectDB.php");
// require("")

$id = $_SESSION['id'];
// echo "hyjgfwjf";
// exit();

if($id){
    $delUser = "DELETE FROM `users_table` WHERE id = $id";
    mysqli_query($conn, $delUser);

    echo "<script>alert('Your account deleted successfully!');</script>";
    echo "<script>document.location.href = '/HomePage.php';</script>";
    // header(location : './SignIn.php');
}

?>