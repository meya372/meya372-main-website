<!-- including the head -->
<?php include 'admin_partials/head.php'?>

    <title>Login</title>
    <link rel="stylesheet" href="admin_css/login.css">
</head>
<body>
    <?php 
        if(isset($_GET['error'])){
            if($_GET['error'] == "empty_fields"){
                echo '<h4 class="err_msg">Please fill in all fields! </h4>';
            } else if($_GET['error'] == "pwderr"){
                echo '<h4 class="err_msg">Your passwords do not match!</h4>';
            } else if($_GET['error'] == "sql_err"){
                echo '<h4 class="err_msg">error occurred</h4>';
            }else if($_GET['error'] == "wrongpwd"){
                echo '<h4 class="err_msg">Wrong password</h4>';
            }else if($_GET['error'] == "no_user"){
                echo '<h4 class="err_msg">No User Found</h4>';
            }else if($_GET['error'] == "not_loggedin"){
                echo '<h4 class="err_msg">Please Login first</h4>';
            }
        }
    ?>
<div class="container">
    <div class="left">
        <div>
            <h3>Meya 372</h3>
            <p> And most important, have the courage to follow your heart and intuition.</p>
        </div>
    </div>
    <div class="right">
        <h2>Meya 372</h2>
        <p>Welcome Again</p>
        <form action="admin_scripts/login_script.php" method="post">
            <label for="u_name">User name</label>
            <input id="u_name" type="text" name="u_name" >
            
            <label for="pwd">Your Password</label>
            <input id="pwd" type="password" name="password" placeholder="*********">

            <input type="submit" name="login-submit" value="Sign in" >
        </form>

        <p> All rights reserved</p>
    </div>
</div>

</body>
</html>