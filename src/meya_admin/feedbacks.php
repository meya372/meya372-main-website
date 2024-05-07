<!-- including the head -->
<?php include 'admin_partials/head.php' ?>

<title>Feedbacks</title>
<link rel="icon" type="image/x-icon" href="../images/fav.png">
<script src="https://kit.fontawesome.com/b3507588bd.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="admin_css/style.css">
<!-- <link rel="stylesheet" href="admin_css/add_service.css"> -->
<link rel="stylesheet" href="admin_css/dashboard.css">

</head>



<div class="dashboard-container ">
    <!-- Header -->
    <div class="nav">
        <!-- including the header -->
        <div class="hidden md:block">
            <?php include 'admin_partials/Navbar_Desktop.php' ?>
        </div>
        <div class="md:hidden">
            <!-- TODO MUST READ $page comes from sidebar.php and Navbar_mobile.php -->
            <?php $page = 'feedback';
            include 'admin_partials/Navbar_mobile.php' ?>
        </div>
    </div>
    <!-- Bottom container -->
    <div class="bottom-container">
        <!-- Sidebar -->
        <div class="sidebar">
            <?php $page = 'feedback';
            include 'admin_partials/sidebar.php' ?>
        </div>
        <!-- Main Sidebar -->
        <div class="dashboard">
            <!-- Header -->
            <div class="flex flex-col items-start">
                <h2 class="text-3xl font-bold">Feedbacks</h2>
                <p class="text-gray-400">Create a new product for the Meya store</p>
                <hr class="my-2">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <?php
                $select_query = "SELECT * FROM feedback ORDER BY created_at DESC";
                $res = mysqli_query($conn, $select_query) or die(mysqli_error($conn));
                if (mysqli_num_rows($res) > 0) {
                    while ($row = mysqli_fetch_assoc($res)) {
                ?>
                        <div class="bg-white flex flex-col gap-3 rounded-md p-5 shadow-md">
                            <div class="flex items-center justify-between gap-3">
                                <h2 class="text-lg font-bold text-purple-500"><?php echo $row['u_name']; ?></h2>
                                <p class="text-sm text-gray-400"><?php echo $row['email']; ?></p>
                            </div>
                            <p><?php echo $row['feedback']; ?></p>
                        </div>
                <?php
                    }
                }
                ?>
            </div>


        </div>
    </div>
</div>