<!-- ========================== PHP Code ================================== -->
<?php
// Start the PHP session
session_start();

// Define a session variable to store a unique identifier
$user_id = session_id();

// Database connection details (replace with your actual details)
$servername = "localhost";
$username = "meya372com372";
$password = "P6xUbliG4cW7tE1";
$dbname = "meya372com_meya372";
$row = "";

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
$count_column = $_GET['prod_type'] . "_visit_count";

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
        echo "Error updating visit count: " . mysqli_error($conn);
    }
} else {
    // If record doesn't exist, create it with a count of 1
    $sql_insert = "INSERT INTO $table ($count_column) VALUES (1)";

    if (mysqli_query($conn, $sql_insert)) {
        // echo "Visit record created. Visit count is: 1";
    } else {
        echo "Error creating visit record: " . mysqli_error($conn);
    }
}
?>

<!-- ========================== END OF PHP Code ================================== -->




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
                            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 overflow-hidden">
                                <a href="#">
                                    <img class="rounded-t-lg w-full max-h-[220px] object-cover" src="meya_admin/products/<?php echo $row['img_url'] ?>" alt="" />
                                </a>
                                <div class="p-5">
                                    <a href="#">
                                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><?php echo $row['p_name']; ?></h5>
                                    </a>

                                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"><?php echo substr($row['discription'], 0, 50) . " ..." ?></p>
                                    <a href="#" class="mb-3">
                                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><?php echo number_format($row['price'], 0); ?> Birr</h5>
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
    </body>

    </html>