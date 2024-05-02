<!-- including the head -->
<?php include 'admin_partials/head.php'?>

    <title>ADD ADMIN</title>
    <link rel="stylesheet" href="admin_css/style.css">
    <link rel="stylesheet" href="admin_css/add_service.css">
</head>

<!-- including the header -->
<?php include 'admin_partials/header.php'?>
    <div class="add_service">
    <h2 class="title">Add New Admin</h2>
                <?php 
                    if(isset($_GET['error'])){
                        if($_GET['error'] == "empty_fields"){
                            echo '<h4 class="err_msg">Please fill in all fields! </h4>';
                        } else if($_GET['error'] == "pwderr"){
                            echo '<h4 class="err_msg">Your passwords do not match!</h4>';
                        } else if($_GET['error'] == "u_name_taken"){
                            echo '<h4 class="err_msg">Phone number is already taken</h4>';
                        } else if($_GET['error'] == "sql_err"){
                            echo '<h4 class="err_msg">error occurred</h4>';
                        }
                    }
                ?>
                <div class="registration">
                    <form action="admin_scripts/signup_script.php" method="post">
                        <label for="u_name">Phone number</label>
                        <input id="u_name" type="tel" name="u_name" placeholder="0912345678">
                        

                        <label for="pwd">Password</label>
                        <input id="pwd" type="password" name="password" placeholder="*********">

                        <label for="confirm_pwd">Confirm password</label>
                        <input id="confirm_pwd" type="password" name="confirm_pwd" placeholder="*********">

                        <input type="submit" name="signup-submit" value="Add Admin" >
                    </form>
                </div>
    </div>

<?php include 'admin_partials/footer.php'?>
                