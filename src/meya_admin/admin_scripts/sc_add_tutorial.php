

<?php
if (isset($_POST['submit'])) {
    // ... connecting to server and database
    require "../../config/conn.php";

    // Escape user input to prevent SQL injection
    $s_name = mysqli_real_escape_string($conn, $_POST['title']);
    $description = mysqli_real_escape_string($conn, $_POST['article']);

    // Improved Insert Query (using prepared statements recommended)
    $sql = "INSERT INTO tutorials(title, article) VALUES (?, ?)";
    $stmt = mysqli_prepare($conn, $sql);  // Prepare the statement

    // Bind parameters to prevent injection (recommended)
    mysqli_stmt_bind_param($stmt, "ss", $s_name, $description);

    // Execute the statement
    mysqli_stmt_execute($stmt);

    // Free resources (for prepared statements)
    mysqli_stmt_close($stmt);

    // header("Location: ./add_tutorials.php");
} else {
    header("Location: ./index.php");
}
