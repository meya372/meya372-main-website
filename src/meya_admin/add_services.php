<!-- including the head -->
<?php include 'admin_partials/head.php'?>

    <title>Add Service</title>
    <link rel="stylesheet" href="admin_css/style.css">
    <link rel="stylesheet" href="admin_css/add_service.css">
</head>

<!-- including the head -->
<?php include 'admin_partials/header.php'?>
    <div class="add_service">
        <form action="admin_scripts/sc_add_service.php" method="POST" enctype="multipart/form-data">
            <label for="name">Service Name:</label>
            <input id="name" required name="s_name" type="text">

            <label for="disc">Service Discription:</label>
            <input id="disc" required name="discription" type="text">

            <label for="img">Service Image (png, jpg, jpeg):</label>
            <input type="file" required name="s_img" id="img">

            <input type="submit" name="submit" value="UPLOAD">
        </form>
    </div>

<?php include 'admin_partials/footer.php'?>
                