<!-- including the head -->
<?php include('partials/head.php') ?>
<?php
//recieving the typped word in search box
$search_word = mysqli_real_escape_string($conn, $_POST['search_word']);
?>

<title><?php echo $search_word; ?></title>
<link rel="stylesheet" href="css/nav.css">
<link rel="stylesheet" href="css/products.css">
</head>

<body>

    <div class="p_container">
        <?php include('partials/header.php') ?>

        <div class="my-20 mx-10">
            <h1 class="mt-[7rem] mb-3 ml-3 text-3xl font-bold">Avaliable <?php echo $search_word; ?>s (Used)</h1>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-3 p-3">

                <?php
                $select_query = "SELECT * FROM products WHERE p_name LIKE '%$search_word%' OR category LIKE '%$search_word%' OR discription LIKE '%$search_word%'";
                $res = mysqli_query($conn, $select_query) or die(mysqli_error($conn));
                if (mysqli_num_rows($res) > 0) {
                    while ($row = mysqli_fetch_assoc($res)) {
                ?>
                        <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                            <a href="#">
                                <img class="rounded-t-lg" src="meya_admin/products/<?php echo $row['img_url'] ?>" alt="" />
                            </a>
                            <div class="p-5">
                                <a href="#">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><?php echo $row['p_name']; ?></h5>
                                </a>

                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"><?php echo substr($row['discription'], 0,50) . " ..." ?></p>
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
                } else {
                    echo "<div class='flex items-center justify-center text-3xl text-red-500 font-bold text-center my-10'> No results found by the name  " . $search_word . "</div>";
                }
                ?>
            </div>
        </div>
    </div>

    <footer>
        <p> &#169;<?php echo date("Y") ?> Copyright. All rights reserved. Meya372 </p>
    </footer>

</body>

</html>