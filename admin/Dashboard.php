<?php
session_start();

include("../includes/header.php");

// Including Contants
include("../config/constants.php");

// Including the Databse Connection
include("../config/connectDB.php");

include("../src/controller/userData.php");

// Including User's data
$id = $_SESSION['id'];
$fetch_name = "SELECT * FROM users_table WHERE user_role_status != 1 ORDER BY user_role_status";
$fetch_name_run = mysqli_query($conn, $fetch_name);

$total_users = mysqli_num_rows($fetch_name_run);


$fetch_active_users = "SELECT active_status FROM users_table WHERE active_status = 1 AND user_role_status != 1 ";
$fetch_active_users_run = mysqli_query($conn, $fetch_active_users);

$active_users = mysqli_num_rows($fetch_active_users_run);


$fetch_inactive_users = "SELECT active_status FROM users_table WHERE active_status = 0 AND user_role_status != 1 ";
$fetch_inactive_users_run = mysqli_query($conn, $fetch_inactive_users);

$inactive_users = mysqli_num_rows($fetch_inactive_users_run);

// $active_users = mysqli_num_rows($fetchAllUsers['active_status' == 1]);


// if($fetchAllUsers['active_status'] == 1){
//     $active_users = mysqli_num_rows($fetch_name_run);
//     var_dump($active_users);
// }
// var_dump($active_users);



$fetch_address = "SELECT * FROM users_address WHERE 1";
$fetch_address_run = mysqli_query($conn, $fetch_address);
// var_dump(mysqli_fetch_assoc($fetch_address_run));

if ($role != 1) {
    header("location: ../components/HomePage.php");
    exit();
}

// if (empty($_SESSION['id'])) {
//     header("location: ./SignIn.php");
//     exit();
// }

// include("../src/controller/userDataForAdmin.php");

?>

<link rel="stylesheet" href="../assets/css/Dasboard.css">

<!-- Bootstrap -->
<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script> -->


<!-- Fontawesome -->
<!-- <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script> -->



