<?php
session_start();

include("../config/connectDB.php");
include("../config/constants.php");
include("../src/controller/userData.php");
// echo "Nav";

?>

<link rel="stylesheet" href="../assets/css/Navbar.css">
<header>
    <div class="nav">
        <!-- <div class="brand_logo"> -->
        <!-- <a href=""> -->
            <h3 class="brand_logo">Adventaplate <span class="trademark">&reg;</span> </h3>
        <!-- </a> -->

        <!-- </div> -->

        <div class="anchorTags">
            <a href="<?php echo BASE_URL ?>components/HomePage.php" class="nav-link">Home</a>

            <?php
            if ($_SESSION['id'] && $role == 1) {

            ?>

                <a href="<?php echo BASE_URL ?>components/GalleryPage.php" class="nav-link">My Gallery</a>

                <a href="<?php echo BASE_URL ?>admin/Dashboard.php" class="nav-link">Dashboard</a>

                <a href="<?php echo BASE_URL ?>components/ContactPage.php" class="nav-link">Contact Us</a>

                <a href="<?php echo BASE_URL ?>components/TnCPage.php" class="nav-link">T&C</a>

                <div class="logBtn">
                    <?php
                    if (!$_SESSION['id']) {
                    ?>
                        <button class="btn"><a href="<?php echo BASE_URL ?>components/SignIn.php">Sign In</a></button>
                    <?php } else { ?>
                        <div class="profile-wrapper">
                            <a href="#" onclick="openProfileModal()">
                                <?php if (!empty($new_image)) { ?>
                                    <img src="<?php echo BASE_URL ?>assets/uploading/<?php echo $id . "/" . $new_image; ?>" alt="" class="profilePic">

                                <?php } else { ?>
                                    <img src="<?php echo BASE_URL ?>assets/uploading/userDummy.png" class="profilePic">
                                <?php } ?>
                            </a>
                            <!-- The modal -->
                            <div id="profileModal" class="modal">
                                <div class="modal-content">
                                    <!-- `&times;`, `&#x2716;`, etc. are HTML entities for the "×" -->
                                    <span class="close" onclick="closeProfileModal()">&times;</span>
                                    <div class="modal-options">
                                        <a href="<?php echo BASE_URL ?>components/ProfilePage.php">Visit Profile</a>
                                        <a href="<?php echo BASE_URL ?>components/SignOut.php">Log Out</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>

            <?php
            } elseif (isset($_SESSION['id']) && ($role == 2 || $role == 3)) {
            ?>
                <a href="<?php echo BASE_URL ?>components/GalleryPage.php" class="nav-link">My Gallery</a>

                <a href="<?php echo BASE_URL ?>components/ContactPage.php" class="nav-link">Contact Us</a>

                <a href="<?php echo BASE_URL ?>components/TnCPage.php" class="nav-link">T&C</a>

                <div class="logBtn">
                    <?php
                    if (!$_SESSION['id']) {
                    ?>
                        <button class="btn"><a href="<?php echo BASE_URL ?>components/SignIn.php">Sign In</a></button>
                    <?php } else { ?>
                        <div class="profile-wrapper">
                            <a href="#" onclick="openProfileModal()">
                                <?php if (!empty($new_image)) { ?>
                                    <img src="<?php echo BASE_URL ?>assets/uploading/<?php echo $id . "/" . $new_image; ?>" alt="" class="profilePic">

                                <?php } else { ?>
                                    <img src="<?php echo BASE_URL ?>assets/uploading/userDummy.png" class="profilePic">
                                <?php } ?>
                            </a>
                            <!-- The modal -->
                            <div id="profileModal" class="modal">
                                <div class="modal-content">
                                    <!-- `&times;`, `&#x2716;`, etc. are HTML entities for the "×" -->
                                    <span class="close" onclick="closeProfileModal()">&times;</span>
                                    <div class="modal-options">
                                        <a href="<?php echo BASE_URL ?>components/ProfilePage.php">Visit Profile</a>
                                        <a href="<?php echo BASE_URL ?>components/SignOut.php">Log Out</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>



            <?php } else { ?>
                <a href="<?php echo BASE_URL ?>components/TnCPage.php" class="nav-link">T&C</a>

                <div class="logBtn">
                    <?php
                    if (!$_SESSION['id']) {
                    ?>
                        <button class="btn"><a href="<?php echo BASE_URL ?>components/SignIn.php">Sign In</a></button>
                    <?php } else { ?>
                        <div class="profile-wrapper">
                            <a href="#" onclick="openProfileModal()">
                                <?php if (!empty($new_image)) { ?>
                                    <img src="<?php echo BASE_URL ?>assets/uploading/<?php echo $id . "/" . $new_image; ?>" alt="" class="profilePic">

                                <?php } else { ?>
                                    <img src="<?php echo BASE_URL ?>assets/uploading/userDummy.png" class="profilePic">
                                <?php } ?>
                            </a>
                            <!-- The modal -->
                            <div id="profileModal" class="modal">
                                <div class="modal-content">
                                    <!-- `&times;`, `&#x2716;`, etc. are HTML entities for the "×" -->
                                    <span class="close" onclick="closeProfileModal()">&times;</span>
                                    <div class="modal-options">
                                        <a href="<?php echo BASE_URL ?>components/ProfilePage.php">Visit Profile</a>
                                        <a href="<?php echo BASE_URL ?>components/SignOut.php">Log Out</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>

            <?php } ?>
        </div>


    </div>
</header>

<!-- JavaScript to handle modal -->
<script>
    // Function to open the profile modal
    function openProfileModal() {
        var modal = document.getElementById('profileModal');
        modal.style.display = 'block';
    }

    // Function to close the profile modal
    function closeProfileModal() {
        var modal = document.getElementById('profileModal');
        modal.style.display = 'none';
    }

    // Close the modal if the user clicks outside of it
    window.onclick = function(event) {
        var modal = document.getElementById('profileModal');
        if (event.target === modal) {
            closeProfileModal(); // Close the modal if the target is the modal itself
        }
    }
</script>