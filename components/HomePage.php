
<?php
// session_start();

// include("../includes/header.php");
// require("../config/constants.php");
include("Navbar.php");
// echo "hjsgf";

?>
<link rel="stylesheet" href="<?php echo BASE_URL.'assets/css/index.css'; ?>" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<!-- Banner Section Starts -->
<div class="banner">
    <div class="banner__text">
        <h1>Hello! <?php if($_SESSION) { ?> <?php echo $username;?> <?php } else { ?> <?php echo "Dummy User" ?> <?php } ?>, Wanna Camp?</h1>
        <p>
            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
            nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
            reprehenderit in voluptate velit
        </p>
        <div class="banner__btn">
            <button class="banner__btn1">WHY CAMP?</button>
            <button class="banner__btn2">HOW TO CAMP</button>
        </div>
    </div>
</div>
<!--  Banner Section ends -->

<!--  Services Section Starts -->
<div class="services">
    <!-- 1st Service Box -->
    <div class="services__description">
        <div class="services__icon">
        <i class="fa-solid fa-plane-departure" style="color: #ffffff;"></i>
            
        </div>
        <div class="services__text">TRAVEL</div>
    </div>

    <!--  2nd Service Box -->
    <div class="services__description">
        <div class="services__icon">
            <i class="fa-solid fa-umbrella-beach" style="color: #ffffff;"></i>
        </div>
        <div class="services__text">BEACH</div>
    </div>

    <!-- 3rd Service Box -->
    <div class="services__description">
        <div class="services__icon">
        <i class="fa-solid fa-tents" style="color: #ffffff"></i>
        </div>
        <div class="services__text">CAMPING</div>
    </div>

    <!-- 4th Service Box -->
    <div class="services__description">
        <div class="services__icon">
        <i class="fa-solid fa-mountain-sun" style="color: #ffffff;"></i>
        </div>
        <div class="services__text">MOUNTAIN</div>
    </div>
</div>
<!-- Services Section ends -->

<!-- Gallery Section Starts -->
<div class="gallery">
    <div class="gallery__header">
        <h2>Outdoor Recreation</h2>
        <p>
            Sample text. Click to select the text box. Click again or double click
            to start editing the text.
        </p>
    </div>
    <div class="gallery__box">
        <div class="gallery__imgContainer">
            <img src="../assets/images/gallery12.jpg" alt="" class="gallery__img" />
            <div class="gallery__text">
                <h3>Sample Headline</h3>
                <p>sample text</p>
            </div>
        </div>

        <div class="gallery__imgContainer">
            <img src="../assets/images/gallery4.jpg" alt="" class="gallery__img" />

            <div class="gallery__text">
                <h3>Sample Headline</h3>
                <p>sample text</p>
            </div>
        </div>

        <div class="gallery__imgContainer">
            <img src="../assets/images/gallery3.jpg" alt="" class="gallery__img" />

            <div class="gallery__text">
                <h3>Sample Headline</h3>
                <p>sample text</p>
            </div>
        </div>

        <div class="gallery__imgContainer">
            <img src="../assets/images/gallery10.jpg" alt="" class="gallery__img" />

            <div class="gallery__text">
                <h3>Sample Headline</h3>
                <p>sample text</p>
            </div>
        </div>

        <div class="gallery__imgContainer">
            <img src="../assets/images/gallery11.jpg" alt="" class="gallery__img" />

            <div class="gallery__text">
                <h3>Sample Headline</h3>
                <p>sample text</p>
            </div>
        </div>

        <div class="gallery__imgContainer">
            <img src="../assets/images/gallery2.jpg" alt="" class="gallery__img" />

            <div class="gallery__text">
                <h3>Sample Headline</h3>
                <p>sample text</p>
            </div>
        </div>
    </div>
    
    <a href="./GalleryPage.php">
        <button class="gallery__btn">MORE PHOTOS</button>
    </a>
</div>
<!-- Gallery Section ends -->

