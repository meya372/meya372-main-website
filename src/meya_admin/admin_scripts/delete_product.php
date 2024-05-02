<?php
    require "../../config/conn.php";

    $id = $_GET['id'];
    
    //sql command to delete
    $sql = "DELETE From products WHERE id = $id";

    //executing the query
    $res = mysqli_query($conn,$sql);

    if($res){
        header('location:../edit_products.php?deleted=success');
    }else{
        header('location:../edit_products.php?deleted=failed');
    }


?>

