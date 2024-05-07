<?php
require "../config/conn.php";

$id = "";
$p_name = "";
$price = "";
$category = "";
$description = "";
$image1 = "";
$image2 = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

  if (!isset($_GET['id'])) {
    header("Location: /Meya-Store/src/meya_admin/edit_products.php");
    exit;
  }

  $id = $_GET["id"];

  $sql = "SELECT * FROM products WHERE id=$id";
  $result = mysqli_query($conn, $sql);
  $row = $result->fetch_assoc();


  $id = $row['id'];
  $p_name = $row['p_name'];
  $price = $row['price'];
  $category = $row['category'];
  $description = $row['discription'];

  $image1 = $row['img_url'];
  $image2 = $row['img2_url'];
}
// Post and other requests
else {
  $id = $_POST['id'];
  $p_name = $_POST['p_name'];
  $price = $_POST['price'];
  $category = $_POST['category'];
  $description = mysqli_real_escape_string($conn, $_POST['discription']);
  // $description = $_POST['discription'];

  // image 1
  $new_img_name = "";
  $image1 = $_FILES['img_url']['name'];
  $img_size = $_FILES['img_url']['size'];
  $tmp_name = $_FILES['img_url']['tmp_name'];
  $error = $_FILES['img_url']['error'];

  // image 2
  $new_img_name2 = "";
  $image2 = $_FILES['img2_url']['name'];
  $img_size2 = $_FILES['img2_url']['size'];
  $tmp_name2 = $_FILES['img2_url']['tmp_name'];
  $error2 = $_FILES['img2_url']['error'];

  do {
    if (empty($id) || empty($p_name) || empty($description) || empty($image1) || empty($image2)) {
      $errorMessage = 'All Fields are required';
      break;
    }

    if ($img_size > 1425000 || $img_size2 > 1425000) {
      $error = "Image Size is Large";
      header("location: /Meya-Store/src/meya_admin/edit_service.php");
    } else {
      $img_extension = pathinfo($image1, PATHINFO_EXTENSION);
      $img_extension_lower = strtolower($img_extension);

      $img2_extention = pathinfo($image2, PATHINFO_EXTENSION);
      $img2_extention_lower = strtolower($img2_extention);

      $allowed_extensions = array("jpg", "jpeg", "png", "webp", "gif", "jepg");

      if (in_array($img_extension_lower, $allowed_extensions) && in_array($img2_extention_lower, $allowed_extensions)) {
        $new_img_name = uniqid("IMG-", true) . "." . $img_extension_lower;
        $img_upload_path = "../services" . $new_img_name;
        move_uploaded_file($tmp_name, $img_upload_path);

        // for the second image
        $new_img2_name = uniqid("IMG-", true) . "." . $img_extension_lower;
        $img2_upload_path = "../products" . $new_img2_name;
        move_uploaded_file($tmp_name2, $img2_upload_path);
      }
    }

    $sql = "UPDATE products SET p_name = ?, price = ?, category = ?, discription = ?, img_url = ?, img2_url = ? WHERE id = ?";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "sssssss", $p_name, $price, $category, $description, $new_img_name, $new_img2_name, $id);
    $result = mysqli_stmt_execute($stmt);

    if (!$result) {
      $errorMessage = "Invalid Query: " . $conn->error;
    } else {
      $successMessage = "Product Edited Successfully";
    }

    mysqli_stmt_close($stmt); // Close the statement (optional)
  } while (false);
}
?>


<!-- including the head -->
<?php include 'admin_partials/head.php' ?>

<title>Add Product</title>
<link rel="stylesheet" href="admin_css/style.css">
<!-- <link rel="stylesheet" href="admin_css/add_service.css"> -->
<link rel="stylesheet" href="admin_css/dashboard.css">

</head>
<!-- <div class="add_service">
    <form action="admin_scripts/sc_add_product.php" method="POST" enctype="multipart/form-data">
        <label for="p_name">Product Name:</label>
        <input required id="p_name" name="p_name" type="text">

        <label for="price">Price in Birr:</label>
        <input required id="price" name="price" type="number">

        <label for="category">Product Catagory:</label>
        <select name="category" name="category" id="">
            <option id="aa" value="desktop">Desktop Computer</option>
            <option value="laptop">Laptop computer</option>
            <option value="playstation3">Playstation 3</option>
            <option value="playstation4">Playstation 4</option>
            <option value="mobile">Mobile Phone</option>
        </select>

        <label for="disc">Product Discription:</label>
        <input required id="disc" name="discription" type="text">

        <label for="img">Product Image (png, jpg, jpeg):</label>
        <input type="file" name="p_img" id="img">

        <label for="img2">Second Image (png, jpg, jpeg):</label>
        <input type="file" name="sec_img" id="img2">

        <input type="submit" name="submit" value="Upload">
    </form>
</div> -->

