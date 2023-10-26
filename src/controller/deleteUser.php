<!-- <?php


// session_start();

// require('../../config/connectDB.php');

// if (isset($_POST["update_user_role"])) {
//     // Get the user ID and status from the POST data
//     $userId = $_POST['userId'];
//     $isDeleted = $_POST['isDeleted'];

//     // Prepare and execute an SQL query to update the user's status
//     $updateQuery = "UPDATE users_table SET is_deleted = ? WHERE id = ?";
//     $stmt = mysqli_prepare($conn, $updateQuery);
//     mysqli_stmt_bind_param($stmt, 'ii', $isDeleted, $userId);

//     if (mysqli_stmt_execute($stmt)) {
//         // Status updated successfully
//         $response = array('deleteStatus' => 'success', 'message' => 'User\'s account deleted successfully', 'isDeleted' => $isDeleted);
//         echo json_encode($response);
//     } else {
//         // Failed to update user status
//         $response = array('deleteStatus' => 'error', 'message' => 'Failed to delete user\'s account');
//         echo json_encode($response);
//     }

//     mysqli_stmt_close($stmt);
//     mysqli_close($conn);
// } else {
//     http_response_code(405); // Method Not Allowed
// }



?> -->