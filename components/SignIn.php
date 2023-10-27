<?php
session_start();

include "../config/connectDB.php";
// echo "sdjfgbjhgb";
if ($_SESSION['id']) {
    header("location: ./HomePage.php");
    // exit();
}
// echo "sdjfgbjhgb";

$message = "";

?>


<link rel="stylesheet" href="../assets/css/SignIn.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<section class="main_container">

    <?php if (isset($_SESSION['message'])) { ?>
        <div class="alert alert-danger" role="alert">
            <h1>
                <?php
                echo $_SESSION['message'];
                unset($_SESSION['message']);
                ?>
            </h1>
        </div>
    <?php } ?>



    <!-- <div class="formImage">
    <img src="../assets/images/banner.jpg" alt="">
</div> -->
    <div class="form_container">

        <div class="heading">
            <h2>Sign In</h2>
            <small>Enter your email address and password to access account.</small>
        </div>


        <form id="contact-form" action="<?php $_SERVER['PHP_SELF']; ?>" method="post" name="myForm">
            <!-- <form id="contact-form" action="" method="post" name="myForm" onsubmit="return princeObj.validateForm()"> -->

            <!-- Email -->
            <div class="form_elements">
                <label for="email">*E-mail :</label><br />
                <input type="email" name="email" id="email" placeholder="Enter your E-mail" value="<?php if (isset($_COOKIE["remember_user"])) {
                                                                                                        echo $_COOKIE["remember_user"];
                                                                                                    } ?>" class="input" />
                <div class="formError email"></div>
            </div>

            <br />

            <!-- Password -->
            <div class="form_elements">
                <label for="password">*Password :</label><br />
                <input type="password" name="password" id="password" placeholder="Enter your Password" class="input" />
                <!-- <i class="fa-solid fa-eye" style="color: #000000;"></i> -->
                <div class="formError password"></div>
            </div>

            <br />

            <div>
                <input type="checkbox" name="remember" id="remember" <?php if (isset($_COOKIE["remember_user"])) { ?> checked <?php } ?> />
                <label for="remember">Remember Me</label>
                <a class="forgot" href="./forgotPass.php">Forgot Password</a>
            </div>

            <br />

            <input class="formBtn" type="submit" name="Submit" value="SIGN IN" />

            <div class="signUp_redirect">
                Don't have an account? <b><a href="./SignUp.php">Sign Up</a></b>
            </div>
        </form>

        <?php

        if (isset($_POST['Submit'])) {
            $user_email = mysqli_real_escape_string($conn, $_POST['email']);
            $user_password = md5($_POST['password']);

            $sql = "SELECT * FROM `users_table` WHERE user_email = '{$user_email}' AND user_password = '{$user_password}'";

            $result = mysqli_query($conn, $sql) or die("Query failed");

            if (mysqli_num_rows($result) > 0) {

                while ($row = mysqli_fetch_assoc($result)) {
                    // session_start();
                    $_SESSION["user_name"] = $row['user_name'];
                    $_SESSION["id"] = $row['id'];
                    $_SESSION["user_age"] = $row['user_age'];
                    $_SESSION["user_phoneNum"] = $row['user_phoneNum'];

                    if ($row['user_role_status'] == 1) {
                        $_SESSION["message"] = "Logged in successfully";
                        header("location: ../admin/Dashboard.php");
                    } else {
                        $_SESSION["message"] = "Logged in successfully";
                        header("location: ./ProfilePage.php");
                    }
                }
            } else {
                // echo '<div class="formError">*Email and password did not match.</div>';
                // echo '<script>alert("Email & Password did not match")</script>';

                $_SESSION["message"] = "Invalid Login";
                header("location:http://localhost/PHP_Assesments/Adventaplate/components/SignIn.php");
            }

            // Remember Me functionality
            if (isset($_POST['remember']) && $_POST['remember'] == "on") {

                // Create a unique token
                $token = md5(uniqid(rand(), true));

                // Store the token and user's email in cookies
                setcookie("remember_user", $user_email, time() + 3600 * 24 * 30, "/");
                setcookie("remember_token", $token, time() + 3600 * 24 * 30, "/");

                // Store the token in the database for later validation
                $sql = "UPDATE `users_table` SET remember_token = '{$token}' WHERE user_email = '{$user_email}'";
                mysqli_query($conn, $sql);
                // var_dump($sql);
            } else {
                // If "Remember Me" was not checked, clear the cookies and token from the database
                setcookie("remember_user", "", time() - 3600, "/");
                setcookie("remember_token", "", time() - 3600, "/");
                $sql = "UPDATE `users_table` SET remember_token = NULL WHERE user_email = '{$user_email}'";
                mysqli_query($conn, $sql);
            }
        }
        ?>
    </div>

    <a href="./HomePage.php">
        <div class="homeIcon">
            <i class="fa-solid fa-house" style="color: #ffffff;"></i>
        </div>
    </a>
</section>

<script>
    // document.addEventListener("DOMContentLoaded", function() {
    //         const form = document.getElementById("contact-form");

    //         form.addEventListener("submit", function(event) {
    //             event.preventDefault(); // Prevent the default form submission

    //             // Your form validation and submission code can go here
    //         });
    //     });
</script>

<!-- </body>

</html> -->