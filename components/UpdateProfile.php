<?php

session_start();

$id = empty($_GET['id']) ? $_SESSION['id'] : $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // echo "jhgh";
    $user_name = trim(htmlentities($_POST['name'], ENT_QUOTES, 'UTF-8'));
    $user_age = trim(htmlentities($_POST['age'], ENT_QUOTES, 'UTF-8'));
    $user_phoneNum = trim(htmlentities($_POST['phone'], ENT_QUOTES, 'UTF-8'));
    $user_dob = trim(htmlentities($_POST['dateOfBirth'], ENT_QUOTES, 'UTF-8'));
    $user_gender = $_POST['gender'];
    $fav_sub = $_POST['subject'];
    $user_hobbies = isset($_POST['hobbies']) ? $_POST['hobbies'] : array();
    $user_bio = trim(htmlentities($_POST['bio'], ENT_QUOTES, 'UTF-8'));

    $user_streetAdd = trim(htmlentities($_POST['street'], ENT_QUOTES, 'UTF-8'));
    $user_city = trim(htmlentities($_POST['city'], ENT_QUOTES, 'UTF-8'));
    $user_state = trim(htmlentities($_POST['state'], ENT_QUOTES, 'UTF-8'));
    $user_country = trim(htmlentities($_POST['country'], ENT_QUOTES, 'UTF-8'));
    $user_PINcode = trim(htmlentities($_POST['pin'], ENT_QUOTES, 'UTF-8'));


    // Initialize the checkbox update status to false
    $checkboxUpdated = false;

    // Initializing the selectbox
    $selectboxUpdated = false;

    // Checking if a new image has been selected
    if (!empty($_FILES["new_image"]["name"])) {
        $imageName = $_FILES["new_image"]["name"];
        $imageSize = $_FILES["new_image"]["size"];
        $tmpName = $_FILES["new_image"]["tmp_name"];

        $dirName =  "../assets/uploading/";

        // Giving a path to a directory specified for specific user's ID
        $userDir = $dirName.$id. "/";

        // Checking, if file doesn't exist then make a directory
        if(!file_exists($userDir)){
            mkdir($userDir, 0755, true);
        }


        // Get the current profile image name (if it exists)
        $query = "SELECT user_profile_image FROM users_table WHERE id = $id";
        $result = mysqli_query($conn, $query);
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $currentImageName = $row['user_profile_image'];
            if (!empty($currentImageName)) {
                // Delete the old image file from the user's folder
                $oldImagePath = $userDir . $currentImageName;
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
        }

        
        // Image validation
        $validImageExtension = ['jpg', 'png', 'jpeg', 'gif'];
        $imageExtension = explode('.', $imageName);
        $imageExtension = strtolower(end($imageExtension));

        if (!in_array($imageExtension, $validImageExtension)) {
            echo
            "
            <script>
                alert('Invalid Image Extension');
            </script>

            ";
        } elseif ($imageSize > 120000000) {
            echo
            "
            <script>
                alert('Image Size is too large!');
                document.location.href = './ProfilePage.php';
            </script>

            ";
        } else {
            
            // Proceed with updating the profile image and other details
            $newImageName = $user_name . " - " . date("Y.m.d") . " - " . date("h.i.s A") . " - " . rand(10000, 999999); // Generating new image name.
            $newImageName .= "." . $imageExtension;

            // Query to Update the main table's data
            $updateQuery = "UPDATE `users_table` SET user_name = '{$user_name}', user_age = '{$user_age}', user_phoneNum = '{$user_phoneNum}', user_dob = '{$user_dob}', user_gender = '{$user_gender}', user_profile_image = '{$newImageName}', user_bio = '{$user_bio}' WHERE id = $id ";
           
            mysqli_query($conn, $updateQuery);

            
            move_uploaded_file($tmpName, $userDir . $newImageName);

            echo "<script>alert('Profile updated successfully!');</script>";
            echo "<script>document.location.href = './ProfilePage.php';</script>";


            if (count($fav_sub) > 0) {
                // Update subjects associated with the user
                $deleteSubjectsQuery = "DELETE FROM `subjects` WHERE user_id = $id";
                mysqli_query($conn, $deleteSubjectsQuery);

                // Query to insert the multiple Checkbox data in subjects table using foreign key's concept.
                $insertQuery = "INSERT INTO `subjects`(fav_sub, user_id) VALUES ";
                $str = "";
                for ($i = 0; $i < count($fav_sub); $i++) {
                    $str .= "('$fav_sub[$i]','$id'),";
                }
                $str = trim($str, ","); // Removing the leading and trailing commas (in our case, removing the last comma)
                $insertQuery .= $str;
                if (mysqli_query($conn, $insertQuery)) {
                    // Checkbox values inserted successfully
                    $checkboxUpdated = true;
                } else {
                    // Checkbox values insert failed
                    $checkboxUpdated = false;
                }
            }

            if (count($user_hobbies) > 0) {
                // Update hobbies associated with the user
                $deleteHobbiesQuery = "DELETE FROM `hobbies` WHERE user_id = $id";
                mysqli_query($conn, $deleteHobbiesQuery);

                // Query to insert the selected hobbies into the database
                $insertHobbiesQuery = "INSERT INTO `hobbies` (user_hobbies, user_id) VALUES ";
                foreach ($user_hobbies as $hobby) {
                    $insertHobbiesQuery .= "('$hobby','$id'),";
                }
                $insertHobbiesQuery = rtrim($insertHobbiesQuery, ','); // Remove the trailing comma
                if (mysqli_query($conn, $insertHobbiesQuery)) {
                    // Hobbies inserted successfully
                    $selectboxUpdated = true;
                } else {
                    // Hobbies insert failed
                    $selectboxUpdated = false;
                }
            }

            // Checking if there's any address already stored for that user.
            $id_chk = "SELECT user_id FROM `users_address` WHERE user_id = $id";
            $id_status= mysqli_query($conn, $id_chk);
            
            // Deleting the already stored address for that user
            if(!empty($id_status)) {
                $delAddress = "DELETE FROM `users_address` WHERE user_id = $id";
                mysqli_query($conn, $delAddress);
            }
        
            // Inserting the user's fresh address data into the table
            $updateAddress = "INSERT INTO `users_address` (user_id, user_streetAdd, user_city, user_state, user_country, user_PINcode) VALUES('$id', '$user_streetAdd', '$user_city', '$user_state', '$user_country' , '$user_PINcode') ";      
            mysqli_query($conn, $updateAddress);
            }
    } else {
        // No new image selected, update only other user details

        // Here, I'm checking if any information has been updated.
        // Query to Update the main table's data
        $updateQuery = "UPDATE `users_table` SET user_name = '{$user_name}', user_age = '{$user_age}', user_phoneNum = '{$user_phoneNum}', user_dob = '{$user_dob}', user_gender = '{$user_gender}', user_bio = '{$user_bio}' WHERE id = $id ";

        mysqli_query($conn, $updateQuery);


        // Checking if there's any address already stored for that user.
        $id_chk = "SELECT user_id FROM `users_address` WHERE user_id = $id";
        $id_status= mysqli_query($conn, $id_chk);

        // Deleting the already stored address for that user
        if(!empty($id_status)) {
            $delAddress = "DELETE FROM `users_address` WHERE user_id = $id";
            mysqli_query($conn, $delAddress);
        }

        // Inserting the user's fresh address data into the table
        $updateAddress = "INSERT INTO `users_address` (user_id, user_streetAdd, user_city, user_state, user_country, user_PINcode) VALUES('$id', '$user_streetAdd', '$user_city', '$user_state', '$user_country' , '$user_PINcode') ";      

        mysqli_query($conn, $updateAddress);


        if (count($fav_sub) > 0) {
            // Update subjects associated with the user
            $deleteSubjectsQuery = "DELETE FROM `subjects` WHERE user_id = $id";
            mysqli_query($conn, $deleteSubjectsQuery);

            // Query to insert the multiple Checkbox data in subjects table using foreign key's concept.
            $insertQuery = "INSERT INTO `subjects`(fav_sub, user_id) VALUES ";
            $str = "";
            for ($i = 0; $i < count($fav_sub); $i++) {
                $str .= "('$fav_sub[$i]','$id'),";
            }
            $str = trim($str, ","); // Removing the leading and trailing commas (in our case, removing the last comma)
            $insertQuery .= $str;


            if (mysqli_query($conn, $insertQuery)) {
                // Checkbox values inserted successfully
                $checkboxUpdated = true;
            } else {
                // Checkbox values insert failed
                $checkboxUpdated = false;
            }
        }


        if ($checkboxUpdated) {
            echo "<script>alert('Profile updated successfully!');</script>";
            echo "<script>document.location.href = './ProfilePage.php';</script>";
        } else {
            echo "<script>alert('No changes detected. Profile not updated.');</script>";
        }

        if (count($user_hobbies) > 0) {
            // Update hobbies associated with the user
            $deleteHobbiesQuery = "DELETE FROM `hobbies` WHERE user_id = $id";
            mysqli_query($conn, $deleteHobbiesQuery);

            // Query to insert the selected hobbies into the database
            $insertHobbiesQuery = "INSERT INTO `hobbies` (user_hobbies, user_id) VALUES ";
            foreach ($user_hobbies as $hobby) {
                $insertHobbiesQuery .= "('$hobby','$id'),";
            }
            $insertHobbiesQuery = rtrim($insertHobbiesQuery, ','); // Remove the trailing comma
            if (mysqli_query($conn, $insertHobbiesQuery)) {
                // Hobbies inserted successfully
                $selectboxUpdated = true;
            } else {
                // Hobbies insert failed
                $selectboxUpdated = false;
            }
        }

        if (mysqli_affected_rows($conn) > 0) {
            mysqli_query($conn, $updateQuery);
            // At least one row was affected, the profile has an update
            echo "<script>alert('Profile updated successfully!');</script>";
            echo "<script>document.location.href = './ProfilePage.php';</script>";
        } else {
            // No rows were affected, that means the profile is not updated
            echo "<script>alert('No changes detected. Profile not updated.');</script>";
        }
    }

    // }
}

?>

<!-- <script src="../assets/js/updateProfile.js"></script> -->