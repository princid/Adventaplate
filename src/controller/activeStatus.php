<!-- <?php 
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     $user_id = $_POST['user_id'];
//     $new_status = $_POST['new_status'];

//     // Include your database connection
//     include('../../config/connectDB.php');

//     // Update the user's status in the database (use prepared statements to prevent SQL injection)
//     $stmt = $conn->prepare("UPDATE users_table SET active_status = ? WHERE id = ?");
//     $stmt->bind_param('si', $new_status, $user_id);

//     if ($stmt->execute()) {
//         echo 'success';
//     } else {
//         echo 'error';
//     }

//     $stmt->close();
//     $conn->close();
// } else {
//     // Invalid request method
//     http_response_code(405);
//     echo 'Method Not Allowed';
// } 
