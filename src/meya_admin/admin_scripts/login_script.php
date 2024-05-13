<?php

//checking if the user has came from login page
if (isset($_POST['login-submit'])) {
    require "../../config/conn.php";

    $u_name = htmlspecialchars($_POST['u_name']);
    $pwd = htmlspecialchars($_POST['password']);


    //if there is any empty field that was not filled
    if (empty($u_name) || empty($pwd)) {
        header("location: ../index.php?error=empty_fields");
        exit();
    } else {
        $select_query = "SELECT * FROM managers WHERE u_name = ?";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $select_query)) {
            header("location: ../index.php?error=sql_err");
            exit();
        } else {
            //binding
            mysqli_stmt_bind_param($stmt, "s", $u_name);

            //executing
            mysqli_stmt_execute($stmt);

            $result = mysqli_stmt_get_result($stmt);

            if ($row = mysqli_fetch_assoc($result)) {
                // checking the password with the hased and correct password
                $pwdcheck = password_verify($pwd, $row['password']);

                //if password is not correct
                if ($pwdcheck == false) {
                    header("location: ../index.php?error=wrongpwd");
                    exit();
                } else if ($pwdcheck == true) {
                    session_start();
                    $_SESSION['meya_login'] = $row['u_name'];

                    header("location: ../dashboard.php?login=success");
                    exit();
                } else {
                    header("location: ../index.php?error=wrongpwd"); //if pwdcheck isn't true
                    exit();
                }
            } else {
                header("location: ../index.php?error=no_user"); //if there is no such user
                exit();
            }
        }
    }
} else {
    header("location: ../index.php");
    exit();
}
