<?php include '../config/conn.php' ?>
<!-- including the head -->
<?php include 'admin_partials/head.php' ?>
<title>Meya ADMIN Dashboard</title>
<link rel="stylesheet" href="admin_css/dashboard.css">
<link rel="stylesheet" href="admin_css/edit_product_table.css">
</head>

<body>
    <div class="dashboard-container">
        <!-- Header -->
        <div class="nav">
            <!-- including the header -->
            <div class="hidden md:block">
                <?php include 'admin_partials/Navbar_Desktop.php' ?>
            </div>
            <div class="md:hidden">
                <?php $page = 'dashboard';
                include 'admin_partials/Navbar_mobile.php' ?>
            </div>
        </div>
        <!-- Bottom container -->
        <div class="bottom-container">
            <!-- Sidebar -->
            <div class="sidebar">
                <?php $page = 'dashboard';
                include 'admin_partials/sidebar.php' ?>
            </div>
            <!-- Main Sidebar -->
            <div class="dashboard animate__slideOutUp">
                <!-- Header -->
                <div class="flex flex-col items-start">
                    <h2 class="text-3xl font-bold">Hey Amanuel</h2>
                    <p class="text-gray-400">here is what’s happening in your store</p>
                </div>

                <!-- Card Holder -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-3">
                    <!-- single card -->
                    <?php
                    $select_query = "select * from products";
                    $p = 0;
                    $res = mysqli_query($conn, $select_query) or die(mysqli_error($conn));
                    if (mysqli_num_rows($res) > 0) {
                        while ($row = mysqli_fetch_assoc($res)) {
                            $p++;
                        }
                    }
                    ?>


                    <div class="flex items-end justify-between text-white bg-purple-500 p-5 rounded-xl shadow-md">
                        <div class="flex flex-col">
                            <!-- icon -->
                            <div class="size-8 flex items-center justify-center p-2 bg-white rounded-full">
                                <svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M9.1358 0.844381C9.3623 0.71854 9.6377 0.71854 9.8642 0.844381L16.6134 4.59392C16.6191 4.59707 16.6247 4.60029 16.6303 4.6036C16.8594 4.73836 17 4.98426 17 5.25V12.75C17 13.0224 16.8523 13.2734 16.6142 13.4057L9.8642 17.1557C9.63433 17.2834 9.35443 17.2812 9.12665 17.1505L2.38577 13.4055C2.14767 13.2733 2 13.0223 2 12.7499V5.25C2 4.98426 2.14062 4.73828 2.36965 4.60352L2.38047 4.60338L2.38577 4.59438L9.1358 0.844381ZM9.50008 8.142L4.29442 5.24996L9.5 2.35797L14.7057 5.25L9.50008 8.142ZM3.5 6.52463V12.3086L8.75 15.2253V9.4413L3.5 6.52463ZM10.25 9.4413V15.2254L15.5 12.3087V6.52463L10.25 9.4413Z" fill="#826AF9" />
                                </svg>
                            </div>
                            <h2 class="font-bold text-md">Products</h2>
                            <p class="font-bold text-xl"><?php echo $p . " Products"; ?></p>
                        </div>
                        <button class="bg-green-100 text-green-500 rounded-full px-4 py-1 text-sm">39%</button>

                    </div>
                    <!-- 2nd -->
                    <?php
                    $select_query = "select * from feedback";
                    $f = 0;
                    $res = mysqli_query($conn, $select_query) or die(mysqli_error($conn));
                    if (mysqli_num_rows($res) > 0) {
                        while ($row = mysqli_fetch_assoc($res)) {
                            $f++;
                        }
                    }
                    ?>
                    <div class="flex items-end justify-between text-black bg-white p-5 rounded-xl shadow-md">
                        <div class="flex flex-col">
                            <!-- icon -->
                            <div class="size-8 flex items-center justify-center p-2 bg-purple-500 rounded-full">
                                <svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.25 1.5C6.53373 1.5 5.125 2.90893 5.125 4.62437C5.125 5.54987 5.53555 6.38571 6.18272 6.95967C3.73944 7.86425 2 10.3222 2 13.1669C2.00002 13.3878 2.08785 13.5997 2.24417 13.756C2.4005 13.9122 2.61251 14 2.83359 14H6.84346C7.00736 13.3945 7.26983 12.8313 7.61577 12.3338H3.73315C4.10182 9.99349 5.99707 8.25449 8.25 8.25449C8.56224 8.25449 8.86721 8.28901 9.1626 8.35278C9.26404 7.33484 9.98575 6.49067 10.9407 6.20498C11.2162 5.74032 11.375 5.1997 11.375 4.62437C11.375 2.90893 9.96627 1.5 8.25 1.5ZM8.25 3.16616C9.06475 3.16616 9.70781 3.80887 9.70781 4.62437C9.70781 5.43986 9.06475 6.08267 8.25 6.08267C7.43525 6.08267 6.79214 5.43986 6.79214 4.62437C6.79214 3.80887 7.43525 3.16616 8.25 3.16616Z" fill="white" />
                                    <path d="M12 6.5C10.627 6.5 9.5 7.62716 9.5 8.99951C9.5 9.73992 9.82843 10.4086 10.3462 10.8677C8.39154 11.5914 7 13.5577 7 15.8335C7.00002 16.0103 7.07028 16.1798 7.19534 16.3048C7.32039 16.4298 7.49 16.5 7.66686 16.5H12H16.3331C16.51 16.5 16.6796 16.4298 16.8047 16.3048C16.9297 16.1798 17 16.0103 17 15.8335C17 13.5578 15.6085 11.5914 13.6539 10.8677C14.1716 10.4086 14.5 9.73992 14.5 8.99951C14.5 7.62716 13.373 6.5 12 6.5ZM12 7.83294C12.6518 7.83294 13.1662 8.34712 13.1662 8.99951C13.1662 9.65191 12.6518 10.1661 12 10.1661C11.3482 10.1661 10.8337 9.65191 10.8337 8.99951C10.8337 8.34712 11.3482 7.83294 12 7.83294ZM12 11.9036C13.8023 11.9036 15.3185 13.2948 15.6135 15.1671H12H8.38652C8.68146 13.2948 10.1977 11.9036 12 11.9036Z" fill="white" />
                                </svg>

                            </div>
                            <h2 class="font-bold text-md">Feedbacks</h2>
                            <p class="font-bold text-xl"><?php echo $f . " Feedbacks" ?></p>
                        </div>
                        <button class="bg-green-100 text-green-500 rounded-full px-4 py-1 text-sm">39%</button>

                    </div>

                    <!-- 3rd -->
                    <?php
                    $select_query = "select * from services";
                    $s = 0;
                    $res = mysqli_query($conn, $select_query) or die(mysqli_error($conn));
                    if (mysqli_num_rows($res) > 0) {
                        while ($row = mysqli_fetch_assoc($res)) {
                            $s++;
                        }
                    }
                    ?>
                    <div class="flex items-end justify-between text-black bg-white p-5 rounded-xl shadow-md">
                        <div class="flex flex-col">
                            <!-- icon -->
                            <div class="size-8 flex items-center justify-center p-2 bg-purple-500 rounded-full">
                                <svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.25 1.5C6.53373 1.5 5.125 2.90893 5.125 4.62437C5.125 5.54987 5.53555 6.38571 6.18272 6.95967C3.73944 7.86425 2 10.3222 2 13.1669C2.00002 13.3878 2.08785 13.5997 2.24417 13.756C2.4005 13.9122 2.61251 14 2.83359 14H6.84346C7.00736 13.3945 7.26983 12.8313 7.61577 12.3338H3.73315C4.10182 9.99349 5.99707 8.25449 8.25 8.25449C8.56224 8.25449 8.86721 8.28901 9.1626 8.35278C9.26404 7.33484 9.98575 6.49067 10.9407 6.20498C11.2162 5.74032 11.375 5.1997 11.375 4.62437C11.375 2.90893 9.96627 1.5 8.25 1.5ZM8.25 3.16616C9.06475 3.16616 9.70781 3.80887 9.70781 4.62437C9.70781 5.43986 9.06475 6.08267 8.25 6.08267C7.43525 6.08267 6.79214 5.43986 6.79214 4.62437C6.79214 3.80887 7.43525 3.16616 8.25 3.16616Z" fill="white" />
                                    <path d="M12 6.5C10.627 6.5 9.5 7.62716 9.5 8.99951C9.5 9.73992 9.82843 10.4086 10.3462 10.8677C8.39154 11.5914 7 13.5577 7 15.8335C7.00002 16.0103 7.07028 16.1798 7.19534 16.3048C7.32039 16.4298 7.49 16.5 7.66686 16.5H12H16.3331C16.51 16.5 16.6796 16.4298 16.8047 16.3048C16.9297 16.1798 17 16.0103 17 15.8335C17 13.5578 15.6085 11.5914 13.6539 10.8677C14.1716 10.4086 14.5 9.73992 14.5 8.99951C14.5 7.62716 13.373 6.5 12 6.5ZM12 7.83294C12.6518 7.83294 13.1662 8.34712 13.1662 8.99951C13.1662 9.65191 12.6518 10.1661 12 10.1661C11.3482 10.1661 10.8337 9.65191 10.8337 8.99951C10.8337 8.34712 11.3482 7.83294 12 7.83294ZM12 11.9036C13.8023 11.9036 15.3185 13.2948 15.6135 15.1671H12H8.38652C8.68146 13.2948 10.1977 11.9036 12 11.9036Z" fill="white" />
                                </svg>

                            </div>
                            <h2 class="font-bold text-md">Services</h2>
                            <p class="font-bold text-xl"><?php echo $s . " Services" ?></p>
                        </div>
                        <button class="bg-red-100 text-red-500 rounded-full px-4 py-1 text-sm">39%</button>

                    </div>
                    <!-- 3rd -->
                    <?php
                    $select_query = "SELECT * FROM tutorials";
                    $t = 0;
                    $res = mysqli_query($conn, $select_query) or die(mysqli_error($conn));
                    if (mysqli_num_rows($res) > 0) {
                        while ($row = mysqli_fetch_assoc($res)) {
                            $t++;
                        }
                    }
                    ?>
                    <div class="flex items-end justify-between text-black bg-white p-5 rounded-xl shadow-md">
                        <div class="flex flex-col">
                            <!-- icon -->
                            <div class="size-8 flex items-center justify-center p-2 bg-purple-500 rounded-full">
                                <svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.25 1.5C6.53373 1.5 5.125 2.90893 5.125 4.62437C5.125 5.54987 5.53555 6.38571 6.18272 6.95967C3.73944 7.86425 2 10.3222 2 13.1669C2.00002 13.3878 2.08785 13.5997 2.24417 13.756C2.4005 13.9122 2.61251 14 2.83359 14H6.84346C7.00736 13.3945 7.26983 12.8313 7.61577 12.3338H3.73315C4.10182 9.99349 5.99707 8.25449 8.25 8.25449C8.56224 8.25449 8.86721 8.28901 9.1626 8.35278C9.26404 7.33484 9.98575 6.49067 10.9407 6.20498C11.2162 5.74032 11.375 5.1997 11.375 4.62437C11.375 2.90893 9.96627 1.5 8.25 1.5ZM8.25 3.16616C9.06475 3.16616 9.70781 3.80887 9.70781 4.62437C9.70781 5.43986 9.06475 6.08267 8.25 6.08267C7.43525 6.08267 6.79214 5.43986 6.79214 4.62437C6.79214 3.80887 7.43525 3.16616 8.25 3.16616Z" fill="white" />
                                    <path d="M12 6.5C10.627 6.5 9.5 7.62716 9.5 8.99951C9.5 9.73992 9.82843 10.4086 10.3462 10.8677C8.39154 11.5914 7 13.5577 7 15.8335C7.00002 16.0103 7.07028 16.1798 7.19534 16.3048C7.32039 16.4298 7.49 16.5 7.66686 16.5H12H16.3331C16.51 16.5 16.6796 16.4298 16.8047 16.3048C16.9297 16.1798 17 16.0103 17 15.8335C17 13.5578 15.6085 11.5914 13.6539 10.8677C14.1716 10.4086 14.5 9.73992 14.5 8.99951C14.5 7.62716 13.373 6.5 12 6.5ZM12 7.83294C12.6518 7.83294 13.1662 8.34712 13.1662 8.99951C13.1662 9.65191 12.6518 10.1661 12 10.1661C11.3482 10.1661 10.8337 9.65191 10.8337 8.99951C10.8337 8.34712 11.3482 7.83294 12 7.83294ZM12 11.9036C13.8023 11.9036 15.3185 13.2948 15.6135 15.1671H12H8.38652C8.68146 13.2948 10.1977 11.9036 12 11.9036Z" fill="white" />
                                </svg>

                            </div>
                            <h2 class="font-bold text-md">Blogs</h2>
                            <p class="font-bold text-xl"><?php echo $t . " Blogs" ?></p>
                        </div>
                        <button class="bg-red-100 text-red-500 rounded-full px-4 py-1 text-sm">39%</button>

                    </div>
                </div>

                <!-- Sales report and Top product container -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <!-- Sales report -->
                    <div class="bg-white p-5 rounded-lg">
                        <h2 class="font-bold text-xl">Sales Report</h2>
                        <hr class="my-2">
                        <img class="w-full h-[300px]" src="../images/dashboard-chart.svg" alt="">
                    </div>

                    <!-- View Counter -->
                    <div class="h-full bg-white p-5 rounded-lg ">
                        <?php $count = 0; ?>
                        <h2 class="font-bold text-xl">Viewer Count</h2>
                        <hr class="my-2">

                        <div class="h-[90%] grid grid-cols-1 lg:grid-cols-2 gap-3 overflow-hidden hover:overflow-y-scroll">
                            <!-- Hompage Viewer count -->
                            <div class="h-content w-full flex flex-col p-3 bg-purple-500 text-white rounded-lg shadow-md">
                                <!-- Top Product -->
                                <div class="flex flex-col justify-between md:items-center md:flex-row">
                                    <!-- Visit count code -->
                                    <?php
                                    $select_query = "SELECT visit_count FROM visit";
                                    $res = mysqli_query($conn, $select_query) or die(mysqli_error($conn));
                                    if (mysqli_num_rows($res) > 0) {
                                        $row = mysqli_fetch_assoc($res);
                                        $count = $row['visit_count'];
                                        echo "<h2 class='text-lg font-bold'>Home Page</h2>";
                                        echo "<p class='text-md font-semibold'>" . $count . " Visitors" . "</p>";
                                    }
                                    ?>
                                </div>
                                <hr class="border-dashed my-2">
                                <div class="flex flex-col gap-3">
                                    <div class="flex flex-col justify-between md:items-center md:flex-row">
                                        <p class="font-bold">Path</p>
                                        <p class="">Meya-Store/index.php</p>
                                    </div>
                                    <div class="flex flex-col justify-between md:items-center md:flex-row">
                                        <p class="font-bold">Visitor Count</p>
                                        <p class=""><?php echo $count; ?> Visitor</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Laptop Page Viewer count -->
                            <div class="h-content w-full flex flex-col p-3 bg-purple-500 text-white rounded-lg shadow-md">
                                <!-- Top Product -->
                                <div class="flex flex-col justify-between md:items-center md:flex-row">
                                    <!-- Visit count code -->
                                    <?php
                                    $select_query = "SELECT laptop_visit_count FROM visit";
                                    $res = mysqli_query($conn, $select_query) or die(mysqli_error($conn));
                                    if (mysqli_num_rows($res) > 0) {
                                        $row = mysqli_fetch_assoc($res);
                                        $count = $row['laptop_visit_count'];
                                        echo "<h2 class='text-lg font-bold'>Laptop Page</h2>";
                                        echo "<p class='text-md font-semibold'>" . $count . " Visitors" . "</p>";
                                    }
                                    ?>
                                </div>
                                <hr class="border-dashed my-2">
                                <div class="flex flex-col gap-3">
                                    <div class="flex flex-col justify-between md:items-center md:flex-row">
                                        <p class="font-bold">Path</p>
                                        <p class="">Meya-Store/index.php</p>
                                    </div>
                                    <div class="flex flex-col justify-between md:items-center md:flex-row">
                                        <p class="font-bold">Visitor Count</p>
                                        <p class=""><?php echo $count; ?> Visitor</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Desktop Page Viewer count -->
                            <div class="h-content w-full flex flex-col p-3 bg-purple-500 text-white rounded-lg shadow-md">
                                <!-- Top Product -->
                                <div class="flex flex-col justify-between md:items-center md:flex-row">
                                    <!-- Visit count code -->
                                    <?php
                                    $select_query = "SELECT desktop_visit_count FROM visit";
                                    $res = mysqli_query($conn, $select_query) or die(mysqli_error($conn));
                                    if (mysqli_num_rows($res) > 0) {
                                        $row = mysqli_fetch_assoc($res);
                                        $count = $row['desktop_visit_count'];
                                        echo "<h2 class='text-lg font-bold'>Desktop Page</h2>";
                                        echo "<p class='text-md font-semibold'>" . $count . " Visitors" . "</p>";
                                    }
                                    ?>
                                </div>
                                <hr class="border-dashed my-2">
                                <div class="flex flex-col gap-3">
                                    <div class="flex flex-col justify-between md:items-center md:flex-row">
                                        <p class="font-bold">Path</p>
                                        <p class="">Meya-Store/index.php</p>
                                    </div>
                                    <div class="flex flex-col justify-between md:items-center md:flex-row">
                                        <p class="font-bold">Visitor Count</p>
                                        <p class=""><?php echo $count; ?> Visitor</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Mobile Page Viewer count -->
                            <div class="h-content w-full flex flex-col p-3 bg-purple-500 text-white rounded-lg shadow-md">
                                <!-- Top Product -->
                                <div class="flex flex-col justify-between md:items-center md:flex-row">
                                    <!-- Visit count code -->
                                    <?php
                                    $select_query = "SELECT mobile_visit_count FROM visit";
                                    $res = mysqli_query($conn, $select_query) or die(mysqli_error($conn));
                                    if (mysqli_num_rows($res) > 0) {
                                        $row = mysqli_fetch_assoc($res);
                                        $count = $row['mobile_visit_count'];
                                        echo "<h2 class='text-lg font-bold'>Mobile Page</h2>";
                                        echo "<p class='text-md font-semibold'>" . $count . " Visitors" . "</p>";
                                    }
                                    ?>
                                </div>
                                <hr class="border-dashed my-2">
                                <div class="flex flex-col gap-3">
                                    <div class="flex flex-col justify-between md:items-center md:flex-row">
                                        <p class="font-bold">Path</p>
                                        <p class="">Meya-Store/index.php</p>
                                    </div>
                                    <div class="flex flex-col justify-between md:items-center md:flex-row">
                                        <p class="font-bold">Visitor Count</p>
                                        <p class=""><?php echo $count; ?> Visitor</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Mobile Page Viewer count -->
                            <div class="h-content w-full flex flex-col p-3 bg-purple-500 text-white rounded-lg shadow-md">
                                <!-- Top Product -->
                                <div class="flex flex-col justify-between md:items-center md:flex-row">
                                    <!-- Visit count code -->
                                    <?php
                                    $select_query = "SELECT mobile_visit_count FROM visit";
                                    $res = mysqli_query($conn, $select_query) or die(mysqli_error($conn));
                                    if (mysqli_num_rows($res) > 0) {
                                        $row = mysqli_fetch_assoc($res);
                                        $count = $row['mobile_visit_count'];
                                        echo "<h2 class='text-lg font-bold'>Mobile Page</h2>";
                                        echo "<p class='text-md font-semibold'>" . $count . " Visitors" . "</p>";
                                    }
                                    ?>
                                </div>
                                <hr class="border-dashed my-2">
                                <div class="flex flex-col gap-3">
                                    <div class="flex flex-col justify-between md:items-center md:flex-row">
                                        <p class="font-bold">Path</p>
                                        <p class="">Meya-Store/index.php</p>
                                    </div>
                                    <div class="flex flex-col justify-between md:items-center md:flex-row">
                                        <p class="font-bold">Visitor Count</p>
                                        <p class=""><?php echo $count; ?> Visitor</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Customer Table -->
                <div class="grid grid-cols-1 w-full ">
                    <div class="bg-white p-5 rounded-lg">
                        <h2 class=" font-bold text-xl">Products Table</h2>
                        <hr class="my-2">
                        <div class="">
                            <?php
                            // Below is optional, remove if you have already connected to your database.
                            $mysqli = mysqli_connect('localhost', 'root', '', 'meya37mj_meya372com_meya372');

                            // Get the total number of records from our table "students".
                            $total_pages = $mysqli->query('SELECT * FROM products')->num_rows;

                            // Check if the page number is specified and check if it's a number, if not return the default page number which is 1.
                            $page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;

                            // Number of results to show on each page.
                            $num_results_on_page = 5;


                            if ($stmt = $mysqli->prepare('SELECT * FROM products ORDER BY id LIMIT ?,?')) {
                                // Calculate the page to get the results we need from our table.
                                $calc_page = ($page - 1) * $num_results_on_page;
                                $stmt->bind_param('ii', $calc_page, $num_results_on_page);
                                $stmt->execute();
                                // Get the results...
                                $result = $stmt->get_result();
                            ?>
                                <div class="limiter">
                                    <div class="container-table100">
                                        <div class="wrap-table100">
                                            <div class="table100">
                                                <table>
                                                    <thead>
                                                        <tr class="table100-head">
                                                            <th class="column1">ID</th>
                                                            <th class="column2">Name</th>
                                                            <th class="column2">Price</th>
                                                            <th class="column2">Catagory</th>
                                                            <th class="column3">Description</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <!-- Table rows -->
                                                        <?php while ($row = $result->fetch_assoc()) : ?>
                                                            <tr>
                                                                <td><?php echo $row['id']; ?></td>
                                                                <td><?php echo $row['p_name']; ?></td>
                                                                <td><?php echo $row['price'] ?></td>
                                                                <td><?php echo $row['category'] ?></td>
                                                                <td class="text-ellipsis"><?php echo substr($row['discription'], 0, 60) ?></td>
                                                            </tr>
                                                        <?php endwhile; ?>
                                                    </tbody>
                                                </table>

                                                <!-- Pagination code -->

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                                $stmt->close();
                            }
                            ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>