<?php


if(!empty($_SESSION)){
    $id = $_SESSION['id'];

    // var_dump($id);
    
    $selectQuery = "SELECT * FROM `users_table` WHERE id = '$id'";
    // var_dump($selectQuery);
    $selectResult = mysqli_query($conn, $selectQuery);
    // var_dump($selectResult);
    // echo "userData";

    
    $selAddress = "SELECT * FROM `users_address` WHERE user_id = '$id'";
    $selAddResult = mysqli_query($conn, $selAddress);

    // var_dump($selAddResult);
    // exit();


    if($selAddResult && mysqli_num_rows($selAddResult) > 0){
        $user_address = mysqli_fetch_assoc($selAddResult);

        $street = $user_address['user_streetAdd'];
        $city = $user_address['user_city'];
        $state = $user_address['user_state'];
        $country = $user_address['user_country'];
        $pin = $user_address['user_PINcode'];
    }

    if($selectResult && mysqli_num_rows($selectResult) > 0){
        $user = mysqli_fetch_assoc($selectResult);
    
        // Fetching User's info from the database
        $username = $user['user_name'];
        $email = $user['user_email'];
        $age = $user['user_age'];
        $phone = $user['user_phoneNum'];
        $dob = $user['user_dob'];
        $gender = $user['user_gender'];
        $new_image = $user['user_profile_image'];
        $bio = $user['user_bio'];


        

        // Fetch the user's selected subjects from the database and store them in an array
        // This part is also from GPT(understood).
        $selectedSubjects = [];
        $selectSubjectsQuery = "SELECT fav_sub FROM `subjects` WHERE user_id = '$id'";
        $selectSubjectsResult = mysqli_query($conn, $selectSubjectsQuery);

        if ($selectSubjectsResult && mysqli_num_rows($selectSubjectsResult) > 0) {
            while ($row = mysqli_fetch_assoc($selectSubjectsResult)) {
                $selectedSubjects[] = $row['fav_sub'];
            }
        }

        // Fetching the user's hobbies from the database
        $user_hobbies = [];
        $selectHobbiesQuery = "SELECT user_hobbies FROM `hobbies` WHERE user_id = '$id'";
        $selectHobbiesResult = mysqli_query($conn, $selectHobbiesQuery);

        if ($selectHobbiesResult && mysqli_num_rows($selectHobbiesResult) > 0) {
            while ($row2 = mysqli_fetch_assoc($selectHobbiesResult)) {
                $user_hobbies[] = $row2['user_hobbies'];
            }
        }
    }
    else{
        die("User data not found");
    }
}


?>


<!-- 

$selectQuery = "SELECT * FROM `users_table` AS p INNER JOIN `users_address` AS s ON p.id = s.user_id ";
    $selectResult = mysqli_query($conn, $selectQuery); -->