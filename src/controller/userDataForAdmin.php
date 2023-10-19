<?php

if(!empty($_SESSION)){
    $id = $_SESSION['id'];

    $fetch_name = "SELECT * FROM users_table";
    $fetch_name_run = mysqli_query($conn, $fetch_name);

}

?>