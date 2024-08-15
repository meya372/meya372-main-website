<?php
if (isset($_POST['submit']) && isset($_FILES['p_img'])) {
	//connecting to server and databsase
	require "../../config/conn.php";

	// $p_name = $_POST['p_name'];
	$p_name = mysqli_real_escape_string($conn, $_POST['p_name']);
	$price = $_POST['price'];
	$category = $_POST['category'];
	$description = $_POST['discription'];
	$description = mysqli_real_escape_string($conn, $_POST['discription']);
	$currentDate = date("Y-m-d H:i:s");


	$img_name = $_FILES['p_img']['name'];
	$img_size = $_FILES['p_img']['size'];
	$tmp_name = $_FILES['p_img']['tmp_name'];
	$error = $_FILES['p_img']['error'];

	//for 2nd image
	$sec_img_name = $_FILES['sec_img']['name'];
	$sec_img_size = $_FILES['sec_img']['size'];
	$sec_tmp_name = $_FILES['sec_img']['tmp_name'];
	$sec_error = $_FILES['sec_img']['error'];

	if ($error === 0 && $sec_error === 0) {
		// if($img_size > 125000 || $sec_img_size > 125000){

		if ($img_size > 1425000 || $sec_img_size > 1425000) {

			$err = "image size is large!";
			header("Location: ../add_products.php?error=$err");
			// header("Location: ../add_products.php?error=$sec_img_size&$img_size");
		} else {
			$img_extension = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_extension_lower = strtolower($img_extension);

			//for second image 
			$sec_img_extension = pathinfo($sec_img_name, PATHINFO_EXTENSION);
			$sec_img_extension_lower = strtolower($sec_img_extension);

			$allowed_extensions = array("jpg", "jpeg", "png", "webp", "gif");

			if (in_array($img_extension_lower, $allowed_extensions) && in_array($sec_img_extension_lower, $allowed_extensions)) {
				$new_img_name = uniqid("IMG-", true) . '.' . $img_extension_lower;
				$img_upload_path = '../products/' . $new_img_name;
				move_uploaded_file($tmp_name, $img_upload_path);

				//for sec name
				$sec_new_img_name = uniqid("IMG-", true) . '.' . $sec_img_extension_lower;
				$sec_img_upload_path = '../products/' . $sec_new_img_name;
				move_uploaded_file($sec_tmp_name, $sec_img_upload_path);

				// Insert into Database
				// $query = "INSERT INTO products(p_name,price,category,discription,img_url, img2_url, created_at) 
				//         VALUES('$p_name','$price','$category','$description','$new_img_name','$sec_new_img_name', '$currentDate')";
				// mysqli_query($conn, $query);

				$sql = "INSERT INTO products(p_name, price, category, discription, img_url, img2_url, created_at) 
        VALUES (?, ?, ?, ?, ?, ?, ?)";

				$stmt = mysqli_prepare($conn, $sql);  // Prepare the statement

				mysqli_stmt_bind_param($stmt, "sssssss", $p_name, $price, $category, $description, $new_img_name, $sec_new_img_name, $currentDate);

				if (mysqli_stmt_execute($stmt)) {
					echo "Product added successfully!";
					header("Location: ../add_products.php");
				} else {
					// echo "Error adding product: " . mysqli_error($conn);
					$err = "image type is not allowed!";
					header("Location: ../add_products.php?error=$err");
					header("location: ../add_products.php?error=" . mysqli_error($conn));
				}

				mysqli_stmt_close($stmt); // Close the prepared statement

			} else {
				$err = "image type is not allowed!";
				header("Location: ../add_products.php?error=$err");
			}
		}
	} else {
		$err = "unknown error occurred!";
		header("Location: ../add_products.php?error=$err");
	}
} else {
	header("Location: index.php");
}
