<!-- ========================== PHP Code ================================== -->
<?php
// Start the PHP session
session_start();

// Define a session variable to store a unique identifier
$user_id = session_id();

// Database connection details (replace with your actual details)
$servername = "localhost";
$username = "meya37mj";
$password = ")E:XsioH@7whX9;25";
$dbname = "meya37mj_meya372com_meya372";

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
$count_column = "blog_visit_count";

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
        echo "Visit count updated successfully! Your current visit count is: " . ($current_count + 1);
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

<title>Meya 372</title>
<link rel="stylesheet" href="css/nav.css">
<link rel="stylesheet" href="css/tutorials.css">
</head>
<!-- including the header -->
<?php include('partials/header.php') ?>

<div class="main">
    <div class="container">
        <div class="left_side">
            <?php
            $select_query = "select * from tutorials";
            $res = mysqli_query($conn, $select_query) or die(mysqli_error($conn));
            if (mysqli_num_rows($res) > 0) {
                while ($row = mysqli_fetch_assoc($res)) {
            ?>
                    <a href=""><?php echo $row['title']; ?></a>
            <?php
                }
            }
            ?>
        </div>
        <div class="right_side">
            <div class="tutorials">
                <div class="container">
                    <?php
                    $select_query = "select * from tutorials";
                    $res = mysqli_query($conn, $select_query) or die(mysqli_error($conn));
                    if (mysqli_num_rows($res) > 0) {
                        while ($row = mysqli_fetch_assoc($res)) {
                    ?>

                            <div class="tutorial">
                                <h4 class="article_title"><?php echo $row['title']; ?></h4>
                                <p class="article"><?php echo $row['article']; ?></p>
                                <span class="read_more">Read more...</span>
                                <div class="icons">
                                    <i class="like fa-regular fa-thumbs-up"></i>
                                    <i class="dislike fa-regular fa-thumbs-down"></i>
                                    <i class="clap fa-solid fa-hands-clapping"></i>
                                </div>
                            </div>
                    <?php
                        }
                    }
                    ?>

                </div>
            </div>
            <!-- add footer here -->
        </div>
    </div>
</div>
<?php include('main_footer.php') ?>

<script src="tutorials.js"></script>
<!-- including the footer -->
<?php
// include('partials/footer.php')
?>