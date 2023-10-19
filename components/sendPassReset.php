<?php
session_start();
include("../config/connectDB.php");

// echo "jgjg";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';


function send_password_reset($getName, $getEmail, $token){

	$mail = new PHPMailer(true);

    $mail->isSMTP();                                            //Send using SMTP
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication

    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->Username   = 'princekumarsingh.mind2web@gmail.com';                     //SMTP username
    $mail->Password   = 'mzvwrrojffhzxxkm';                               //SMTP password

    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('princekumarsingh.mind2web@gmail.com', $getName);
    $mail->addAddress($getEmail);


    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Reset Password Notification';

	$email_template = "
		<h2>Hello</h2>
		<h3>You are receiving this email because we received a password reset request for your account.</h3>
		<br/><br/>
		<a href='http://localhost/PHP_Assesments/Adventaplate/components/changePass.php?token=$token&email=$getEmail'> Click Here to change your password. </a>";
	
	$mail->Body = $email_template;
    $mail->send();

    echo 'Message has been sent';
}



if(isset($_POST['password_reset_link'])){
	$email = mysqli_real_escape_string($conn, $_POST['email']);

	$token = md5(rand());

	// var_dump($token);

	$checkEmail = "SELECT user_email FROM users_table WHERE user_email = '$email' LIMIT 1";

	$checkEmailRun = mysqli_query($conn, $checkEmail);

	if(mysqli_num_rows($checkEmailRun) > 0){
		$row = mysqli_fetch_array($checkEmailRun);
		$getName = $row['user_name'];
		$getEmail = $row['user_email'];

		$updateToken = "UPDATE users_table SET reset_token = '$token' WHERE user_email = '$getEmail' LIMIT 1";
		$updateToken_run = mysqli_query($conn, $updateToken);

		if($updateToken_run){

			// Creating a function
			send_password_reset($getName, $getEmail, $token);
			$_SESSION['status'] = "We have sent you a Password reset link";
			header("Location: forgotPass.php");
			exit(0);
		}
		else{
			$_SESSION['status'] = "Something went wrong. #1";
			header("Location: forgotPass.php");
			exit(0);
		}
	}
	else{
		$_SESSION['status'] = "No Email Found";
		header("Location: forgotPass.php");
		exit(0);
	}
}


if(isset($_POST['password_update'])){
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$new_password = md5($_POST['new_password']);
	$confirm_password = md5($_POST['confirm_password']);

	$token = mysqli_real_escape_string($conn, $_POST['password_token']);

	if(!empty($token)){

		if(!empty($email) && !empty($new_password) && !empty($confirm_password)){

			// Checking if the token is valid or not
			$check_token = "SELECT reset_token FROM users_table WHERE reset_token = '$token' LIMIT 1 ";
			$check_token_run = mysqli_query($conn, $check_token);

			if(mysqli_num_rows($check_token_run)){
 
				if($new_password == $confirm_password)
				{
					$update_password = "UPDATE users_table SET user_password = '$new_password' WHERE reset_token = '$token' LIMIT 1 ";
					$update_password_run = mysqli_query($conn, $update_password);

					if($update_password_run)
					{
						$new_token = md5(rand());
						$update_to_new_token = "UPDATE users_table SET reset_token = '$new_token' WHERE reset_token = '$token' LIMIT 1 ";
						$update_to_new_token_run = mysqli_query($conn, $update_password);

						$_SESSION['status'] = "New Password successfully updated.";
						header("Location: SignIn.php");
						exit(0);
					}
					else{
						$_SESSION['status'] = "Did not update password. Something went wrong!";
						header("Location: changePass.php?token=$token&email=$email");
						exit(0);
					}
				}
				else{
					$_SESSION['status'] = "Password and Confirm Password does not match.";
					header("Location: changePass.php?token=$token&email=$email");
					exit(0);
				}
			}
			else{
				$_SESSION['status'] = "Invalid Token";
				header("Location: changePass.php?token=$token&email=$email");
				exit(0);
			}
		}
		else{
			$_SESSION['status'] = "All fields are mandatory";
			header("Location: changePass.php?token=$token&email=$email");
			exit(0);
		}
	}
	// If there's no token available
	else{
		$_SESSION['status'] = "No Token Available";
		header("Location: changePass.php");
		exit(0);
	}
}


?>