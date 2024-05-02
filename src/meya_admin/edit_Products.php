<!-- including the head -->
<?php include 'admin_partials/head.php' ?>

<title>Edit Products</title>
<link rel="stylesheet" href="admin_css/style.css">
<link rel="stylesheet" href="admin_css/add_service.css">
</head>

<!-- including the header -->
<?php include 'admin_partials/header.php' ?>

<div class="services">
    <table>
        <tr>
            <th>Name</th>
            <th>ammount</th>
            <th>category</th>
            <th>Discription</th>
            <th>image</th>
            <th>Edit</th>
            <th>Delete</th>

        </tr>

        <?php
        $select_query = "select * from products";
        $res = mysqli_query($conn, $select_query) or die(mysqli_error($conn));
        if (mysqli_num_rows($res) > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
        ?>
                <tr>
                    <td><?php echo $row['p_name']; ?></td>
                    <td><?php echo $row['price']; ?></td>
                    <td><?php echo $row['category']; ?></td>
                    <td>
                        <p class="sh_disc"><?php echo $row['discription']; ?></p>
                    </td>
                    <td><img class="tbl_img" src="products/<?php echo $row['img_url'] ?>" alt=""></td>
                    <td><a class="edit_service" href="#">Edit</a></td>
                    <td><a class="delete_service" href="admin_scripts/delete_product.php?id=<?php echo $row['id'] ?>">Delete</a></td>
                </tr>
        <?php
            }
        }
        ?>
    </table>
</div>


<?php include 'admin_partials/footer.php' ?>