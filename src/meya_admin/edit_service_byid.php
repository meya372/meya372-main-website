<?php
require "../config/conn.php";

$id = "";
$s_name = "";
$description = "";
$image1 = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

  if (!isset($_GET['id'])) {
    header("location: /Meya-Store/src/meya_admin/edit_services.php");
    exit;
  }

  $id = $_GET["id"];

  $sql = "SELECT * FROM services WHERE id=$id";
  $result = mysqli_query($conn, $sql);
  $row = $result->fetch_assoc();


  $id = $row['id'];
  $s_name = $row['s_name'];
  $description = $row['discription'];
  $image1 = $row['img_url'];
}
// Post and other requests
else {
  $id = $_POST['id'];
  $s_name = $_POST['s_name'];
  $description = $_POST['discription'];
  // $image = $_POST['img_url'];
  $new_img_name = "";
  $image1 = $_FILES['img_url']['name'];
  $img_size = $_FILES['img_url']['size'];
  $tmp_name = $_FILES['img_url']['tmp_name'];
  $error = $_FILES['img_url']['error'];

  do {
    if (empty($id) || empty($s_name) || empty($description) || empty($image1)) {
      $errorMessage .= 'All Fields are required';
      break;
    }

    if ($img_size > 1425000) {
      $error = "Image Size is Large";
      header("location: edit_service_byid.php");
    } else {
      $img_extension = pathinfo($image1, PATHINFO_EXTENSION);
      $img_extension_lower = strtolower($img_extension);

      $allowed_extensions = array("jpg", "jpeg", "png", "webp", "gif", "jepg");

      if (in_array($img_extension_lower, $allowed_extensions)) {
        $new_img_name = uniqid("IMG-", true) . "." . $img_extension_lower;
        $img_upload_path = "./services" . $new_img_name;
        move_uploaded_file($tmp_name, $img_upload_path);
      }
    }

    $sql = "UPDATE services SET s_name = ?, discription = ?, img_url = ? WHERE id = ?";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ssss", $s_name, $description, $new_img_name, $id);
    $result = mysqli_stmt_execute($stmt);

    if (!$result) {
      $errorMessage = "Invalid Query: " . $conn->error;
      header("Location: ./edit_service_byid.php?error=" . $errorMessage);
    } else {
      $successMessage = "Service Edited Successfully";
    }

    mysqli_stmt_close($stmt); // Close the statement (optional)
  } while (false);
}
?>

<!-- including the head -->
<?php include 'admin_partials/head.php' ?>

<title>Edit Service</title>
<link rel="stylesheet" href="admin_css/style.css">
<link rel="stylesheet" href="admin_css/dashboard.css">
</head>

