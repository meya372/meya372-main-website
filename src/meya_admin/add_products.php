<!-- including the head -->
<?php include 'admin_partials/head.php'?>

    <title>Add Product</title>
    <link rel="stylesheet" href="admin_css/style.css">
    <link rel="stylesheet" href="admin_css/add_service.css">
</head>

<!-- including the header -->
<?php include 'admin_partials/header.php'?>
    <div class="add_service">
        <form action="admin_scripts/sc_add_product.php" method="POST" enctype="multipart/form-data">
            <label for="p_name">Product Name:</label>
            <input required id="p_name" name="p_name" type="text">

            <label for="price">Price in Birr:</label>
            <input required id="price" name="price" type="number">

            <label for="category">Product Catagory:</label>
            <select  name="category" name="category" id="">
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
    </div>
    
<?php include 'admin_partials/footer.php'?>
                