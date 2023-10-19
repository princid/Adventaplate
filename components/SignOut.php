<?php
session_start();
include("../config/connectDB.php");
session_unset();
session_destroy();

header("location: ./SignIn.php")
?>