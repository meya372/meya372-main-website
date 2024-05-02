<?php
    if(isset($_POST['submit'])){
    //connecting to server and databsase
        require "../../config/conn.php";

        $title = $_POST['title'];
        $article = $_POST['article'];
            
    // Insert into Database
        $query = "INSERT INTO tutorials(title,article) 
                VALUES('$title','$article')";
        mysqli_query($conn, $query);
        header("Location: ../add_tutorials.php?");
    }else {
        header("Location: index.php");
    }