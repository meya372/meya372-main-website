<?php
require "../../config/conn.php";

$s_name = $_GET['id'];

//sql command to delete
$sql = "DELETE From tutorials WHERE id = $s_name";

//executing the query
$res = mysqli_query($conn, $sql);

if ($res) {
    header('location:../edit_blog.php?deleted=success');
} else {
    header('location:../edit_blog.php?deleted=failed');
}
