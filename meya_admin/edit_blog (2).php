<!-- including the head -->
<?php include 'admin_partials/head.php' ?>

    <title>Edit Blog</title>
    <link rel="icon" type="image/x-icon" href="../images/fav.png">
    <script src="https://kit.fontawesome.com/b3507588bd.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="admin_css/style.css">
    <link rel="stylesheet" href="admin_css/dashboard.css">

<style>
    .btn {
        display: flex;
        align-items: center;
        gap: 0.3em;
        cursor: pointer;
        padding: 0.6em 1.2em;
        color: white;
        border: none;
        border-radius: 0.5em;
        font-size: 1.2em;
        text-transform: capitalize;
        font-family: 'Inter Tight', sans-serif;
        box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.25);
        transition: all 0.2s ease-in;
    }

    .btn-edit {
        background-color: #9747ff;
    }

    .btn-edit:hover {
        background-color: #7827e1;
        box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.25);
    }

    .btn-delete {
        background-color: #cf1414;
    }

    .btn-delete:hover {
        background-color: #b02d2d;
        box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.25);
    }
</style>
</head>


<div class="dashboard-container ">
    <!-- Header -->
    <div class="nav">
        <!-- including the header -->
        <div class="hidden md:block">
            <?php include 'admin_partials/Navbar_Desktop.php' ?>
        </div>
        <div class="md:hidden">
            <?php $page = 'edit-blog';
            include 'admin_partials/Navbar_mobile.php' ?>
        </div>
    </div>
    <!-- Bottom container -->
    <div class="bottom-container">
        <!-- Sidebar -->
        <div class="sidebar">
            <?php $page = 'edit-blog';
            include 'admin_partials/sidebar.php' ?>
        </div>
        <!-- Main Sidebar -->
        <div class="dashboard">
            <!-- Header -->
            <div class="flex flex-col items-start">
                <h2 class="text-3xl font-bold">Edit Blog</h2>
                <p class="text-gray-400">Edit existing Blog on the Meya store</p>
                <hr class="my-2">
            </div>

            <div class="flex flex-col gap-5">
                <?php

                $select_query = "SELECT * FROM tutorials ORDER BY created_at DESC";
                $res = mysqli_query($conn, $select_query) or die(mysqli_error($conn));
                if (mysqli_num_rows($res) > 0) {
                    while ($row = mysqli_fetch_assoc($res)) {
                ?>
                        <div class="bg-white flex flex-col gap-5 rounded-lg p-5 shadow-sm">
                            <div class="flex flex-col gap-3">
                                <h2 class="text-lg font-bold text-purple-500"><?php echo $row['title']; ?></h2>
                                <p><?php echo substr($row['article'], 0, 370) ?></p>
                            </div>
                            <div class="flex gap-3 items-center">
                                <a href="edit_blog_byid.php?id=<?php echo $row['id'] ?>" class="btn btn-edit text-center">
                                    <svg width="18" height="20" viewBox="0 0 14 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12.6 0.49939H1.4C0.6279 0.49939 0 1.18013 0 2.0172V11.124C0 11.9611 0.6279 12.6418 1.4 12.6418H3.5V15.5006L7.8939 12.6418H12.6C13.3721 12.6418 14 11.9611 14 11.124V2.0172C14 1.18013 13.3721 0.49939 12.6 0.49939ZM12.6 11.124H7.5061L4.9 12.8187V11.124H1.4V2.0172H12.6V11.124Z" fill="white" />
                                        <path d="M8.26182 5.95515L7.28252 4.8942L4.57422 7.8266V8.88831H5.55352L8.26182 5.95515ZM8.49072 3.58509L9.46932 4.6468L8.72312 5.45579L7.74382 4.39484L8.49072 3.58509Z" fill="white" />
                                    </svg>
                                    <span>edit</span>
                                </a>
                                <button class="btn btn-delete"><a href="admin_scripts/sc_delete_blog.php?id=<?php echo $row['id'] ?>">Delete</a></button>
                            </div>

                        </div>
                <?php
                    }
                }
                ?>

                <!-- <?php
                        $select_query = "select * from feedback";
                        $res = mysqli_query($conn, $select_query) or die(mysqli_error($conn));
                        if (mysqli_num_rows($res) > 0) {
                            while ($row = mysqli_fetch_assoc($res)) {
                        ?>

                <?php
                            }
                        }
                ?> -->
            </div>


        </div>
    </div>
</div>