<!-- including the head -->
<?php include 'admin_partials/head.php' ?>

<title>Add Admin</title>
<link rel="stylesheet" href="admin_css/style.css">
<!-- <link rel="stylesheet" href="admin_css/add_service.css"> -->
<link rel="stylesheet" href="admin_css/dashboard.css">

</head>

<!-- <?php
        if (isset($_GET['error'])) {
            if ($_GET['error'] == "empty_fields") {
                echo '<h4 class="err_msg">Please fill in all fields! </h4>';
            } else if ($_GET['error'] == "pwderr") {
                echo '<h4 class="err_msg">Your passwords do not match!</h4>';
            } else if ($_GET['error'] == "u_name_taken") {
                echo '<h4 class="err_msg">Phone number is already taken</h4>';
            } else if ($_GET['error'] == "sql_err") {
                echo '<h4 class="err_msg">error occurred</h4>';
            }
        }
        ?> -->

<div class="dashboard-container ">
    <!-- Header -->
    <div class="hidden md:block">
        <?php include 'admin_partials/Navbar_Desktop.php' ?>
    </div>
    <div class="nav">
        <!-- including the header -->
        <div class="hidden md:block">
            <?php include 'admin_partials/Navbar_Desktop.php' ?>
        </div>
        <div class="md:hidden">
            <?php $page = 'add-admin';
            include 'admin_partials/Navbar_mobile.php' ?>
        </div>
    </div>
    <!-- Bottom container -->
    <div class="bottom-container">
        <!-- Sidebar -->
        <div class="sidebar">
            <?php $page = 'add-admin';
            include 'admin_partials/sidebar.php' ?>
        </div>
        <!-- Main Sidebar -->
        <div class="dashboard">
            <!-- Header -->
            <div class="flex flex-col items-start">
                <h2 class="text-3xl font-bold">Add Admin</h2>
                <p class="text-gray-400">Create a new Store manager for the Meya store</p>
                <hr class="my-2">
            </div>

            <!-- Add Products Form -->
            <form action="admin_scripts/signup_script.php" method="POST" enctype="multipart/form-data" class="flex flex-col gap-5 w-full md:w-[60%]">
                <?php if ($_GET['error'] == "empty_fields") {
                    echo '<p class="p-5 bg-red-200 text-red-500 rounded-md">All Fields Must be Filled</p>';
                } ?>
                <div class="flex flex-col">
                    <label class="text-lg font-semibold" for="u_name">Phone number</label>
                    <input placeholder="phone number" class="py-2 px-3 rounded-md border-2 border-gray-300 outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2" id="u_name" type="tel" name="u_name" placeholder="0912345678">
                    <p class="hidden text-red-500">Error message</p>
                </div>

                <div class="flex flex-col">
                    <label class="text-lg font-semibold" for="pwd">Password</label>
                    <input placeholder="********" class="py-2 px-3 rounded-md border-2 border-gray-300 outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2" id="pwd" type="password" name="password" placeholder="*********">
                    <p class="hidden text-red-500">Error message</p>
                </div>
                <div class="flex flex-col">
                    <label class="text-lg font-semibold" for="confirm_pwd">Comfirm Password</label>
                    <input placeholder="********" class="py-2 px-3 rounded-md border-2 border-gray-300 outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2" id="confirm_pwd" type="password" name="confirm_pwd" placeholder="*********">
                    <p class="hidden text-red-500">Error message</p>
                </div>
                <div>
                    <?php if ($_GET['error'] == "pwderr") {
                        '<p class="text-red-500">All Fields Must be Filled</p>';
                    } ?>
                </div>

                <!-- <input class="p-3 rounded-lg bg-purple-500 text-white text-lg font-semibold tracking-widest" type="submit" name="submit" value="Upload"> -->
                <div class="flex gap-3">
                    <input class="w-max flex gap-3 items-center px-5 py-3 rounded-lg bg-purple-500 text-white text-lg tracking-wide hover:bg-purple-600" type="submit" name="signup-submit" value="Add Admin" />


                    <!-- <button type="submit" class="w-max flex gap-3 items-center px-5 py-3 rounded-lg bg-purple-500 text-white text-lg tracking-wide hover:bg-purple-600" type="submit" name="submit">
                        <svg width="12" height="14" viewBox="0 0 12 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10.6668 10.7503H8.91683M8.91683 10.7503H7.16683M8.91683 10.7503V8.87516M8.91683 10.7503V12.6255M5.41683 12.6255H1.3335C1.3335 10.209 3.16167 8.25011 5.41683 8.25011C5.82225 8.25011 6.21384 8.31343 6.5835 8.43131M7.75016 3.87475C7.75016 5.25557 6.70547 6.37495 5.41683 6.37495C4.12816 6.37495 3.0835 5.25557 3.0835 3.87475C3.0835 2.49392 4.12816 1.37454 5.41683 1.37454C6.70547 1.37454 7.75016 2.49392 7.75016 3.87475Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <span>Add Blog</span>
                    </button> -->
                    <button type="reset" class="w-max flex gap-3 items-center px-5 py-3 rounded-lg bg-transparent text-black text-lg tracking-wide hover:bg-slate-800 hover:text-white border-2 border-slate-800" type="reset" name="submit">
                        Reset form
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>