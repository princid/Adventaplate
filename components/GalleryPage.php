<?php 
include("../includes/header.php");
include("./Navbar.php");

// Checking if Session is active or not
if (empty($_SESSION['id'])) {
    header("location: ./SignIn.php");
    exit();
}

?>

<link rel="stylesheet" href="../assets/css/GalleryPage.css">

<div class="main_container">
    <div class="gall_body">
        <div class="gallery_card">
            <div>
                <img src="../assets/images/img1.avif" alt="natural scene" class="image" />
            </div>
            <div class="caption">
                <p>The mountains are the last place where man can feel truly wild.</p>
            </div>
        </div>

        <div class="gallery_card">
            <div>
                <img src="../assets/images/img2.avif" alt="natural scene" class="image" />
            </div>
            <div class="caption">
                <p>At the beach, life is different. Time doesn’t move hour to hour but mood to moment. We live by the currents, plan by the tides and follow the sun.</p>
            </div>
        </div>

        <div class="gallery_card">
            <div>
                <img src="../assets/images/img3.avif" alt="natural scene" class="image" />
            </div>
            <div class="caption">
                <p>Live in the sunshine, swim the sea, drink the wild air.</p>
            </div>
        </div>

        <div class="gallery_card">
            <div>
                <img src="../assets/images/img4.avif" alt="natural scene" class="image" />
            </div>
            <div class="caption">
                <p>I see every person as a mountain of sorts; we can see how they look from afar, but will never know them until we explore.</p>
            </div>
        </div>

        <div class="gallery_card">
            <div>
                <img src="../assets/images/img5.avif" alt="natural scene" class="image" />
            </div>
            <div class="caption">
                <p>You’re not a wave, you’re a part of the ocean.</p>
            </div>
        </div>

        <div class="gallery_card">
            <div>
                <img src="../assets/images/img6.avif" alt="natural scene" class="image" />
            </div>
            <div class="caption">
                <p>There’s nothing more beautiful than the way the ocean refuses to stop kissing the shoreline, no matter how many times it’s sent away.</p>
            </div>
        </div>

        <div class="gallery_card">
            <div>
                <img src="../assets/images/img7.avif" alt="natural scene" class="image" />
            </div>
            <div class="caption">
                <p>Some mountains only require a good pair of shoes. Others require an entire team to conquer. Knowing which is which is the key to success.</p>
            </div>
        </div>

        <div class="gallery_card">
            <div>
                <img src="../assets/images/img8.avif" alt="natural scene" class="image" />
            </div>
            <div class="caption">
                <p>The tan will fade, but the memories will last forever</p>
            </div>
        </div>

        <div class="gallery_card">
            <div>
                <img src="../assets/images/img9.avif" alt="natural scene" class="image" />
            </div>
            <div class="caption">
                <p>A younger me needed to climb every mountain. The older me says they photograph better from the bottom.</p>
            </div>
        </div>

        <div class="gallery_card">
            <div>
                <img src="../assets/images/img10.avif" alt="natural scene" class="image" />
            </div>
            <div class="caption">
                <p>Work. Save. Vacation. Repeat.</p>
            </div>
        </div>

        <div class="gallery_card">
            <div>
                <img src="../assets/images/img11.avif" alt="natural scene" class="image" />
            </div>
            <div class="caption">
                <p>You cannot conquer a mountain, for it shall continue to exist beyond you. However, if not careful, a mountain can conquer you.</p>
            </div>
        </div>

        <div class="gallery_card">
            <div>
                <img src="../assets/images/img12.avif" alt="natural scene" class="image" />
            </div>
            <div class="caption">
                <p>We always discuss reaching the top of the mountain as the challenge. But those that have been there know coming back down is the hardest part.</p>
            </div>
        </div>
    </div>

</div>
<?php
$bottom = "";
include("./Footer.php") ?>