<?php require "../config/conn.php";?>

<?php
    session_start();
    include 'admin_scripts/login_check.php';
?>
<body>
    <div id="top" class="main">
        <div class="container">
            <div id="menu" class="left_side">
                <i  id="close" class="fa-solid fa-rectangle-xmark"></i>
                <img src="../images/white_logo.png" alt="logo">
                <a href="dashboard.php"><i class="fa-solid fa-gauge-high"></i> Dashboard</a>
                <a href="add_services.php"><i class="fa-solid fa-cart-plus"></i> Add Service</a>
                <a href="add_products.php"><i class="fa-solid fa-cart-plus"></i> Add Product</a>
                <a href="add_tutorials.php"><i class="fa-regular fa-newspaper"></i> Add blog</a>
                <a href="add_admin.php"><i class="fa-solid fa-user-plus"></i> Add Admin</a>
                <a href="edit_services.php"><i class="fa-regular fa-pen-to-square"></i> Edit Service</a>
                <a href="edit_products.php"><i class="fa-regular fa-pen-to-square"></i> Edit Product</a>
                <a href="edit_blog.php"><i class="fa-regular fa-pen-to-square"></i> Edit Blog</a>
                <a href="feedbacks.php"><i class="fa-solid fa-comment-dots"></i> Feedbacks</a>
                <a href="admin_scripts/logout_script.php"><i class="fa-solid fa-right-from-bracket"></i> Log out</a>
            </div>

            <div id="main_body" class="right_side">
                <div class="above">
                    <div class="above_left">
                        <a href="dashboard.php">dashboard</a>
                        <a href="feedbacks.php">Feedbacks</a>
                        <a href="add_products.php">Products</a>
                        <i id="open" class="fa-solid fa-bars"></i>
                    </div>

                    <span class="above_right">
                        <i id="not_i" class="fa-solid fa-bell"></i>
                        <!-- <a href="feedbacks.php"><i id="msg_i" class="fa-regular fa-envelope"></i></a> -->
                        <i id="msg_i" class="fa-regular fa-envelope"></i>
                        <i id="zoom" class="fa-solid fa-expand"></i>
                        <a href="admin_scripts/logout_script.php"><i class="fa-solid fa-right-from-bracket"></i></a>
                        <img src="../images/man.jpg" alt="">
                    </span>
                </div>
                <hr>

            <script src="admin_partials/admin_x.js"></script>
