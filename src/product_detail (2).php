<!-- ========================== PHP Code ================================== -->
<?php
$phoneNumber = "0917929394";
// Start the PHP session
session_start();

// Define a session variable to store a unique identifier
$user_id = session_id();

// Database connection details (replace with your actual details)
$servername = "localhost";
$username = "meya372com372";
$password = "P6xUbliG4cW7tE1";
$dbname = "meya372com_meya372";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// include "./config/conn.php";

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Define table and column names
// Define table and column names
$table = "visit";
$count_column = "products_only_count";

// Lock the table row for exclusive access during update (optional)
// mysqli_query($conn, "LOCK TABLE $table IN LOW_PRIORITY MODE"); 

// Select the current visit count
$sql_select = "SELECT $count_column FROM $table LIMIT 1";
$result_select = mysqli_query($conn, $sql_select);

// If a record exists, update the count
if (mysqli_num_rows($result_select) > 0) {
    $row = mysqli_fetch_assoc($result_select);
    $current_count = $row[$count_column];

    $sql_update = "UPDATE $table SET $count_column = $current_count + 1";

    if (mysqli_query($conn, $sql_update)) {
        // echo "Visit count updated successfully! Your current visit count is: " . ($current_count + 1);
    } else {
        // echo "Error updating visit count: " . mysqli_error($conn);
    }
} else {
    // If record doesn't exist, create it with a count of 1
    $sql_insert = "INSERT INTO $table ($count_column) VALUES (1)";

    if (mysqli_query($conn, $sql_insert)) {
        echo "Visit record created. Visit count is: 1";
    } else {
        echo "Error creating visit record: " . mysqli_error($conn);
    }
}
?>

<!-- ========================== END OF PHP Code ================================== -->





<!-- including the head -->
<?php include('partials/head.php') ?>
<?php
$row = "";

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

        <!-- ===== the new Product Detail Display ============ -->
        <div class="mt-24 mx-auto flex flex-col items-start md:items-center lg:mx-14 md:flex-row justify-between ">
            <div class="p_img">
                <img src="meya_admin/products/<?php echo $row['img_url'] ?>" alt="">
            </div>

            <div class="p_detail flex flex-col gap-5 ">
                <div class="flex flex-col">
                    <h1 class="text-4xl font-bold"><?php echo $row['p_name']; ?></h1>
                    <p class=""><span id="birr"> <?php echo number_format($row['price'], 0); ?> Birr</span></p>
                </div>

                <style>
                    .description h1 {
                        margin: 0.5em 0em;
                        font-size: 1.4em;
                        font-weight: 800;
                    }

                    .description h2 {
                        margin: 0.5em 0em;
                        font-size: 1em;
                        font-weight: 700;
                    }

                    .description ul li {
                        list-style-type: disc;
                        margin: 0.2em 0em
                    }
                </style>
                <div class="description">
                    <?php
                    include './Parsedown.php';
                    $Parsedown = new Parsedown();
                    // $Parsedown->setSafeMode(true);
                    $Parsedown->setMarkupEscaped(true);
                    echo $Parsedown->text($row['discription']);
                    ?>
                    <!-- <p class="text-lg"><?php echo $row['discription']; ?></p> -->
                </div>

                <!-- Descriptive Text -->
                <div class="flex flex-col gap-3 p-5 bg-white shadow-sm rounded-md border-2 border-gray-300">
                    <p class="text-md font-semibold">Thanks For buying our product</p>
                    <p class="">You can contact us by calling to <span class="font-bold text-blue-500 underline"><?php echo $phoneNumber ?></span> or click on the call now button</p>
                    <p class="">You can contact us by calling to <a href="https://t.me/meya372" class="font-bold text-blue-500 underline">@meya</a> or click on the Telegram button</p>
                </div>
                <div class="flex gap-2 items-center">
                    <a href="tel:<?php echo $phoneNumber; ?>" target="_blank" class="w-max inline-flex items-center px-5 py-3 text-sm font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                        <span>Call Now</span>
                        <img class="size-6 ms-2" src="./images/call_icon.svg" alt="call icon">
                    </a>
                    <a href="https://t.me/meya372" target="_blank" class="w-max inline-flex items-center px-5 py-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <span>Telegram</span>
                        <img class="size-6 ms-2" src="./images/telegram_icon.svg" alt="">
                    </a>
                </div>
                <hr>
                <!-- <form action="cart.php?p_id=<?= $row['id'] ?>?page=cart" method="post" class="flex flex-col gap-3 w-full">
                    <h3 class="text-lg font-bold">Title</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis, totam?</p>
                    <div class="flex w-full gap-2">
                        <input name="quantity" type="number" min="1" placeholder="Quantity" class="w-full rounded-md border-2 px-2 outline-none focus:ring-2 focus:ring-blue-500" />
                        <input type="hidden" name="id" value="<?= $row['id'] ?>" />
                    </div>
                    <button class="flex gap-4 items-center justify-center w-full rounded-md bg-purple-500 px-3 py-3 text-white shadow-sm outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-1 hover:bg-purple-700"><i class="fas fa-cart-plus"></i> Add to cart</button>
                </form> -->
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
        </div>
    </body>
</html>