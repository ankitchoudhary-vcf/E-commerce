<?php
    include('conn.php');

    $name = $_POST['pname'];
    $category = $_POST['category'];
    $Price = $_POST['Price'];
    $des = $_POST['description'];
    $Sold = $_POST['SoldBy'];
    $Number = $_POST['Number'];
    $pid = $_GET['id'];

    $aq = "UPDATE `products` SET `Product_Name` = '$name', `Category` = '$category', `Product_Detail` = '$des', `Product_Price` = '$Price', `Sold_By` = '$Sold', `WhatsApp_No` = '$Number' WHERE `Product_ID` = $pid";
    $conn->query($aq);
    $conn->close();


    header('Location: http://jaipurplaza.com/');

?>