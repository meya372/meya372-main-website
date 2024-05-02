<!-- including the head -->
<?php include('partials/head.php') ?>
<?php
if (isset($_GET['prod_type'])) {
    $prod_type = $_GET['prod_type'];
?>

    <title><?php echo $prod_type; ?></title>
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/products.css">
    </head>

    <body>

        <div class="p_container">
            <?php include('partials/header.php') ?>

            <div class="my-20 mx-2 md:mx-10 ">
                <h1 class="mt-[7rem] mb-3 ml-3 text-3xl font-bold">Avaliable <?php echo $prod_type; ?>s (Used)</h1>
                <!-- add product title class to the div  -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-3 p-3">
                    <!-- add container class to the div -->
                    <?php
                    $select_query = "select * from products where category = '" . $prod_type . "'";
                    $res = mysqli_query($conn, $select_query) or die(mysqli_error($conn));
                    if (mysqli_num_rows($res)  > 0) {
                        while ($row = mysqli_fetch_assoc($res)) {
                    ?>

                            <!-- <div class="prod">
                                <img src="meya_admin/products/<?php echo $row['img_url'] ?>" alt="">
                                <h3><?php echo $row['p_name']; ?></h3>
                                <p><span id="birr"> <?php echo $row['price']; ?></span> Birr</p>
                                <p id="p_disc"><?php echo $row['discription']; ?></p>
                                <a class="contact_us" href="product_detail.php?p_id=<?php echo $row['id']; ?>">See detail</a>
                            </div> -->

                            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 overflow-hidden">
                                <a href="#">
                                    <img class="rounded-t-lg w-full max-h-[220px] object-cover" src="meya_admin/products/<?php echo $row['img_url'] ?>" alt="" />
                                </a>
                                <div class="p-5">
                                    <a href="#">
                                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><?php echo $row['p_name']; ?></h5>
                                    </a>

                                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 truncate"><?php echo $row['discription']; ?></p>
                                    <a href="#" class="mb-3">
                                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><?php echo $row['price']; ?> Birr</h5>
                                    </a>
                                    <a href="product_detail.php?p_id=<?php echo $row['id']; ?>" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        See Detail
                                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                        </svg>
                                    </a>
                                </div>
                            </div>


                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>

    <?php
} else {
    echo "select products' catagory(built in error message).";
}
    ?>

    <!-- =========== Footer Section ======================= -->

    <?php include("main_footer.php") ?>

    <!-- Old footer code -->

    <!-- <footer>
        <p> &#169;<?php echo date("Y") ?> Copyright. All rights reserved. Meya372 </p>
    </footer> -->

    </body>

    </html>