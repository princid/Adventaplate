<?php

include("../../config/connectDB.php");

if (isset($_POST['Submit'])) {

	$user_name = trim(htmlentities($_POST['name'], ENT_QUOTES, 'UTF-8'));
    $user_email = trim(htmlentities($_POST['email'], ENT_QUOTES, 'UTF-8'));
    $user_password = trim(md5($_POST['password']));
    $user_age = trim(htmlentities($_POST['age'], ENT_QUOTES, 'UTF-8'));
    $user_phoneNum = trim(htmlentities($_POST['phone'], ENT_QUOTES, 'UTF-8'));

	// $selectQuery  = "SELECT * FROM `Form_Table` WHERE user_email = '$user_email'";
	// $result = mysqli_query($conn, $selectQuery);

	if (empty($user_name) || empty($user_email) || empty($user_password) || empty($confirm_password) || empty($user_age) || empty($user_phoneNum)) {
		echo "<script>alert('Validation failed. Please fill in all required fields.')</script>";
	}

	// elseif(mysqli_num_rows($result) > 0){
	// 	echo "<script>alert('This Email already exists!')</script>";
	// }
	
	elseif (!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $user_email)) {
		echo "<script>alert('Please enter a valid email, like your@abc.com')</script>";
	}
	
	elseif ($user_password != $confirm_password) {
		echo "<script>alert('Confirm Password does not match with your original password.')</script>";
	} 
	
	elseif (is_numeric(trim($user_age)) == false) {
		echo "<script>alert('Please enter Numeric value only.')</script>";
	} 
	
	elseif ($user_age > 100) {
		echo "<script>alert('Please enter a valid age.')</script>";
	} 
	
	elseif (is_numeric(trim($user_phoneNum)) == false) {
		echo "<script>alert('Please enter Numeric value only.')</script>";
	}
}

?>









































<!-- <?php

// if(isset($_POST['Submit'])){
//  $user_name = trim($_POST["name"]);
// 	$user_email = trim($_POST["email"]);
// 	$user_password = trim($_POST["password"]);
// 	$confirm_password = trim($_POST["confirm_password"]);
// 	$user_age = trim(($_POST["age"]));
// 	$user_phoneNum = trim($_POST["phone"]);
// 	// print_r ($_POST);

// 	if($user_name == ""){
// 		$error_userName =  "<div class='formError'>Please enter your name</div>";
// 	}

// 	if($user_email == ""){
// 		$error_email =  "<div class='formError'>Please enter your email</div>";
// 	}

// 	elseif(!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $user_email)){
// 		$error_email= "<div class='formError'>Please enter valide email, like your@abc.com</div>";
// 		}

// 	if($user_password == ""){
// 		$error_password =  "<div class='formError'>Please enter a password</div>";
// 	}

// 	if($confirm_password == ""){
// 		$error_confirmPass =  "<div class='formError'>Please confirm the password</div>";
// 	}

// 	elseif($user_password != $confirm_password){
// 		$error_confirmPass =  "<div class='formError'>Confirm Password does not match with your original password</div>";
// 	}

// 	if($user_age == ""){
// 		$error_age = "<div class='formError'>Please enter your age</div>";
// 	}

// 	elseif(is_numeric(trim($user_age)) == false){
// 		$error_age = "<div class='formError'>Please enter Numeric value only</div>";
// 	}

// 	elseif($user_age > 100){
// 		$error_age = "<div class='formError'>Please enter a valid age</div>";
// 	}

// 	if($user_phoneNum == ""){
// 		$error_phoneNum = "<div class = 'formError'>Please enter Phone Number </div>";
// 	}

// 	elseif(is_numeric(trim($user_phoneNum)) == false ){
// 		$error_phoneNum = "<div class='formError'>Please enter Numeric value only</div>";
// 	}
// }

?> -->