<!-- including the head -->
<?php include('partials/head.php') ?>

<title>Meya 372</title>
<link rel="stylesheet" href="css/nav.css">
<link rel="stylesheet" href="css/tutorials.css">
</head>
<!-- including the header -->
<?php include('partials/header.php') ?>

<div class="main">
    <div class="container">
        <div class="left_side">
            <?php
            $select_query = "select * from tutorials";
            $res = mysqli_query($conn, $select_query) or die(mysqli_error($conn));
            if (mysqli_num_rows($res) > 0) {
                while ($row = mysqli_fetch_assoc($res)) {
            ?>
                    <a href=""><?php echo $row['title']; ?></a>
            <?php
                }
            }
            ?>
        </div>
        <div class="right_side">
            <div class="tutorials">
                <div class="container">
                    <?php
                    $select_query = "select * from tutorials";
                    $res = mysqli_query($conn, $select_query) or die(mysqli_error($conn));
                    if (mysqli_num_rows($res) > 0) {
                        while ($row = mysqli_fetch_assoc($res)) {
                    ?>

                            <div class="tutorial">
                                <h4 class="article_title"><?php echo $row['title']; ?></h4>
                                <p class="article"><?php echo $row['article']; ?></p>
                                <span class="read_more">Read more...</span>
                                <div class="icons">
                                    <i class="like fa-regular fa-thumbs-up"></i>
                                    <i class="dislike fa-regular fa-thumbs-down"></i>
                                    <i class="clap fa-solid fa-hands-clapping"></i>
                                </div>
                            </div>
                    <?php
                        }
                    }
                    ?>
                    <!-- <div class="tutorial">
                        <h4></h4>
                        <p></p>
                        <div class="icons">
                            <i class="like fa-regular fa-thumbs-up"></i>
                            <i class="dislike fa-regular fa-thumbs-down"></i>
                            <i class="clap fa-solid fa-hands-clapping"></i>
                        </div>
                    </div> -->
                </div>
            </div>
            <!-- add footer here -->
        </div>
    </div>
</div>
<?php include('main_footer.php') ?>

<script src="tutorials.js"></script>
<!-- including the footer -->
<?php
// include('partials/footer.php')
?>