<?php

session_start();
require("../config/connectDB.php");
require("../src/controller/userData.php");
// echo "hfdjkhf";
// exit();
$id = $_SESSION['id'];

if (!empty($new_image)) {

    $delProfilePic = "UPDATE `users_table` SET `user_profile_image` = NULL WHERE id = $id ";
    mysqli_query($conn, $delProfilePic);

    echo "<script>alert('Profile Picture removed successfully!');</script>";
    echo "<script>document.location.href = './ProfilePage.php';</script>";
}


?>