<!-- Dashboard -->
<div class="d-flex flex-column flex-lg-row h-lg-full bg-surface-secondary">
    <!-- Vertical Navbar -->
    <nav class="navbar show navbar-vertical h-lg-screen navbar-expand-lg px-0 py-3 navbar-light bg-white border-bottom border-bottom-lg-0 border-end-lg" id="navbarVertical">
        <div class="container-fluid nav_container">
            <!-- Toggler -->
            <button class="navbar-toggler ms-n2" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarCollapse" aria-controls="sidebarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Brand -->
            <a class="navbar-brand py-lg-2 mb-lg-5 px-lg-6 me-0" href="../components/HomePage.php">
                <!-- <img src="https://preview.webpixels.io/web/img/logos/clever-primary.svg" alt="..."> -->

                <!-- Title -->
                <h2 class="h2 mb-0 ls-tight brand_logo">Adventaplate <span class="trademark">&reg;</span> </h2>

            </a>
            <!-- Divider -->
            <hr class="navbar-divider my-2 opacity-2">

            <!-- User menu (mobile) -->
            <div class="navbar-user d-lg-none">
                <!-- Dropdown -->
                <div class="dropdown">
                    <!-- Toggle -->
                    <a href="#" id="sidebarAvatar" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="avatar-parent-child">
                            <img alt="Image Placeholder" src="https://images.unsplash.com/photo-1548142813-c348350df52b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=3&w=256&h=256&q=80" class="avatar avatar- rounded-circle">
                            <span class="avatar-child avatar-badge bg-success"></span>
                        </div>
                    </a>
                    <!-- Menu -->
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="sidebarAvatar">
                        <a href="#" class="dropdown-item">Profile</a>
                        <a href="#" class="dropdown-item">Settings</a>
                        <a href="#" class="dropdown-item">Billing</a>
                        <hr class="dropdown-divider">
                        <a href="#" class="dropdown-item">Logout</a>
                    </div>
                </div>
            </div>

            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidebarCollapse">
                <!-- Navigation -->
                <ul class="navbar-nav">

                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="bi bi-house"></i> Dashboard
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="bi bi-bar-chart"></i> Analitycs
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="bi bi-chat"></i> Messages
                            <span class="badge bg-soft-primary text-primary rounded-pill d-inline-flex align-items-center ms-auto">6</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="bi bi-bookmarks"></i> Collections
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="bi bi-people"></i> Users
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="bi bi-person-plus"></i> Create
                        </a>
                    </li>
                </ul>
                <!-- Divider -->
                <hr class="navbar-divider my-2 opacity-2">
                <!-- Navigation -->
                <ul class="navbar-nav mb-md-4">
                    <li>
                        <div class="nav-link text-xs font-semibold text-uppercase text-muted ls-wide" href="#">
                            Clients
                            <span class="badge bg-soft-primary text-primary rounded-pill d-inline-flex align-items-center ms-4">13</span>
                        </div>
                    </li>

                    <?php foreach ($fetch_name_run as $user_data) { ?>
                        <li>
                            <a href="#" class="nav-link d-flex align-items-center">
                                <div class="me-4">
                                    <div class="position-relative d-inline-block text-white">
                                        <?php if (!empty($user_data['user_profile_image'])) { ?>
                                            <img src="<?php echo BASE_URL ?>assets/uploading/<?php echo $user_data['id'] . "/" . $user_data['user_profile_image']; ?>" alt="" class="avatar rounded-circle">

                                        <?php } else { ?>
                                            <img src="<?php echo BASE_URL ?>assets/uploading/userDummy.png" class="avatar rounded-circle">
                                        <?php } ?>

                                        <!-- <img alt="Image Placeholder" src="https://images.unsplash.com/photo-1548142813-c348350df52b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=3&w=256&h=256&q=80" class="avatar rounded-circle"> -->

                                        <span class="position-absolute bottom-2 end-2 transform translate-x-1/2 translate-y-1/2 border-2 border-solid border-current w-3 h-3 bg-success rounded-circle"></span>
                                    </div>
                                </div>

                                <div>
                                    <span class="d-block text-sm font-bold">
                                        <?php echo ($user_data['user_name']); ?>
                                    </span>

                                    <?php foreach ($fetch_address_run as $user_address) { ?>
                                        <span class="d-block text-xs font-regular address_text ">
                                            <?php if ($user_data['id'] == $user_address['user_id']) {
                                                echo $user_address['user_city'] . ' - ' . $user_address['user_state'] . ' - ' .  $user_address['user_country']; ?>
                                            <?php } ?>
                                        </span>
                                    <?php } ?>

                                </div>
                                <!-- <div class="ms-auto">
                                    <i class="bi bi-chat"></i>
                                </div> -->
                            </a>
                        </li>
                    <?php } ?>

                </ul>

                <!-- Divider -->
                <hr class="navbar-divider my-2 opacity-2">

                <!-- Push content down -->
                <div class="mt-auto"></div>
                <!-- User (md) -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="bi bi-person-circle"></i> Account
                        </a>
                    </li>

                    <!-- Divider -->
                    <hr class="navbar-divider my-2 opacity-2">

                    <li class="nav-item">
                        <a class="nav-link" href="">
                            <i class="bi bi-box-arrow-left"></i> Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main content -->
    <div class="h-screen flex-grow-1 overflow-y-lg-auto">
        <!-- Header -->
        <header class="bg-surface-primary border-bottom pt-6">
            <div class="container-fluid">
                <div class="mb-npx">
                    <div class="row align-items-center">
                        <div class="col-sm-6 col-12 mb-4 mb-sm-0">
                            <!-- Title -->
                            <h2 class="h2 mb-0 ls-tight">Adventaplate</h2>
                        </div>
                        <!-- Actions -->
                        <div class="col-sm-6 col-12 text-sm-end">
                            <div class="mx-n1">
                                <a href="../components/HomePage.php" class="btn d-inline-flex btn-sm btn-neutral border-base mx-1">
                                    <span class=" pe-2">
                                        <i class="bi bi-house"></i>
                                    </span>
                                    <span>Home</span>
                                </a>
                                <a href="../components/SignOut.php" class="btn d-inline-flex btn-sm btn-primary mx-1">
                                    <span class=" pe-2">
                                        <i class="bi bi-box-arrow-left"></i>
                                    </span>
                                    <span>Log Out</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Nav -->
                    <ul class="nav nav-tabs mt-4 overflow-x border-0">
                        <li class="nav-item ">
                            <a href="#" class="nav-link active">All files</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link font-regular">Shared</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link font-regular">File requests</a>
                        </li>
                    </ul>

                </div>
            </div>
        </header>

        <!-- Main -->
        <main class="py-6 bg-surface-secondary">
            <div class="container-fluid">
                <!-- Card stats -->
                <div class="row g-6 mb-6">
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card shadow border-0 top_card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <span class="h6 font-semibold text-dark text-md d-block mb-2">Total
                                            Users</span>
                                        <span class="h3 font-bold mb-0">0<?php echo $total_users; ?></span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-tertiary text-white text-lg rounded-circle">
                                            <i class="bi bi-credit-card"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-2 mb-0 text-sm">
                                    <span class="badge badge-pill bg-soft-success text-success me-2">
                                        <i class="bi bi-arrow-up me-1"></i>13%
                                    </span>
                                    <span class="text-nowrap text-xs font-semibold text-muted">Since last month</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card shadow border-0 top_card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <span class="h6 font-semibold text-dark text-md d-block mb-2">Deleted
                                            Users</span>
                                        <span class="h3 font-bold mb-0">00</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-primary text-white text-lg rounded-circle">
                                            <i class="bi bi-people"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-2 mb-0 text-sm">
                                    <span class="badge badge-pill bg-soft-success text-success me-2">
                                        <i class="bi bi-arrow-up me-1"></i>30%
                                    </span>
                                    <span class="text-nowrap text-xs font-semibold text-muted">Since last month</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card shadow border-0 top_card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <span class="h6 font-semibold text-dark text-md d-block mb-2">Active
                                            Users</span>
                                        <span class="h3 font-bold mb-0">0<?php echo $active_users; ?></span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-info text-white text-lg rounded-circle">
                                            <i class="bi bi-clock-history"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-2 mb-0 text-sm">
                                    <span class="badge badge-pill bg-soft-danger text-danger me-2">
                                        <i class="bi bi-arrow-down me-1"></i>-5%
                                    </span>
                                    <span class="text-nowrap text-xs font-semibold text-muted">Since last month</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card shadow border-0 top_card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <span class="h6 font-semibold text-dark text-md d-block mb-2">Inactive
                                            Users</span>
                                        <span class="h3 font-bold mb-0">0<?php echo $inactive_users; ?></span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-warning text-white text-lg rounded-circle">
                                            <i class="bi bi-minecart-loaded"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-2 mb-0 text-sm">
                                    <span class="badge badge-pill bg-soft-success text-success me-2">
                                        <i class="bi bi-arrow-up me-1"></i>10%
                                    </span>
                                    <span class="text-nowrap text-xs font-semibold text-muted">Since last month</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- User's Editable Data -->
                <div class="card shadow border-0 mb-7 userListDiv">
                    <div class="headerCard">
                        <!-- <div class="card-header"> -->
                            <h3 class="h3 mb-0 ls-tight">User's List</h3>
                        <!-- </div> -->
                        <div class="">
                            <label for="#userStatusFilter " class="fs-5 primary-text fw-bold me-2">Status Filter :</label>
                            <select id="userStatusFilter" class="fs-6 p-1 fw-bold">
                                <option value="all">All</option>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <!-- </div> -->
                    <div class="table-responsive">
                        <table id="table_id" class="table table-hover table-nowrap display">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Account Creation Date</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Change Status</th>
                                    <th class="text-center" scope="col">Assign Role</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody class="tabular_card">
                                <?php
                                foreach ($fetch_name_run as $user_data) { ?>

                                    <tr>
                                        <td>
                                            <?php if (!empty($user_data['user_profile_image'])) { ?>
                                                <img title="<?php echo $user_data['user_name'] ?>" src="<?php echo BASE_URL ?>assets/uploading/<?php echo $user_data['id'] . "/" . $user_data['user_profile_image']; ?>" alt="" class="avatar avatar-sm rounded-circle me-2">

                                            <?php } else { ?>
                                                <img title="<?php echo $user_data['user_name'] ?>" src="<?php echo BASE_URL ?>assets/uploading/userDummy.png" class="avatar avatar-sm rounded-circle me-2">
                                            <?php } ?>

                                            <a class="text-heading font-semibold" href="#">
                                                <?php echo strtoupper($user_data['user_name']); ?>
                                            </a>
                                        </td>

                                        <td>
                                            <?php echo ($user_data['user_email']); ?>
                                        </td>

                                        <td>
                                            <!-- <img alt="..." src="https://preview.webpixels.io/web/img/other/logos/logo-1.png" class="avatar avatar-xs rounded-circle me-2"> -->
                                            <?php echo ($user_data['created_at']); ?>
                                        </td>

                                        <!-- <td>
                                            <span class="badge badge-lg badge-dot">
                                                <?php //if ($user_data['active_status'] == 1) { 
                                                ?><i class="bg-success"></i>Active <?php // } else { 
                                                                                    ?><i class="bg-danger"></i>Inactive <?php // } 
                                                                                                                        ?>
                                            </span>
                                        </td> -->

                                        <!-- <td>
                                            <form action="../src/controller/activeStatus.php" method="post"></form>
                                            <div class="toggle_div">
                                                <label class="switch">
                                                    <input type="checkbox" class="status-toggle" data-user-id="<?php //echo $user_data['id']; 
                                                                                                                ?>" <?php //echo $user_data['active_status'] == 1 ? 'checked' : ''; 
                                                                                                                    ?>>
                                                    <span class="slider"></span>
                                                </label>

                                                
                                                <input type="submit" name="change_status" class="btn btn-sm btn-primary" value="Save">
                                                
                                            </div>
                                            </form>
                                        </td> -->

                                        <!-- <button title="Save status" type="submit" class="btn btn-sm btn-success statusBtn">
                                            <i class="bi bi-cloud-download-fill"></i>
                                        </button> -->

                                        <td>
                                            <span class="badge badge-lg badge-dot" id="status-badge-<?php echo $user_data['id']; ?>">
                                                <?php if ($user_data['active_status'] == 1) { ?>
                                                    <i class="bg-success"></i>Active
                                                <?php } else { ?>
                                                    <i class="bg-danger"></i>Inactive
                                                <?php } ?>
                                            </span>
                                        </td>

                                        <td>
                                            <div class="change_status_div">
                                                <div class="toggle_div">
                                                    <label class="switch">
                                                        <input type="checkbox" class="status-toggle" data-user-id="<?php echo $user_data['id']; ?>" <?php echo $user_data['active_status'] == 1 ? 'checked' : ''; ?>>
                                                        <span class="slider"></span>
                                                    </label>
                                                </div>
                                                <button title="Save status" class="btn btn-sm btn-success save-status-btn statusBtn" data-user-id="<?php echo $user_data['id']; ?>"><i class="bi bi-check-circle-fill"></i></button>
                                            </div>
                                        </td>


                                        <td>

                                            <?php if ($user_data['user_role_status'] == 1) { ?>
                                                <select disabled="disabled" class="btn btn-sm selectBtn">
                                                    <option value="">SUPER ADMIN</option>
                                                    <!-- <option value="" disabled="disabled">Super Admin (disabled)</option> -->
                                                    <!-- <option value="">User</option> -->
                                                </select>
                                                <a href="#" class="btn btn-sm btn-primary disabled">Update</a>

                                                <!-- <button type="button" class="btn btn-sm btn-square btn-danger delBtn">
                                                    <i class="bi bi-upload"></i>
                                                </button> -->

                                            <?php } else { ?>

                                                <form action="../src/controller/userDataForAdmin.php" method="post">
                                                    <select name="role" class="btn btn-sm selectBtn">

                                                        <option <?php if ($user_data['user_role_status'] == 3) { ?> selected <?php } ?> value="3">USER</option>
                                                        <option <?php if ($user_data['user_role_status'] == 2) { ?> selected <?php } ?> value="2">ADMIN</option>
                                                        <!-- <option value="1" disabled="disabled"></option> -->
                                                    </select>

                                                    <input type="hidden" name="user_data_id" value="<?php echo $user_data['id']; ?>">

                                                    <input type="submit" name="update_user_role" class="btn btn-sm btn-primary" value="Update">

                                                    <!-- <button type="button" class="btn btn-sm btn-square btn-primary delBtn">
                                                        <i class="bi bi-arrow-repeat"></i>
                                                    </button> -->

                                                </form>

                                            <?php } ?>

                                        </td>

                                        <td class="text-end">

                                            <?php if ($user_data['user_role_status'] == 1) { ?>

                                                <button type="button" disabled="disabled" class="btn btn-sm btn-square btn-success editBtn">
                                                    <i class="bi bi-pencil-square"></i>
                                                </button>

                                                <button type="button" disabled="disabled" class="btn btn-sm btn-square btn-danger delBtn">
                                                    <i class="bi bi-trash-fill"></i>
                                                </button>
                                            <?php } else { ?>

                                                <a href=<?php echo "http://localhost/PHP_Assesments/Adventaplate/components/ProfileForm.php?id=" . $user_data['id']; ?>>
                                                    <button title="Edit User" type="button" class="btn btn-sm btn-square btn-success editBtn">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </button>
                                                </a>

                                                <a href="#delModal_<?php echo $user_data['id']; ?>" rel="modal:open">
                                                    <button title="Delete User" type="button" class="btn btn-sm btn-square btn-danger delBtn">
                                                        <i class="bi bi-trash-fill"></i>
                                                    </button>
                                                </a>

                                                <div id="delModal_<?php echo $user_data['id']; ?>" class="modal">
                                                    <p>Are you sure, you want to delete <?php echo $user_data['user_name']; ?> 's account?</p>
                                                    <a class="closeBtn" href="#" rel="modal:close">Close</a>
                                                    <a class="delAnchor" href="#" rel="">Delete</a>
                                                </div>

                                            <?php } ?>


                                        </td>

                                    </tr>

                                <?php } ?>



                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer border-0 py-5">
                        <!-- <span class="text-muted text-sm">Showing 10 items out of 250 results found</span> -->
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>


