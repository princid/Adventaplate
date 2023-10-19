<?php

session_start();

?>

<link rel="stylesheet" href="../assets/css/forgotPass.css">

<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> -->


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

<div class="form-gap" style="padding-top : 70px"></div>
<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">

            <div class="form_container">
              <div class="panel-body">
                <!-- <h3>fdgd</h3> -->
                <div class="text-center">
                  <h3><i class="fa fa-lock fa-3x"></i></h3>
                  <h2 class="text-center">Forgot Password?</h2>
                  <!-- <p>You can reset your password here.</p> -->
                  <p>Password reset instructions will be sent to this email address.</p>
                  <div class="panel-body">
    
                    <form id="register-form" action="sendPassReset.php" role="form" autocomplete="" class="form" method="post">
    
                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                          <input id="email" name="email" placeholder="Email Address" class="form-control"  type="email">
                        </div>
                        <!-- <span id="helpResetPasswordEmail" class="form-text small text-muted">
                                          Password reset instructions will be sent to this email address.
                                      </span> -->
                      </div>
                      <div class="form-group">
                        <input id="reset_btn" name="password_reset_link" class="btn btn-md btn-primary btn-block" value="RESET PASSWORD" type="submit">
                      </div>

                      <div class="backBtn">
                        <a href="SignIn.php">Go Back to Login Page</a>
                      </div>
                      
                      <!-- <input type="hidden" class="hide" name="token" id="token" value="">  -->
                    </form>
    
                  </div>
                </div>
              </div>
            </div>
          </div>
	</div>
</div>