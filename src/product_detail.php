<!-- including the head -->
<?php include('partials/head.php') ?>
<?php
if (isset($_GET['p_id'])) {
    $p_id = $_GET['p_id'];

    $select_query = "select * from products where id = '" . $p_id . "'";
    $res = mysqli_query($conn, $select_query) or die(mysqli_error($conn));
    if (mysqli_num_rows($res) > 0) {
        $row = mysqli_fetch_assoc($res);
        $prod_type = $row['category'];
    }
}
?>


<title><?php echo $row['p_name']; ?></title>
<link rel="stylesheet" href="css/nav.css">
<link rel="stylesheet" href="css/productdetail.css">
</head>

<body>
    <div class="flex flex-col gap-5">
        <!-- including the header -->
        <?php include('partials/header.php') ?>

        <!-- ===== the old Product Detail Display ============ -->
        <!-- <div class="product">
            <div class="p_img">
                <img src="meya_admin/products/<?php echo $row['img_url'] ?>" alt="">
            </div>
            <div class="p_detail">
                <h1><?php echo $row['p_name']; ?></h1>
                <p>Price: <span id="birr"> <?php echo $row['price']; ?> Birr</span></p>
                <p><?php echo $row['discription']; ?></p>
                <a class="contact_us">Buy now</a>
            </div>
        </div> -->

        <!-- ===== the new Product Detail Display ============ -->
        <div class=" flex flex-col mx-3 md:mx-14 mt-24 md:flex-row items-center md:items-center justify-between ">
            <div class="p_img">
                <img src="meya_admin/products/<?php echo $row['img_url'] ?>" alt="">
            </div>

            <div class="p_detail flex flex-col gap-5 p-5 items-start">
                <div class="flex flex-col item-center justify-between">
                    <h1 class="text-4xl font-bold"><?php echo $row['p_name']; ?></h1>
                    <p class=""><span id="birr"> <?php echo $row['price']; ?> Birr</span></p>
                </div>

                <p class="text-lg"><?php echo $row['discription']; ?></p>

                <div class="flex gap-2 items-center">
                    <a href="tel:0912929394" target="_blank" class="w-max inline-flex items-center px-5 py-3 text-sm font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                        <span>Call Now</span>
                        <svg class="size-6 ms-2" viewBox="0 0 24.00 24.00" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff" stroke-width="0.00024000000000000003">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M17.3545 22.2323C15.3344 21.7262 11.1989 20.2993 7.44976 16.5502C3.70065 12.8011 2.2738 8.66559 1.76767 6.6455C1.47681 5.48459 2.00058 4.36434 2.88869 3.72997L5.21694 2.06693C6.57922 1.09388 8.47432 1.42407 9.42724 2.80051L10.893 4.91776C11.5152 5.8165 11.3006 7.0483 10.4111 7.68365L9.24234 8.51849C9.41923 9.1951 9.96939 10.5846 11.6924 12.3076C13.4154 14.0306 14.8049 14.5807 15.4815 14.7576L16.3163 13.5888C16.9517 12.6994 18.1835 12.4847 19.0822 13.1069L21.1995 14.5727C22.5759 15.5257 22.9061 17.4207 21.933 18.783L20.27 21.1113C19.6356 21.9994 18.5154 22.5232 17.3545 22.2323ZM8.86397 15.136C12.2734 18.5454 16.0358 19.8401 17.8405 20.2923C18.1043 20.3583 18.4232 20.2558 18.6425 19.9488L20.3056 17.6205C20.6299 17.1665 20.5199 16.5348 20.061 16.2171L17.9438 14.7513L17.0479 16.0056C16.6818 16.5182 16.0047 16.9202 15.2163 16.7501C14.2323 16.5378 12.4133 15.8569 10.2782 13.7218C8.1431 11.5867 7.46219 9.7677 7.24987 8.7837C7.07977 7.9953 7.48181 7.31821 7.99439 6.95208L9.24864 6.05618L7.78285 3.93893C7.46521 3.48011 6.83351 3.37005 6.37942 3.6944L4.05117 5.35744C3.74413 5.57675 3.64162 5.89565 3.70771 6.15943C4.15989 7.96418 5.45459 11.7266 8.86397 15.136Z" fill="#ffffff"></path>
                            </g>
                        </svg>
                    </a>
                    <a href="https://t.me/meya372" target="_blank" class="w-max inline-flex items-center px-5 py-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <span>Telegram</span>
                        <svg class="size-6 ms-2" viewBox="-4.8 -4.8 57.60 57.60" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff" stroke-width="0.00048000000000000007" transform="rotate(0)">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" stroke="#CCCCCC" stroke-width="0.4800000000000001"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path d="M41.4193 7.30899C41.4193 7.30899 45.3046 5.79399 44.9808 9.47328C44.8729 10.9883 43.9016 16.2908 43.1461 22.0262L40.5559 39.0159C40.5559 39.0159 40.3401 41.5048 38.3974 41.9377C36.4547 42.3705 33.5408 40.4227 33.0011 39.9898C32.5694 39.6652 24.9068 34.7955 22.2086 32.4148C21.4531 31.7655 20.5897 30.4669 22.3165 28.9519L33.6487 18.1305C34.9438 16.8319 36.2389 13.8019 30.8426 17.4812L15.7331 27.7616C15.7331 27.7616 14.0063 28.8437 10.7686 27.8698L3.75342 25.7055C3.75342 25.7055 1.16321 24.0823 5.58815 22.459C16.3807 17.3729 29.6555 12.1786 41.4193 7.30899Z" fill="#ffffff"></path>
                            </g>
                        </svg>
                    </a>
                </div>


            </div>
        </div>

        <hr>
        <!-- ========== Featured product section ===================== -->
        <div class="mx-3 md:mx-14 my-5">
            <h2 class="text-4xl font-bold">Featured Product</h2>
        </div>

        <div class="flex flex-nowrap items-center gap-3 mx-3 md:mx-14 overflow-x-scroll">

            <?php
            $select_query2 = "SELECT * from products where category = '" . $prod_type . "' limit 4";
            $res2 = mysqli_query($conn, $select_query2) or die(mysqli_error($conn));
            if (mysqli_num_rows($res2) > 0) {
                while ($row2 = mysqli_fetch_assoc($res2)) {
            ?>

                    <!-- the old product display -->
                    <!-- <div class="prod">
                        <img src="meya_admin/products/<?php echo $row2['img_url'] ?>" alt="">
                        <p><?php echo $row2['p_name']; ?></p>
                        <p><span id="birr"> <?php echo $row2['price']; ?></span> Birr</p>
                        <p class="p_desc"><?php echo $row2['discription']; ?></p>
                        <a class="see_detail" href="product_detail.php?p_id=<?php echo $row2['id']; ?>">see detail</a>
                    </div> -->

                    <!-- the new product display -->
                    <div class="bg-white max-w-[250px] border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 ">
                        <a href="#">
                            <img class="rounded-t-lg max-h-[150px] mx-auto object-cover" src="meya_admin/products/<?php echo $row['img_url'] ?>" alt="" />
                        </a>
                        <div class="p-3">
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


        <!-- =========== Footer Section ======================= -->

        <?php include("main_footer.php") ?>
        <!-- old footer code -->

        <!-- <footer>
            <p> &#169;<?php echo date("Y") ?> Copyright. All rights reserved. Meya372 </p>
        </footer> -->
    </div>
</body>

</html>