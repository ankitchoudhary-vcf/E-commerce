<?php
        include('conn.php');
        $id = $_GET['id'];
        $rq = "DELETE FROM `products` WHERE `Product_ID` = '$id'";
        mysqli_query($conn, $rq);
        header('Location: http://jaipurplaza.com/Admin');
?>