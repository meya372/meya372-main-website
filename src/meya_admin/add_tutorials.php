<!-- including the head -->
<?php include 'admin_partials/head.php'?>

    <title>Add Tutorial</title>
    <link rel="stylesheet" href="admin_css/style.css">
    <link rel="stylesheet" href="admin_css/add_service.css">
</head>

<!-- including the header -->
<?php include 'admin_partials/header.php'?>
    <div class="add_service">
        <form action="admin_scripts/sc_add_tutorial.php" method="POST" enctype="multipart/form-data">
            <label for="name">Tutorial Title</label>.
            <input id="name" required name="title" type="text">

            <label for="disc"> Tutorial Article:</label>
            <input id="disc" required name="article" type="text">

            <input type="submit" name="submit" value="UPLOAD">
        </form>
    </div>

<?php include 'admin_partials/footer.php'?>