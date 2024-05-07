<?php
require "../../config/conn.php";

$s_name = "";

if (!isset($_GET["id"])) {
  $s_name = "";
} else {
  $s_name = $_GET["id"];
}


//sql command to delete
$sql = "DELETE From services WHERE id = $s_name";

//executing the query
$res = mysqli_query($conn, $sql);

if ($res) {
  header('location:../edit_services.php?deleted=success');
} else {
  header('location:../edit_services.php?deleted=failed');
}