<div class="dashboard-container ">
  <!-- Header -->
  <div class="hidden md:block">
    <?php include 'admin_partials/Navbar_Desktop.php' ?>
  </div>
  <div class="nav">
    <!-- including the header -->
    <div class="hidden md:block">
      <?php include 'admin_partials/Navbar_Desktop.php' ?>
    </div>
    <div class="md:hidden">
      <?php include 'admin_partials/Navbar_mobile.php' ?>
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
        <h2 class="text-3xl font-bold">Edit Services</h2>
        <p class="text-gray-400">Edit a existing Service for the Meya store</p>
        <hr class="my-2">
      </div>

      <!-- edit services Form -->
      <form method="POST" enctype="multipart/form-data" class="flex flex-col gap-5 w-full md:w-[60%]">
        <?php if ($errorMessage) {
          echo "<p class='p-2 bg-slate-200 rounded-md'>$errorMessage</p>";
        } ?>
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <div class="flex flex-col gap-3">
          <label class="text-lg font-semibold" for="name">Service Name</label>
          <input value="<?php echo $s_name; ?>" placeholder="Service name" class="py-2 px-3 rounded-md border-2 border-gray-300 outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2" id="name" required name="s_name" type="text">

          <p class="hidden text-red-500">Error message</p>
        </div>

        <div class="flex flex-col gap-3">
          <label class="text-lg font-semibold" for="disc">Service Description</label>
          <textarea rows="10" placeholder="Description" class="py-2 px-3 rounded-md border-2 border-gray-300 outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2" required id="disc" name="discription" type="text"><?php echo $description; ?></textarea>

          <p class="hidden text-red-500">Error message</p>
        </div>

        <div class="flex flex-col gap-3">
          <label class="text-lg font-semibold" for="img">Service Image (png, jpg, jpeg):</label>
          <input value="<?php echo $image1; ?>" class="bg-white py-2 px-3 rounded-md border-2 border-gray-300 outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2" type="file" required name="img_url" id="img">
          <p class="hidden text-red-500">Error message</p>
        </div>

        <div class="flex gap-3">
          <button type="submit" name="submit" class="w-max flex gap-3 items-center px-5 py-3 rounded-lg bg-purple-500 text-white text-lg tracking-wide hover:bg-purple-600" type="submit" name="submit">
            <svg width="14" height="16" viewBox="0 0 14 16" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M5.83333 0.49939C4.23148 0.49939 2.91667 1.90843 2.91667 3.62401C2.91667 4.54959 3.29985 5.3855 3.90387 5.95951C1.62348 6.86417 0 9.32229 0 12.1672C1.46689e-05 12.3882 0.0819888 12.6001 0.227892 12.7564C0.373796 12.9126 0.57168 13.0004 0.778021 13.0004H4.52056C4.67354 12.3949 4.9185 11.8316 5.24139 11.3341H1.61761C1.9617 8.99359 3.7306 7.25444 5.83333 7.25444C6.12475 7.25444 6.4094 7.28896 6.68509 7.35274C6.77977 6.33471 7.45336 5.49047 8.34463 5.20476C8.60177 4.74006 8.75 4.1994 8.75 3.62401C8.75 1.90843 7.43518 0.49939 5.83333 0.49939ZM5.83333 2.16569C6.59377 2.16569 7.19396 2.80845 7.19396 3.62401C7.19396 4.43957 6.59377 5.08243 5.83333 5.08243C5.0729 5.08243 4.47266 4.43957 4.47266 3.62401C4.47266 2.80845 5.0729 2.16569 5.83333 2.16569Z" fill="white" />
              <path d="M9.33341 5.4998C8.05193 5.4998 7.00008 6.62705 7.00008 7.99952C7.00008 8.73998 7.30662 9.4087 7.78983 9.8679C5.96552 10.5916 4.66675 12.5581 4.66675 14.8341C4.66676 15.0109 4.73234 15.1804 4.84906 15.3054C4.96578 15.4304 5.12408 15.5006 5.28915 15.5006H9.33341H13.3776C13.5427 15.5006 13.701 15.4304 13.8178 15.3054C13.9345 15.1804 14.0001 15.0109 14.0001 14.8341C14.0001 12.5581 12.7013 10.5916 10.877 9.8679C11.3602 9.4087 11.6667 8.73998 11.6667 7.99952C11.6667 6.62705 10.6149 5.4998 9.33341 5.4998ZM9.33341 6.83285C9.94176 6.83285 10.4219 7.34707 10.4219 7.99952C10.4219 8.65197 9.94176 9.16625 9.33341 9.16625C8.72507 9.16625 8.24489 8.65197 8.24489 7.99952C8.24489 7.34707 8.72507 6.83285 9.33341 6.83285ZM9.33341 10.9038C11.0156 10.9038 12.4307 12.2951 12.706 14.1676H9.33341H5.96084C6.23611 12.2951 7.65123 10.9038 9.33341 10.9038Z" fill="white" />
            </svg>
            <span>Edit Service</span>
          </button>
          <button type="reset" class="w-max flex gap-3 items-center px-5 py-3 rounded-lg bg-transparent text-black text-lg tracking-wide hover:bg-slate-800 hover:text-white border-2 border-slate-800" type="reset" name="submit">
            Reset form
          </button>
        </div>
      </form>
      <div>
        <?php if ($successMessage) {
          echo "<h2 class='p-3 rounded-md bg-green-200 text-green-500'>$successMessage</h2>";
        } ?>

      </div>

    </div>
  </div>
</div>