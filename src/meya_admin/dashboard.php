<!-- including the head -->
<?php include 'admin_partials/head.php'?>

    <title>Meya ADMIN Dashboard</title>
    <link rel="stylesheet" href="admin_css/style.css">
    <link rel="stylesheet" href="admin_css/dashboard.css">
</head>

<!-- including the header -->
<?php include 'admin_partials/header.php'?>

<div class="dashboard">
    <div class="the4">

            <?php
                $select_query = "select * from products";
                $p = 0;
                $res = mysqli_query($conn, $select_query) or die(mysqli_error($conn));
                if(mysqli_num_rows($res)>0){
                    while($row = mysqli_fetch_assoc($res)){
                        $p++;
                    }
                }
            ?>
            <div class="box box1">
                <h1><?php echo $p?></h1>
                <p>Products</p>
            </div>

            <?php
                $select_query = "select * from feedback";
                $f = 0;
                $res = mysqli_query($conn, $select_query) or die(mysqli_error($conn));
                if(mysqli_num_rows($res)>0){
                    while($row = mysqli_fetch_assoc($res)){
                        $f++;
                    }
                }
            ?>
            <div class="box box2">
                <h1><?php echo $f?></h1>
                <p>Feedbacks</p>
            </div>

            <?php
                $select_query = "select * from services";
                $s = 0;
                $res = mysqli_query($conn, $select_query) or die(mysqli_error($conn));
                if(mysqli_num_rows($res)>0){
                    while($row = mysqli_fetch_assoc($res)){
                        $s++;
                    }
                }
            ?>
            <div class="box box3">
                <h1><?php echo $s?></h1>
                <p>Services</p>
            </div>

            <?php
                $select_query = "select * from tutorials";
                $t = 0;
                $res = mysqli_query($conn, $select_query) or die(mysqli_error($conn));
                if(mysqli_num_rows($res)>0){
                    while($row = mysqli_fetch_assoc($res)){
                        $t++;
                    }
                }
            ?>
            <div class="box box4">
                <h1><?php echo $t?></h1>
                <p>Tutorials</p>
            </div>

            
    </div>


    <div class="second">
        <div class="sec sec-one">
            <h2>Lorem ipsum dolor sit.</h2>
            <div></div>
        </div>

        <div class="sec sec-two">
            <h2>Logo</h2>
            <div class="sec-two-component">
                <img src="../images/logo.png" alt="logo">
            </div>
        </div>
    </div>
</div>
<?php include 'admin_partials/footer.php'?>
                