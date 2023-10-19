
<?php

session_start();

?>


<link rel="stylesheet" href="../assets/css/changePass.css">
<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>


<?php if(isset($_SESSION['status'])){ ?>
    <div class="alert alert-primary" style="text-align : center" role="alert">
        <p>
            <?php
                echo $_SESSION['status'];
                unset($_SESSION['status']);
            ?>
        </p>
    </div>
<?php }?>

<div class="mainDiv">

    

  <div class="cardStyle">
    <form action="sendPassReset.php" method="post" name="signupForm" id="signupForm">
      
      <!-- <img src="" id="signupLogo"/> -->
      
      <h2 class="formTitle">
        Reset your Password
      </h2>

      <input type="hidden" name="password_token" value="<?php if(isset($_GET['token'])){echo $_GET['token'];} ?>">
      
    <div class="inputDiv">
      <label class="inputLabel" for="password">Email Address</label>
      <input placeholder="Your Email Address" type="email" name="email" value="<?php if(isset($_GET['email'])){echo $_GET['email'];} ?>">
    </div>
    
    <div class="inputDiv">
      <label class="inputLabel" for="password">New Password</label>
      <input placeholder="Enter new password" type="password" id="password" name="new_password" required>
      <div class="formError password" style = "color: red; font-size: 15px;"></div>
    </div>
      
    <div class="inputDiv">
      <label class="inputLabel" for="confirmPassword">Confirm Password</label>
      <input placeholder="Confirm new password" type="password" id="confirmPassword" name="confirm_password">
      <div class="formError confirm_password" style = "color: red; font-size: 15px;"></div>
    </div>
    
    <div class="buttonWrapper">
      <button type="submit" name="password_update" id="submitButton" class="submitButton"> UPDATE PASSWORD </button>
    </div>
      
  </form>
  </div>
</div>

<!-- <script src="../assets/js/updateProfile.js"></script> -->