<?php
if (isset($_POST['submit']) && isset($_FILES['s_img'])) {
	//connecting to server and databsase
	require "../../config/conn.php";

	// $s_name = $_POST['s_name'];
	$s_name = mysqli_real_escape_string($conn, $_POST['s_name']);
	$description = mysqli_real_escape_string($conn, $_POST['discription']);
	// $description = $_POST['discription'];

	$img_name = $_FILES['s_img']['name'];
	$img_size = $_FILES['s_img']['size'];
	$tmp_name = $_FILES['s_img']['tmp_name'];
	$error = $_FILES['s_img']['error'];

	if ($error === 0) {
		if ($img_size > 125000) {
			$err = "image size is large!";
			header("Location: ../add_services.php?error=$err");
		} else {
			$img_extension = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_extension_lower = strtolower($img_extension);

			$allowed_extensions = array("jpg", "jpeg", "png");

			if (in_array($img_extension_lower, $allowed_extensions)) {
				$new_img_name = uniqid("IMG-", true) . '.' . $img_extension_lower;
				$img_upload_path = '../services/' . $new_img_name;
				move_uploaded_file($tmp_name, $img_upload_path);

				// Insert into Database
				$query = "INSERT INTO services(s_name,discription,img_url) 
				        VALUES('$s_name','$description','$new_img_name')";
				mysqli_query($conn, $query);
				header("Location: ../edit_services.php");
			} else {
				$err = "image type is not allowed!";
				header("Location: ../add_services.php?error=$err");
			}
		}
	} else {
		$err = "unknown error occurred!";
		header("Location: ../add_services.php?error=$err");
	}
} else {
	header("Location: index.php");
}