<div class="dashboard-container ">
  <!-- Header -->
  <div class="nav">
    <!-- including the header -->
    <div class="hidden md:block">
      <?php include 'admin_partials/Navbar_Desktop.php' ?>
    </div>
  </div>
  <!-- Bottom container -->
  <div class="bottom-container">
    <!-- Sidebar -->
    <div class="sidebar">
      <?php include 'admin_partials/sidebar.php' ?>
    </div>
    <!-- Main Sidebar -->
    <div class="dashboard">
      <!-- Header -->
      <div class="flex flex-col items-start">
        <h2 class="text-3xl font-bold">Edit Products</h2>
        <p class="text-gray-400">Edit a exitsting product for the Meya store</p>
        <hr class="my-2">
      </div>

      <!-- Add Products Form -->
      <form method="POST" enctype="multipart/form-data" class="flex flex-col gap-5 w-full md:w-[60%]">
        <?php if ($errorMessage) {
          echo "<p class='p-2 bg-slate-200 rounded-md'>$errorMessage</p>";
        } ?>

        <input type="hidden" name="id" value="<?php echo $id ?>">
        <div class="flex flex-col gap-3">
          <label class="text-lg font-semibold" for="p_name">Product Name</label>
          <input value="<?php echo $p_name ?>" placeholder="Product name" class="py-2 px-3 rounded-md border-2 border-gray-300 outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2" required id="p_name" name="p_name" type="text">
          <p class="hidden text-red-500">Error message</p>
        </div>
        <div class="flex flex-col gap-3">
          <label class="text-lg font-semibold" for="price">Price in Birr</label>
          <input value="<?php echo $price ?>" placeholder="Birr in ETB" class="py-2 px-3 rounded-md border-2 border-gray-300 outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2" required id="price" name="price" type="number">
          <p class="hidden text-red-500">Error message</p>
        </div>
        <div class="flex flex-col gap-3">
          <label class="text-lg font-semibold" for="category">Product Catagory:</label>
          <select value="<?php echo $category ?>" class="py-2 px-3 rounded-md border-2 border-gray-300 outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2" name="category" id="category">
            <option value="desktop">Desktop Computer</option>
            <option value="laptop">Laptop computer</option>
            <option value="playstation3">Playstation 3</option>
            <option value="playstation4">Playstation 4</option>
            <option value="mobile">Mobile Phone</option>
          </select>
          <p class="hidden text-red-500">Error message</p>
        </div>
        <div class="flex flex-col gap-3">
          <label class="text-lg font-semibold" for="disc">Product Description</label>
          <textarea rows="10" placeholder="Description" class="py-2 px-3 rounded-md border-2 border-gray-300 outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2" required id="disc" name="discription" type="text"><?php echo $description ?>"</textarea>
          <p class="hidden text-red-500">Error message</p>
        </div>
        <div class="flex flex-col gap-3">
          <label class="text-lg font-semibold" for="img">Product Image (png, jpg, jpeg):</label>
          <input value="<?php echo $image1 ?>" placeholder="File 1" class="bg-white py-2 px-3 rounded-md border-2 border-gray-300 outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2" type="file" name="img_url" id="img_url">
          <p class="hidden text-red-500"><?php echo $error; ?></p>
        </div>
        <div class="flex flex-col gap-3">
          <label class="text-lg font-semibold" for="img2">Second Image (png, jpg, jpeg):</label>
          <input value="<?php echo $image2 ?>" class="bg-white py-2 px-3 rounded-md border-2 border-gray-300 outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2" type="file" name="img2_url" id="img2_url">
          <p class="hidden text-red-500"><?php echo $error2; ?></p>
        </div>
        <!-- <input class="p-3 rounded-lg bg-purple-500 text-white text-lg font-semibold tracking-widest" type="submit" name="submit" value="Upload"> -->
        <div class="flex gap-3">
          <button type="submit" class="cursor-pointer w-max flex gap-3 items-center px-5 py-3 rounded-lg bg-purple-500 text-white text-lg tracking-wide hover:bg-purple-600" type="submit" name="submit">
            <svg width="16" height="18" viewBox="0 0 14 16" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M6.66008 0.585197C6.87148 0.470787 7.12852 0.470787 7.33992 0.585197L13.6392 3.99415C13.6445 3.99701 13.6497 3.99994 13.655 4.00295C13.8687 4.12547 14 4.34903 14 4.59064V11.4094C14 11.657 13.8622 11.8852 13.6399 12.0055L7.33992 15.4148C7.12537 15.531 6.86413 15.529 6.65154 15.4101L0.360052 12.0053C0.137823 11.8851 0 11.657 0 11.4093V4.59064C0 4.34903 0.131243 4.12539 0.345009 4.00287L0.35511 4.00275L0.360052 3.99457L6.66008 0.585197ZM7.00007 7.21994L2.14146 4.5906L7 1.9613L11.8586 4.59064L7.00007 7.21994ZM1.4 5.74949V11.0081L6.3 13.6598V8.40122L1.4 5.74949ZM7.7 8.40122V13.6599L12.6 11.0082V5.74949L7.7 8.40122Z" fill="white" />
            </svg>
            <span>Edit Product</span>
          </button>
          <button type="reset" class="w-max flex gap-3 items-center px-5 py-3 rounded-lg bg-transparent text-black text-lg tracking-wide hover:bg-slate-800 hover:text-white border-2 border-slate-800" type="reset" name="submit">
            Reset form
          </button>
        </div>
      </form>

    </div>
  </div>
</div>

<!-- <?php include 'admin_partials/footer.php' ?> -->