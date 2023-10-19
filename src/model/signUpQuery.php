<?php

require("../../config/connectDB.php");

// var_dump($_SERVER);
if($_SERVER['REQUEST_METHOD'] == "POST") {
    // echo "kjrfh";

    $user_name = trim(htmlentities($_POST['name'], ENT_QUOTES, 'UTF-8'));
    $user_email = trim(htmlentities($_POST['email'], ENT_QUOTES, 'UTF-8'));
    $user_password = trim(md5($_POST['password']));
    $user_age = trim(htmlentities($_POST['age'], ENT_QUOTES, 'UTF-8'));
    $user_phoneNum = trim(htmlentities($_POST['phone'], ENT_QUOTES, 'UTF-8'));

    // var_dump($user_age);

    $check_user = "SELECT id FROM `users_table` WHERE user_email = '$user_email' ";
    $check_user_run = mysqli_query($conn, $check_user);

    // var_dump($check_user_run);
    // exit();

    if (mysqli_num_rows($check_user_run) > 0) {
        // var_dump(mysqli_num_rows($check_user_run));
        // exit();
        echo "<script>alert('Email already exists! Try with another Email ID.')</script>";
        echo "<script>window.location.href = '../../components/SignUp.php';</script>";
    } else {
        // Insert the user data into the database
        // $insert_query = "INSERT INTO `users_table` (user_name, user_email, user_password, user_age, user_phoneNum) VALUES ('$user_name', '$user_email', '$user_password', '$user_age', '$user_phoneNum' )";
        // // var_dump($insert_query);
        // $insert_query_run = mysqli_query($conn, $insert_query);

        $insert_query = "INSERT INTO `users_table` (user_name, user_email, user_password, user_age, user_phoneNum) VALUES (?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $insert_query);

        // var_dump($stmt);
        // exit();
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "sssss", $user_name, $user_email, $user_password, $user_age, $user_phoneNum);
            // var_dump(mysqli_stmt_bind_param($stmt, "sssss", $user_name, $user_email, $user_password, $user_age, $user_phoneNum));
            if (mysqli_stmt_execute($stmt)) {

                echo "<script>alert('Registered Successfully!')</script>";
                echo "<script>window.location.href = '../../components/SignIn.php';</script>";
            } else {
                echo "<script>alert('Error: " . mysqli_error($conn) . "')</script>";
            }
            mysqli_stmt_close($stmt);
        } else {
            echo "<script>alert('Error: " . mysqli_error($conn) . "')</script>";
        }
    }

}
else{
    var_dump("kjrwhfr");
}

?>