<!-- Category Section Starts -->
<div class="category">
    <div class="category__header">
        <h2>Find your next getaway</h2>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
            eiusmod tempor incididunt ut labore et dolore magna aliqua.
        </p>
    </div>
    <div class="category__container">
        <div class="category__containerBox">
            <img src="../assets/images/category1.jpg" alt="" class="category__img" />

            <div class="category__containerBox__text">
                <h3>BEST RV CAMPING</h3>
                <em>Sample text. Click to select the Text Element.</em>
            </div>
        </div>

        <div class="category__containerBox">
            <img src="../assets/images/category2.jpg" alt="" class="category__img" />

            <div class="category__containerBox__text">
                <h3>LAKE CAMPING</h3>
                <em>Sample text. Click to select the Text Element.</em>
            </div>
        </div>
        <div class="category__containerBox">
            <img src="../assets/images/category3.jpg" alt="" class="category__img" />

            <div class="category__containerBox__text">
                <h3>BEACH STAYS</h3>
                <em>Sample text. Click to select the Text Element.</em>
            </div>
        </div>
        <div class="category__containerBox">
            <img src="../assets/images/category4.jpg" alt="" class="category__img" />

            <div class="category__containerBox__text">
                <h3>BACKYARD CAMPING</h3>
                <em>Sample text. Click to select the Text Element.</em>
            </div>
        </div>
        <div class="category__containerBox">
            <img src="../assets/images/category5.jpg" alt="" class="category__img" />

            <div class="category__containerBox__text">
                <h3>CAR CAMPING</h3>
                <em>Sample text. Click to select the Text Element.</em>
            </div>
        </div>
        <div class="category__containerBox">
            <img src="../assets/images/category6.jpg" alt="" class="category__img" />

            <div class="category__containerBox__text">
                <h3>WILDERNESS CAMPING</h3>
                <em>Sample text. Click to select the Text Element.</em>
            </div>
        </div>
    </div>
</div>
<!-- Category Section Ends -->

<!-- Explore Section Starts -->
<div class="explore">
    <div class="explore__header">
        <h2>Where to go now</h2>
    </div>

    <div class="explore__container">
        <!-- 1st Box -->
        <div class="explore__box">
            <div class="explore__boxImg">
                <img src="../assets/images/explore1.jpg" alt="" class="explore__boxImg" />
            </div>
            <div class="explore__boxCaption">
                <h3>HIDDEN GEMS</h3>
                <em>Sites on the rise</em>
            </div>
            <div class="explore__boxDescription">
                <p>
                    Sample text. Click to select the text box. Click again or double
                    click to start editing the text.
                </p>
            </div>
            <div class="explore__boxLink">
                <a href="">LEARN MORE</a>
            </div>
        </div>

        <!-- 2nd Box -->
        <div class="explore__box">
            <div class="explore__boxImg">
                <img src="../assets/images/explore4.jpg" alt="" class="explore__boxImg" />
            </div>
            <div class="explore__boxCaption">
                <h3>COTTAGE STAYS</h3>
                <em>Our top picks</em>
            </div>
            <div class="explore__boxDescription">
                <p>
                    Sample text. Click to select the text box. Click again or double
                    click to start editing the text.
                </p>
            </div>
            <div class="explore__boxLink">
                <a href="">LEARN MORE</a>
            </div>
        </div>

        <!-- 3rd Box -->
        <div class="explore__box">
            <div class="explore__boxImg">
                <img src="../assets/images/explore2.jpg" alt="" class="explore__boxImg" />
            </div>
            <div class="explore__boxCaption">
                <h3>GLAMPING</h3>
                <em>Exercitation ullamco</em>
            </div>
            <div class="explore__boxDescription">
                <p>
                    Sample text. Click to select the text box. Click again or double
                    click to start editing the text.
                </p>
            </div>
            <div class="explore__boxLink">
                <a href="">LEARN MORE</a>
            </div>
        </div>
    </div>
</div>

<?php
$bottom = "";
include("./Footer.php") ?>
