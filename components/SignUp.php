<?php
session_start();

// include('../src/Validation/formValidation.php');
// include("../assets/links/links.php");
include("../config/constants.php");

if($_SESSION['id']){
    header("location: HomePage.php");
}

?>

<link rel="stylesheet" href="../assets/css/SignUp.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<section class="main_container">
    <div class="form_container">
        <form id="signUp_form" action="<?php echo BASE_URL ?>src/model/signUpQuery.php" method="post"  
        name="myForm">
        <!-- <form id="contact-form" action="" method="post" name="myForm" onsubmit="return princeObj.validateForm()"> -->
        <!-- Name -->
        <div class=" form_elements">
            <label for="name">*Name :</label><br />
            <input type="text" name="name" id="name" placeholder="Enter your name" class="input" />
            <div class="formError name"></div>
        </div>

        <br />

        <!-- Email -->
        <div class="form_elements">
            <label for="text">*E-mail :</label><br />
            <input type="text" name="email" id="email" placeholder="Enter your E-mail" class="input" />
            <div class="formError email"></div>
        </div>

        <br />

        <!-- Password -->
        <div class="form_elements">
            <label for="password">*Password :</label><br />
            <input type="password" name="password" id="password" placeholder="Enter your Password" class="input" />
            <div class="formError password"></div>
        </div>

        <br />

        <!-- Confirm Password -->
        <div class="form_elements">
            <label for="confirm_password">*Confirm Password :</label><br />
            <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm your Password"
                class="input" />
            <div class="formError confirm_password"></div>
        </div>

        <br />

        <!-- Select Age -->
        <div class="form_elements">
            <label for="age">*Age :</label><br />
            <input type="number" name="age" id="age" placeholder="Enter your age" class="input" />
            <div class="formError age"></div>
        </div>

        <br />

        <!-- Phone Number -->
        <div class="form_elements">
            <label for="number">*Phone Number :</label><br />
            <input type="number" name="phone" id="phone" placeholder="Enter your Phone no." class="input" />
            <div class="formError phone"></div>
        </div>

        <br />

        <br />

        <input class="formBtn" type="submit" name="Submit" value="SIGN UP" />

        <div class="signIn_redirect">
            Already a user? <b><a href="./SignIn.php">Sign In</a></b>
        </div>
        </form>
    </div>

    <a href="./HomePage.php">
        <div class="homeIcon">
           <i class="fa-solid fa-house" style="color: #ffffff;"></i>
        </div>
    </a>
</section>

<script src="../assets/js/signUpValidation.js"></script>
</body>

</html>