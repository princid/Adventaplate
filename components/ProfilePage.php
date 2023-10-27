<?php

// Starting Session
session_start();

// Including Header file
include("../includes/header.php");

// Including Contants
include("../config/constants.php");

// Including the Databse Connection
include("../config/connectDB.php");

// Including User's data
include("../src/controller/userData.php");

// Including UpdateProfile.php page
include("./UpdateProfile.php");

// Checking if Session is active or not
if (empty($_SESSION['id'])) {
    header("location: ./SignIn.php");
    exit();
}


?>

<link rel="stylesheet" href="../assets/css/profilePage.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>


<div class="profile__container">

    <?php if (isset($_SESSION['message'])) { ?>
        <div class="alertBox">
            <div class="alert alert-success" role="alert">
                <h1>
                    <?php
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                    ?>
                </h1>
            </div>
        </div>
    <?php } ?>

    <!-- <form action="<?php #$_SERVER['PHP_SELF']; 
                        ?>" method="post" id="form" enctype="multipart/form-data"> -->

    <div class="userProfile">
        <!-- <h2>My Information</h2> -->



        <div class="userImage">
            <!-- Profile Image -->
            <?php if (!empty($new_image)) { ?>
                <img src="<?php echo BASE_URL ?>assets/uploading/<?php echo $id . "/" . $new_image; ?>" alt="">

            <?php } else { ?>
                <img src="<?php echo BASE_URL ?>assets/uploading/userDummy.png">
            <?php } ?>
        </div>

        <?php
        echo strtoupper("<h1>$username</h1>");
        echo $bio;
        ?>

        <!-- <hr> -->

        <!-- <div class="preview"></div> -->

        <!-- Displaying User's info which is fetched from the database -->
        <div class="userInfo">

            <!-- <h4>MY DETAILS</h4> -->

            <table class="userTable">
                <tbody>

                    <!-- Email -->
                    <tr class="tab_row">
                        <th>Email </th>
                        <td>
                            <?php echo "$email"; ?>
                        </td>
                    </tr>

                    <!-- Phone -->
                    <tr class="tab_row">
                        <th>Phone </th>
                        <td>
                            <?php echo "$phone"; ?>
                        </td>
                    </tr>

                    <!-- Age -->
                    <tr class="tab_row">
                        <th>Age </th>
                        <td>
                            <?php echo "$age"; ?>
                        </td>
                    </tr>

                    <!-- D.O.B. -->
                    <tr class="tab_row">
                        <th>D.O.B. </th>
                        <td>
                            <?php
                            if (empty($dob)) {
                                echo "-";
                            } else {
                                echo "$dob";
                            }
                            ?>
                        </td>
                    </tr>

                    <!-- Gender -->
                    <tr class="tab_row">
                        <th>Gender </th>
                        <td>
                            <?php
                            if (empty($gender)) {
                                echo "-";
                            } else {
                                echo "$gender";
                            }
                            ?>
                        </td>
                    </tr>

                    <!-- Subjects -->
                    <tr class="tab_row">
                        <th>Fav. Subjects </th>
                        <td>
                            <?php
                            if (empty($selectedSubjects)) {
                                echo "-";
                            } else {
                                $subStr = implode(", ", $selectedSubjects);
                                echo "$subStr";
                            }
                            ?>
                        </td>
                    </tr>

                    <!-- Hobbies -->
                    <tr class="tab_row">
                        <th>Hobbies </th>
                        <td>
                            <?php

                            if (empty($user_hobbies)) {
                                echo "-";
                            } else {
                                $hobbyStr = implode(", ", $user_hobbies);
                                echo "$hobbyStr";
                            }
                            ?>
                        </td>
                    </tr>

                    <!-- Street Address with PIN code -->
                    <tr class="tab_row">
                        <th>Address </th>
                        <td>
                            <?php

                            if (empty($street) && empty($city) && empty($state) && empty($country) && empty($pin)) {
                                echo "-";
                            } else {
                                echo "$street, $city, $state, $country, $pin";
                            }
                            ?>
                        </td>
                    </tr>


                </tbody>
            </table>

        </div>

        <a href="<?php echo BASE_URL ?>components/ProfileForm.php"><button class="editBtn">EDIT PROFILE </button></a>
        <!-- <a href="<?php #echo BASE_URL 
                        ?>components/SignOut.php"><button class="logOut_btn">LOG OUT</button></a> -->

        <!-- Button trigger modal -->
        <button type="button" class="logOut_btn" data-bs-toggle="modal" data-bs-target="#delModal">
            LOG OUT
        </button>

        <!-- Modal -->
        <div class="modal fade" id="delModal" tabindex="-1" aria-labelledby="" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title fs-5 text-dark" id="">Are you sure?</h2>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-dark">
                        <p>Do you really want to log out of your account?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="closeBtn" data-bs-dismiss="modal">CLOSE</button>
                        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                        <a class="delBtn" href="<?php echo BASE_URL ?>components/SignOut.php">LOG OUT</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--  -->
</div>

<!-- </div> -->
<a href="./HomePage.php">
    <div class="homeIcon">
        <i class="fa-solid fa-house" style="color: #ffffff;"></i>
    </div>
</a>

<script>
    const alertBox = document.querySelector(".alertBox");
    // console.log(alertBox);

    // alertBox.innerHTML(``);

    setTimeout(() => {
        alertBox.innerHTML = "";
    }, 3000);
</script>

<script src="../assets/js/updateProfile.js"></script>