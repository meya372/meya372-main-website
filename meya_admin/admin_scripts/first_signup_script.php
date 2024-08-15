<?php

//checking if the user has came from signup page
    if(isset($_POST['signup-submit'])){
        require "../../config/conn.php";

        $u_name = htmlspecialchars($_POST['u_name']);
        $password = htmlspecialchars($_POST['password']);
        $confirm_pwd = htmlspecialchars($_POST['confirm_pwd']);
        
        //if there is any empty field that was not filled
        if(empty($password) || empty($confirm_pwd) ||empty($u_name)){
            header('location: ../signup.php?error=empty_fields&u_name='.$u_name);
            exit();
        }

 
        //unmatched passwords
        else if($password != $confirm_pwd){
            header('location: ../signup.php?error=pwderr&u_name='.$u_name);
            exit();
        }else{
            $select_query = "SELECT u_name FROM managers WHERE u_name = ?";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $select_query)) {
                header("location: ../signup.php?error=sql_err");
                exit();
            } else{
                //binding
                mysqli_stmt_bind_param($stmt, "s", $u_name);

                //executing
                mysqli_stmt_execute($stmt);

                //storing the result i the $stmt variable
                mysqli_stmt_store_result($stmt);

                //how many rows do we have in the stmt
                $count = mysqli_stmt_num_rows($stmt);
                
                //if u_name is taken
                if ($count > 0) {
                    header('location: ../signup.php?error=u_name_taken');
                    exit();
                }else {

                    //prepare statements
                    $insert_query = "INSERT INTO managers (password,u_name) Values(?,?)";

                    $stmt = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt, $insert_query)) {
                        header("location: ../signup.php?error=sql_err");
                        exit();
                    }else{
                        // TODO enable password hashing
                        
                        $hasedpwd = password_hash($password, PASSWORD_DEFAULT);
                        // $hasedpwd = $password;
                        //binding t
                        mysqli_stmt_bind_param($stmt, "ss", $hasedpwd, $u_name);

                        //executing
                        mysqli_stmt_execute($stmt);

                        //redirecting when the user has successfully registered
                        header("location: ../dashboard.php?user_registered=true");
                        exit();

                    }
                }
            }
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    
    }else{
        // if the user didn't come from the signup page return to the signup page
        header('location: ../index.php');
        exit();
}
