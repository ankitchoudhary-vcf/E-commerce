<?php
    $id = $_GET['id'];
    include('conn.php');
    $cq = "DELETE FROM `products` WHERE `Product_ID` = '$id'";
    mysqli_query($conn, $cq);

    header('Location: ./');

?>