<!-- Remember to include jQuery :) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>

<!-- jQuery Modal -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />




<!-- for jquery table -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
<script>
    $(document).ready(function() {
        const table = $('#table_id').DataTable({
            "paging": true,
            "pageLength": 5,
            "order": [5, 'asc'],
            "pagingType": "simple_numbers",
            "language": {
                "paginate": {
                    "next": "&gt;",
                    "previous": "&lt;"
                },
                "lengthMenu": "Show <select>" +
                    "<option value='5'>5</option>" +
                    "<option value='10'>10</option>" +
                    "<option value='25'>25</option>" +
                    "<option value='-1'>All</option>" +
                    "</select> entries",
                "searchPlaceholder": "Search..."
            }
        });

        // Initial load of the DataTable with all data
        table.columns(3).search('').draw();

        // Add change event handler to the dropdown
        $('#userStatusFilter').on('change', function() {
            var status = $(this).val();

            if (status === 'all') {
                // Show all rows
                table.columns(3).search('').draw();
            } else if (status === 'active') {
                // Filter rows based on active status
                table.columns(3).search('Active').draw();
            } else if (status === 'inactive') {
                // Filter rows based on inactive status
                table.columns(3).search('Inactive').draw();
            }
        });

        // // Attach an event listener to the toggle switches
        // $('#table_id').on('change', '.status-toggle', function() {
        //     const userId = $(this).data('user-id');
        //     const isActive = this.checked ? 1 : 0;

        //     // Make an AJAX request to update the user's status in the database
        //     $.ajax({
        //         url: '../src/controller/activeStatus.php',
        //         method: 'POST',
        //         data: {
        //             userId: userId,
        //             isActive: isActive
        //         },
        //         success: function(response) {
        //             // Handle the response if needed

        //             // Update the status in the table cell
        //             const cell = table.cell($(this).closest('td'));
        //             const badge = isActive ? '<i class="bg-success"></i>Active' : '<i class="bg-danger"></i>Inactive';
        //             cell.data(badge).draw();
        //         },
        //         error: function(xhr, status, error) {
        //             // Handle any errors
        //         }
        //     });
        // });




        // Attach an event listener to the Save buttons
        $('.save-status-btn').on('click', function() {
            const userId = $(this).data('user-id');
            const isActive = $(this).prev('.toggle_div').find('.status-toggle').prop('checked') ? 1 : 0;
            const statusBadge = $('#status-badge-' + userId);

            // Make an AJAX request to update the user's status in the database
            $.ajax({
                url: '../src/controller/activeStatus.php',
                method: 'POST',
                data: {
                    userId: userId,
                    isActive: isActive
                },
                success: function(response) {
                    // Handle the response if needed

                    // Update the status badge
                    if (isActive === 1) {
                        statusBadge.html('<i class="bg-success"></i>Active');
                    } else {
                        statusBadge.html('<i class="bg-danger"></i>Inactive');
                    }
                },
                error: function(xhr, status, error) {
                    // Handle any errors
                }
            });
        });

    });
</script>