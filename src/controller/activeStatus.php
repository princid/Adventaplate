<?php
// session_start();

// require('../../config/connectDB.php');

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {

//     // Get the user ID and status from the POST data
//     $userId = $_POST['userId'];
//     $isActive = $_POST['isActive'];

//     // Prepare and execute an SQL query to update the user's status
//     $updateQuery = "UPDATE users_table SET active_status = ? WHERE id = ?";
//     $stmt = mysqli_prepare($conn, $updateQuery);
//     mysqli_stmt_bind_param($stmt, 'ii', $isActive, $userId);

//     if (mysqli_stmt_execute($stmt)) {
//         echo 'User status updated successfully';
//     } else {
//         echo 'Failed to update user status';
//     }

//     mysqli_stmt_close($stmt);
//     mysqli_close($conn);
// } else {
//     http_response_code(405); // Method Not Allowed
// }




session_start();

require('../../config/connectDB.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the user ID and status from the POST data
    $userId = $_POST['userId'];
    $isActive = $_POST['isActive'];

    // Prepare and execute an SQL query to update the user's status
    $updateQuery = "UPDATE users_table SET active_status = ? WHERE id = ?";
    $stmt = mysqli_prepare($conn, $updateQuery);
    mysqli_stmt_bind_param($stmt, 'ii', $isActive, $userId);

    if (mysqli_stmt_execute($stmt)) {
        // Status updated successfully
        $response = array('activeStatus' => 'success', 'message' => 'User\'s status updated successfully', 'isActive' => $isActive);
        echo json_encode($response);
    } else {
        // Failed to update user status
        $response = array('activeStatus' => 'error', 'message' => 'Failed to update user status');
        echo json_encode($response);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    http_response_code(405); // Method Not Allowed
}


?>