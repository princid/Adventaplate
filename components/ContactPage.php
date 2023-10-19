<?php
include("../config/constants.php");
include("../includes/header.php");
include("Navbar.php");

// Checking if Session is active or not
if (empty($_SESSION['id'])) {
    header("location: ./SignIn.php");
    exit();
}
?>

<link rel="stylesheet" href="../assets/css/ContactPage.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


<div class="container">
    <!-- <h1>Contact Us</h1> -->
    <!-- <hr> -->

    <div class="contactForm">
        <h2>Send us a message</h2>
        <form action="<?php echo BASE_URL ?>src/model/contactQuery.php" name="contact_form" method="post">
            <label for="name">*Name :
                <input type="text" id="name" name="name" >
                <div class="formError name"></div>
            </label>
            <label for="email">*E-mail :
                <input type="email" id="email" name="email" >
                <div class="formError email"></div>
            </label>
            <label for="phone">*Phone :
                <input type="number" id="phone" name="phone" >
                <div class="formError phone"></div>
            </label>
            <label for="message">*Message :
                <textarea name="message" id="message" cols="30" rows="10" ></textarea>
                <div class="formError message"></div>
            </label>
            <button type="submit" class="submit_btn">SEND <i class="fa-solid fa-paper-plane" style="color: #fff;"></i></button>
        </form>
    </div>

    <div class="contactDetails">
        <h2>Contact Us </h2>

        <p>We're open for any suggestion or just to have a chat.</p>

        <div class="contactOptions">
            <i class="fa-solid fa-location-dot" style="color: #000000;"></i>
            <p><strong>Address : </strong>195 West, Phase-8, Mind2Web, Mohali, 140301</p>
        </div>

        <div class="contactOptions">
            <i class="fa-solid fa-phone" style="color: #000000;"></i>
            <p><strong>Phone : </strong>+91 7488541302</p>
        </div>

        <div class="contactOptions">
            <i class="fa-solid fa-paper-plane" style="color: #000000;"></i>
            <p><strong>Email : </strong>princekumarsingh.mind2web@gmail.com</p>
        </div>

        <div class="contactOptions">
            <i class="fa-solid fa-earth-asia" style="color: #000000;"></i>
            <p><strong>Website : </strong><a target="blank" href="https://princid.github.io/">princid.github.io</a></p>
        </div>
    </div>
</div>

<?php
    $bottom = "bottom";
    include("./Footer.php") 
?>

<!-- On My laptop only -->
<!-- <?php
// $bottom = "";
// include("./Footer.php") 
?> -->

<script src="../assets/js/contactFormValidation.js"></script>

