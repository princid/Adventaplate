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

<link rel="stylesheet" href="../assets/css/profileForm.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>


<div class="profile__container">
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" id="profileForm" enctype="multipart/form-data">

        <div class="editUserSection">
            <h1>Update Information</h1>

            <div class="userImageSection">
                <!-- Profile Image -->
                <?php if (!empty($new_image)) { ?>
                    <img id="imagePreview" src="<?php echo BASE_URL ?>assets/uploading/<?php echo $id. "/". $new_image; ?>" alt="">
                    
                <?php } else { ?>
                    <img id="imagePreview" src="<?php echo BASE_URL ?>assets/uploading/userDummy.png">
                <?php } ?>

                <!-- <img id="imagePreview" src="" alt="Image Preview"> -->

                <div class="round">
                    <input type="file" name="new_image" id="uploadImage" accept=".jpg, .jpeg, .png, .gif" onchange="previewImage(this)">
                    <i class="fa fa-camera"></i>
                </div>
            </div>
            <!-- <a class="delPic_btn" href="<?php #echo BASE_URL ?>components/deleteProfilePic.php">REMOVE PROFILE PIC</a> -->

            <!-- Button trigger modal -->
            <button type="button" class="modalBtn" data-bs-toggle="modal" data-bs-target="#exampleModal">
              REMOVE PROFILE PIC
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h2 class="modal-title fs-5 text-dark" id="exampleModalLabel">Are you sure?</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body text-dark">
                    <p>Do you really want to remove your profile picture?</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="closeBtn" data-bs-dismiss="modal">CLOSE</button>
                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                    <a class="delBtn" href="<?php echo BASE_URL ?>components/deleteProfilePic.php">DELETE</a>
                  </div>
                </div>
              </div>
            </div>


            <hr>

            <div class="userInfoForm">
            
                <div class="leftFormElements">
                    <div class=" form_elements">
                        <label for="name">*Name :</label><br />
                        <input type="text" name="name" id="name" placeholder="Enter your name" class="input" value="<?php echo $username; ?>" />
                        <div class="formError name"></div>
                    </div>

                    <br />

                    <!-- Bio -->
                    <div class="form_elements">
                        <label for="bio">*Bio :</label><br />
                        <input type="text" name="bio" id="bio" placeholder="Bio" class="input" value="<?php echo $bio; ?>" />
                    </div>

                    <br>

                    <!-- Select Age -->
                    <div class="form_elements">
                        <label for="age">*Age :</label><br />
                        <input type="number" name="age" id="age" placeholder="Enter your age" class="input" value="<?php echo $age; ?>" />
                        <div class="formError age"></div>
                    </div>

                    <br />

                    <!-- Phone Number -->
                    <div class="form_elements">
                        <label for="number">*Phone Number :</label><br />
                        <input type="number" name="phone" id="phone" placeholder="Enter your Phone no." class="input" value="<?php echo $phone; ?>" />
                        <div class="formError phone"></div>
                    </div>

                    <br>

                    <!-- D.O.B -->
                    <div class="form_elements">
                        <label for="dateOfBirth">*Date of Birth :</label><br />
                        <input type="date" name="dateOfBirth" id="dob" placeholder="Enter your D.O.B." value="<?php echo $dob; ?>"  class="input">
                        <div class="formError dateOfBirth"></div>
                    </div>

                    <br>

                    <!-- User's Gender (should be saved into database in the form of 0,1,2) corresponding to F,M,Others -->
                    <!-- Select Gender -->
                    <div class="form_elements">
                        <label>Select Gender :</label>
                        <br />
                        <input type="radio" name="gender" id="female" class="gapLabel" value="0" <?php if ($gender == 0) echo "checked"; ?> />
                        <label for="female">Female(0)</label>

                        <input type="radio" name="gender" id="male" class="gapLabel" value="1" <?php if ($gender == 1) echo "checked"; ?> />
                        <label for="male">Male(1)</label>

                        <input type="radio" name="gender" id="others" class="gapLabel" value="2" <?php if ($gender == 2) echo "checked"; ?> />
                        <label for="female">Others(2)</label>

                        <div class="formError gender"></div>
                    </div>

                    <br>
                    

                </div>

                <div class="rightFormElements">
                    <!-- User's Hobbies using Multiselect -->
                    <div class="form_elements">
                        <label for="hobbies">Choose your Hobbies:</label>
                        <br>
                        <select name="hobbies[]" id="hobbies" multiple>
                            <option value="Cricket">Cricket</option>
                            <option value="Volleyball">Volleyball</option>
                            <option value="Carrom">Carrom</option>
                            <option value="Football">Footbal</option>
                            <option value="Sketching">Sketching</option>
                            <option value="Singing">Singing</option>
                            <option value="Dancing">Dancing</option>
                        </select>
                    </div>

                    <br>

                    <!-- User's Address -->

                    <!-- Street Address -->
                    <div class="form_elements">
                        <label for="street">Street Address :</label><br />
                        <input type="text" name="street" id="street" placeholder="Street Address" class="input" value="<?php echo $street; ?>" />
                    </div>

                    <br>

                    <div class="form_elements">
                        <!-- <label for="address">My Address:</label> -->
                        <!-- <br> -->
                        <select id="country" name="country" class="selectBox" onchange="fetchStates()">
                            <option value="">Select Country</option>
                            <!-- <option value="India">India</option>
                            <option value="Australia">Australia</option>
                            <option value="South Korea">South Korea</option>
                            <option value="Japan">Japan</option>
                            <option value="New Zealand">New Zealand</option>
                            <option value="England">England</option>
                            <option value="Russia">Russia</option>
                            <option value="Italy">Italy</option> -->
                        </select>
                    </div>

                    <br>
                        
                    <div class="form_elements">
                        <!-- <label for="state">Select State:</label> -->
                        <!-- <br> -->
                        <select name="state" class="selectBox" id="state" onchange="fetchCities()" >
                            <option value="<?php echo $state; ?>">State</option>
                            <!-- <option value="Australia">Australia</option>
                            <option value="South Korea">South Korea</option>
                            <option value="Japan">Japan</option>
                            <option value="New Zealand">New Zealand</option>
                            <option value="England">England</option>
                            <option value="Russia">Russia</option>
                            <option value="Italy">Italy</option> -->
                        </select>
                    </div>

                    <br>
                        
                        
                    <div class="form_elements">
                        <!-- <label for="state">Select State:</label> -->
                        <!-- <br> -->
                        <select name="city" class="selectBox" id="city">
                            <option value="<?php echo $city; ?>">City</option>
                            <!-- <option value="Australia">Australia</option>
                            <option value="South Korea">South Korea</option>
                            <option value="Japan">Japan</option>
                            <option value="New Zealand">New Zealand</option>
                            <option value="England">England</option>
                            <option value="Russia">Russia</option>
                            <option value="Italy">Italy</option> -->
                        </select>
                    </div>

                    <br>

                    <!-- PIN Code -->
                    <div class="form_elements">
                        <label for="pin">PIN Code :</label><br />
                        <input type="number" name="pin" id="pin" placeholder="Enter your PIN Code" class="input" value="<?php echo $pin; ?>" />
                    </div>

                    <br>

                    <!-- Select Subjects in Checkbox (with the help of GPT(complicated way)) -->
                    <div class="form_elements">
                        <label>*Select Subjects :</label>
                        <br />
                        <?php
                        $availableSubjects = ["Maths", "Science", "History", "Geopolitics"]; // List of available subjects
                        foreach ($availableSubjects as $subject) {
                            $isChecked = in_array($subject, $selectedSubjects) ? "checked" : ""; // Check if subject is selected
                            echo '<input type="checkbox" name="subject[]" class="gapLabel" id="' . strtolower($subject) . '" value="' . $subject . '" ' . $isChecked . ' />';
                            echo '<label for="' . strtolower($subject) . '">' . $subject . '</label>';
                        }
                        ?>
                        <div class="formError subject"></div>
                    </div>


                </div>
            
            </div>
            

            <!-- Buttons Section -->
            <br>
            <br>
            <div class="profileButtons">
                <input class="saveBtn" type="submit" value="SAVE CHANGES">
                

                <!-- Button trigger modal -->
                <!-- <button type="button" class="logOut_btn" data-bs-toggle="modal" data-bs-target="#delModal">
                  DELETE ACCOUNT
                </button> -->

                <!-- Modal -->
                <div class="modal fade" id="delModal" tabindex="-1" aria-labelledby="" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h2 class="modal-title fs-5 text-dark" id="">Are you sure?</h2>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body text-dark">
                        <p>Do you really want to delete your account?</p>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="closeBtn" data-bs-dismiss="modal">CLOSE</button>
                        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                        <a class="delBtn" href="<?php echo BASE_URL ?>components/deleteAccount.php">DELETE</a>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </form>

        <!-- <div class="forget">
            <a href="./forgotPass.php"><button type="button" class="forgetBtn">Forget Password</button></a> 
        </div> -->
