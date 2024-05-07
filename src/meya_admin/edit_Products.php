<!-- including the head -->
<?php include 'admin_partials/head.php' ?>

<title>Edit Products</title>
<link rel="stylesheet" href="admin_css/style.css">
<!-- <link rel="stylesheet" href="admin_css/add_service.css"> -->
<link rel="stylesheet" href="admin_css/dashboard.css">
<link rel="stylesheet" href="admin_css/edit_product_table.css">

</head>

<div class="dashboard-container ">
    <!-- Header -->
    <div class="nav">
        <!-- including the header -->
        <div class="hidden md:block">
            <?php include 'admin_partials/Navbar_Desktop.php' ?>
        </div>
        <div class="md:hidden">
            <?php $page = 'edit-product';
            include 'admin_partials/Navbar_mobile.php' ?>
        </div>
    </div>
    <!-- Bottom container -->
    <div class="bottom-container">
        <!-- Sidebar -->
        <div class="sidebar">
            <?php $page = 'edit-product';
            include 'admin_partials/sidebar.php' ?>
        </div>
        <!-- Main Sidebar -->
        <div class="dashboard">
            <!-- Header -->
            <div class="flex flex-col items-start">
                <h2 class="text-3xl font-bold">Edit Products</h2>
                <p class="text-gray-400">Edit existing products on the Meya store</p>
                <hr class="my-2">
            </div>

            <div class="">
                <?php
                // Below is optional, remove if you have already connected to your database.
                $mysqli = mysqli_connect('localhost', 'root', '', 'meya372com_meya372');

                // Get the total number of records from our table "students".
                $total_pages = $mysqli->query('SELECT * FROM products')->num_rows;

                // Check if the page number is specified and check if it's a number, if not return the default page number which is 1.
                $page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;

                // Number of results to show on each page.
                $num_results_on_page = 5;


                if ($stmt = $mysqli->prepare('SELECT * FROM products ORDER BY created_at ASC LIMIT ?,?')) {
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
                                                <th class="column4">Image</th>
                                                <th class="column5"></th>
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
                                                    <td><img src="<?php echo $row['img_url'] ?>" alt=""></td>
                                                    <td class="flex gap-3 items-center">
                                                        <a href="edit_products_byid.php?id=<?php echo $row['id'] ?>" class="btn btn-edit text-center">
                                                            <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M14.4143 4.14955L7.77674 11.2742C7.11576 11.9837 5.15369 12.3123 4.71536 11.8418C4.27703 11.3713 4.57621 9.26527 5.23718 8.55578L11.8817 1.42361C12.0456 1.23172 12.2439 1.07748 12.4649 0.970156C12.6858 0.862837 12.9247 0.80466 13.1672 0.799178C13.4096 0.793704 13.6506 0.841008 13.8756 0.938252C14.1005 1.0355 14.3048 1.18068 14.476 1.365C14.6472 1.54931 14.7819 1.76895 14.8719 2.01067C14.9619 2.2524 15.0054 2.51117 14.9996 2.7714C14.9938 3.03163 14.9389 3.28794 14.8384 3.52479C14.7378 3.76165 14.5935 3.97419 14.4143 4.14955Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                                <path d="M7.26186 2.35713H3.78305C3.04493 2.35713 2.3371 2.67186 1.81518 3.23209C1.29326 3.79232 1 4.55215 1 5.34443V12.8127C1 13.605 1.29326 14.3648 1.81518 14.925C2.3371 15.4853 3.04493 15.8 3.78305 15.8H11.4364C12.9741 15.8 13.5237 14.4557 13.5237 12.8127V9.07856" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                            </svg>

                                                            <span>edit</span></a>
                                                        <button class="btn btn-delete"><a href="admin_scripts/delete_product.php?id=<?php echo $row['id'] ?>">delete</a></button>
                                                    </td>
                                                </tr>
                                            <?php endwhile; ?>
                                        </tbody>
                                    </table>

                                    <!-- Pagination code -->
                                    <div class="my-5">
                                        <?php if (ceil($total_pages / $num_results_on_page) > 0) : ?>
                                            <ul class="pagination">
                                                <?php if ($page > 1) : ?>
                                                    <li class="prev"><a href="edit_Products.php?page=<?php echo $page - 1 ?>">Prev</a></li>
                                                <?php endif; ?>

                                                <?php if ($page > 3) : ?>
                                                    <li class="start"><a href="edit_Products.php?page=1">1</a></li>
                                                    <li class="dots">...</li>
                                                <?php endif; ?>

                                                <?php if ($page - 2 > 0) : ?><li class="page"><a href="edit_Products.php?page=<?php echo $page - 2 ?>"><?php echo $page - 2 ?></a></li><?php endif; ?>
                                                <?php if ($page - 1 > 0) : ?><li class="page"><a href="edit_Products.php?page=<?php echo $page - 1 ?>"><?php echo $page - 1 ?></a></li><?php endif; ?>

                                                <li class="currentpage"><a href="edit_Products.php?page=<?php echo $page ?>"><?php echo $page ?></a></li>

                                                <?php if ($page + 1 < ceil($total_pages / $num_results_on_page) + 1) : ?><li class="page"><a href="edit_Products.php?page=<?php echo $page + 1 ?>"><?php echo $page + 1 ?></a></li><?php endif; ?>
                                                <?php if ($page + 2 < ceil($total_pages / $num_results_on_page) + 1) : ?><li class="page"><a href="edit_Products.php?page=<?php echo $page + 2 ?>"><?php echo $page + 2 ?></a></li><?php endif; ?>

                                                <?php if ($page < ceil($total_pages / $num_results_on_page) - 2) : ?>
                                                    <li class="dots">...</li>
                                                    <li class="end"><a href="edit_Products.php?page=<?php echo ceil($total_pages / $num_results_on_page) ?>"><?php echo ceil($total_pages / $num_results_on_page) ?></a></li>
                                                <?php endif; ?>

                                                <?php if ($page < ceil($total_pages / $num_results_on_page)) : ?>
                                                    <li class="next"><a href="edit_Products.php?page=<?php echo $page + 1 ?>">Next</a></li>
                                                <?php endif; ?>
                                            </ul>
                                        <?php endif; ?>
                                    </div>
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