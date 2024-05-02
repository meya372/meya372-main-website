<!-- including the head -->
<?php include 'admin_partials/head.php'?>

    <title>Feedbacks</title>
    <link rel="icon" type="image/x-icon" href="../images/fav.png">
    <script src="https://kit.fontawesome.com/b3507588bd.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="admin_css/style.css">
    <link rel="stylesheet" href="admin_css/add_service.css">
</head>

<!-- including the header -->
<?php include 'admin_partials/header.php'?>
    
    <div class="services feedback">
        <table>
            <tr>
                <th>Title</th>
                <th>Article</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>

            <?php
            $select_query = "select * from tutorials";
            $res = mysqli_query($conn, $select_query) or die(mysqli_error($conn));
            if(mysqli_num_rows($res)>0){
                while($row = mysqli_fetch_assoc($res)){
                    ?>
                        <tr>
                            <td><?php echo $row['title'] ;?></td>
                            <td><?php echo $row['article'] ;?></td>
                            <td><a class="edit_service" href="#">Edit</a></td>
                            <td><a class="delete_service" href="admin_scripts/sc_delete_blog.php?id=<?php echo $row['id'] ?>">Delete</a></td>
                        </tr>
                    <?php
                }
            }
            ?>
        </table>
    </div>
    
<?php include 'admin_partials/footer.php'?>
                