</div>

<a href="./ProfilePage.php">
    <div class="profileIcon">
        <i class="fa-solid fa-user" style="color: #ffffff;"></i>
    </div>
</a>

<script src="../assets/js/updateProfile.js"></script>

<script>
    function previewImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                // Set the source of the img element to the selected image
                document.getElementById('imagePreview').src = e.target.result;
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

<script>
    const apiEndpoint = 'https://api.countrystatecity.in/v1/';
    console.log(apiEndpoint);
    const apiKey = "SHdzNWh5VWVxZ3BlN2ZodlBYdmdVOFQ1WDBpcVJlQ0wwQWswSXIzYg==";

    // Function to fetch countries
    async function fetchCountries() {
        const countrySelect = document.getElementById('country');
        countrySelect.innerHTML = '<option value="">Loading...</option>';
        
        try {
            const response = await fetch(apiEndpoint + 'countries', {
                headers: {
                    'X-CSCAPI-KEY': apiKey,
                },
            });
            const data = await response.json();

            countrySelect.innerHTML = '<option value="">Select Country</option>';
            data.forEach(country => {
                const option = document.createElement('option');
                option.value = country.iso2;
                option.textContent = country.name;
                countrySelect.appendChild(option);
            });
            countrySelect.value = '<?php echo $country; ?>';
            fetchStates();
        } catch (error) {
            console.error('Error fetching countries:', error);
        }
    }   

    // Function to fetch states based on the selected country
    async function fetchStates() {
        // console.log("shgbfvgfer");
        const countrySelect = document.getElementById('country');
        const stateSelect = document.getElementById('state');
        const citySelect = document.getElementById('city');

        const selectedCountry = countrySelect.value;

        if (selectedCountry) {
            stateSelect.innerHTML = '<option value="">Loading...</option>';
            citySelect.innerHTML = '<option value="">Select City</option>';

            try {
                const response = await fetch(apiEndpoint + `countries/${selectedCountry}/states`, {
                    headers: {
                        'X-CSCAPI-KEY': apiKey,
                    },
                });
                const data = await response.json();

                stateSelect.innerHTML = '<option value="">Select State</option>';
                data.forEach(state => {
                    const option = document.createElement('option');
                    option.value = state.iso2;
                    option.textContent = state.name;
                    stateSelect.appendChild(option);
                });
                stateSelect.value = '<?php echo $state; ?>';
                fetchCities();
            } catch (error) {
                console.error('Error fetching states:', error);
            }
        } else {
            stateSelect.innerHTML = '<option value="">Select State</option>';
            citySelect.innerHTML = '<option value="">Select City</option>';
        }
    }

    // Function to fetch cities based on the selected state
    async function fetchCities() {
        const countrySelect = document.getElementById('country');
        const stateSelect = document.getElementById('state');
        const citySelect = document.getElementById('city');

        const selectedCountry = countrySelect.value;
        const selectedState = stateSelect.value;

        if (selectedCountry && selectedState) {
            citySelect.innerHTML = '<option value="">Loading...</option>';

            try {
                const response = await fetch(apiEndpoint + `countries/${selectedCountry}/states/${selectedState}/cities`, {
                    headers: {
                        'X-CSCAPI-KEY': apiKey,
                    },
                });
                const data = await response.json();

                citySelect.innerHTML = '<option value="">Select City</option>';
                data.forEach(city => {
                    const option = document.createElement('option');
                    option.value = city.name;
                    option.textContent = city.name;
                    citySelect.appendChild(option);
                });

                citySelect.value = '<?php echo $city; ?>';
            } catch (error) {
                console.error('Error fetching cities:', error);
            }
        } else {
            citySelect.innerHTML = '<option value="">Select City</option>';
        }
    }

// Initial population of the country dropdown
fetchCountries();

</script>
