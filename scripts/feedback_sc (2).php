
<?php
    if(isset($_POST['submit_feedback'])){
        //connecting to server and databsase
        require "../config/conn.php";

        $name = $_POST['c_name'];
        $email = $_POST['c_email'];
        $feedback = $_POST['feedback'];
            
        // Insert into Database
        $query = "INSERT INTO feedback(u_name, email, feedback) 
                VALUES('$name', '$email', '$feedback')";
        mysqli_query($conn, $query);
        header("Location: ../index.php#feed");
    }else {
    header("Location: index.php");
    }
    
?>




