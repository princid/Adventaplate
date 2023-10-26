<?php

// session_start();

// require ('../../config/connectDB.php');

// if (isset($_POST["update_user_role"])) {

//     $user_data_id = $_POST['user_data_id'];
//     $new_role = $_POST['role'];

//     $update_role = "UPDATE users_table SET user_role_status = '$new_role' WHERE id = '$user_data_id' ";

//     $update_role_run = mysqli_query($conn, $update_role);

//     if ($update_role_run) {
//         header("location: http://localhost/PHP_Assesments/Adventaplate/admin/Dashboard.php");
//         exit;
//     }

// }



session_start();

require('../../config/connectDB.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST["update_user_role"])) {
        $user_data_id = $_POST['user_data_id'];
        $new_role = $_POST['role'];

        $update_role = "UPDATE users_table SET user_role_status = ? WHERE id = ?";
        $stmt = mysqli_prepare($conn, $update_role);
        mysqli_stmt_bind_param($stmt, 'ii', $new_role, $user_data_id);

        if (mysqli_stmt_execute($stmt)) {
            // Role updated successfully
            $roleResponse = array('roleStatus' => 'success', 'message' => 'User\'s role updated successfully');
            echo json_encode($roleResponse);
        } else {
            // Failed to update user role
            $roleResponse = array('roleStatus' => 'error', 'message' => 'Failed to update user role');
            echo json_encode($roleResponse);
        }

        mysqli_stmt_close($stmt);
    } else {
        http_response_code(400); // Bad Request
    }
} else {
    http_response_code(405); // Method Not Allowed
}



?>

