<?php

include("../../config/connectDB.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer-master/src/SMTP.php';
require './PHPMailer-master/src/Exception.php';
require './PHPMailer-master/src/PHPMailer.php';

if(isset($_POST['email']) && (!empty($_POST['email']))){
    $email = $_POST['email'];
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);

    if(!$email){
        $error .= "<p>Invalid email address please type a valid email address!</p>";
    }
    else{
        $sel_query = "SELECT * FROM users_table WHERE user_email = '".$email."'";
        $result = mysqli_query($conn, $sel_query);
        $row = mysqli_num_rows($result);

        if($row == ""){
            $error .= "<p>No user is registered with this email address!</p>";
        }
    }

    if($error != ""){
        echo "<div class='error'>".$error."</div>
        <br/> <a href='javascript:history.go(-1)'>Go Back</a>";
    }
    else{
        $expFormat = mktime(date("H"), date("i"), date("s"), date("m"), date("d") + 1, date("Y"));
        $expDate = date("Y-m-d H:i:s", $expFormat);
        $key = md5(2418*2 + $email);
        $addKey = substr(md5(uniqid(rand(),1)),3,10);
        $key = $key . $addKey;

        // Insert temporary table
        $in_query = "INSERT INTO `password_reset_temp` (user_email, key, expDate) VALUES ('".$email."', '".$key."', '".$expDate."');";
        mysqli_query($conn, $in_query);


        $output='<p>Dear user,</p>';
        $output.='<p>Please click on the following link to reset your password.</p>';
        $output.='<p>-------------------------------------------------------------</p>';
        $output.='<p><a href="https://www.allphptricks.com/forgot-password/reset-password.php?
        key='.$key.'&email='.$email.'&action=reset" target="_blank">
        https://www.allphptricks.com/forgot-password/reset-password.php
        ?key='.$key.'&email='.$email.'&action=reset</a></p>';		
        $output.='<p>-------------------------------------------------------------</p>';
        $output.='<p>Please be sure to copy the entire link into your browser.
        The link will expire after 1 day for security reason.</p>';
        $output.='<p>If you did not request this forgotten password email, no action 
        is needed, your password will not be reset. However, you may want to log into 
        your account and change your security password as someone may have guessed it.</p>';   	
        $output.='<p>Thanks,</p>';
        $output.='<p>Adventaplate Team</p>';
        $body = $output; 
        $subject = "Password Recovery - Adventaplate.com";


        $email_to = $email;
        $fromserver = "princekumarsingh.mind2web@gmail.com"; 
        // require("PHPMailer/PHPMailerAutoload.php");

        

        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->Host = "smtp.gmail.com"; // Enter your host here
        $mail->SMTPAuth = true;
        $mail->Username = "princekumarsingh.mind2web@gmail.com"; // Enter your email here
        $mail->Password = "mzvwrrojffhzxxkm"; //Enter your password here
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;
        $mail->IsHTML(true);
        $mail->From = "princekumarsingh.mind2web@gmail.com";
        $mail->FromName = "AllPHPTricks";
        $mail->Sender = $fromserver; // indicates ReturnPath header
        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->AddAddress($email_to);
        if(!$mail->Send()){
        echo "Mailer Error: " . $mail->ErrorInfo;
        }else{
            echo "<div class='error'>
            <p>An email has been sent to you with instructions on how to reset your password.</p>
            </div><br /><br /><br />";
        }
    }

}
else{

    include("../../components/forgotPass.php");

?>

<?php } ?>