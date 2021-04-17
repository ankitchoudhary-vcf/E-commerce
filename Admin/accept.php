<?php
        include('conn.php');
        $id = $_GET['id'];
        $aq = "UPDATE `products` SET `status` = '1' WHERE `Product_ID` = '$id'";
        mysqli_query($conn, $aq);
        header('Location: http://jaipurplaza.com/Admin');
?>