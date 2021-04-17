<?php 
    $id = $_GET['id'];
    include('conn.php');
    $cq = "UPDATE `products` SET `count` = count + 1 WHERE `Product_ID` = '$id'";
    mysqli_query($conn, $cq);

    $nq = "SELECT `WhatsApp_No` FROM `products` WHERE `Product_ID` = '$id'";
    $result = mysqli_query($conn, $nq);

    // $data = [
    //     'phone' => '9829029176', // Receivers phone
    //     'body' => './card.php?id='.$id.'', // Message
    // ];
    // $json = json_encode($data); // Encode data to JSON
    // // URL for request POST /message
    // $token = '83763g87x';
    // $instanceId = '777';
    // $url = 'https://api.chat-api.com/instance'.$instanceId.'/message?token='.$token;
    // // Make a POST request
    // $options = stream_context_create(['http' => [
    //         'method'  => 'POST',
    //         'header'  => 'Content-type: application/json',
    //         'content' => $json
    //     ]
    // ]);
    // // Send a request
    // $result = file_get_contents($url, false, $options);

    

    $android = stripos($_SERVER['HTTP_USER_AGENT'], "android");
    $iphone = stripos($_SERVER['HTTP_USER_AGENT'], "iphone");
    $ipad = stripos($_SERVER['HTTP_USER_AGENT'], "ipad");

    $whatsappNumber = '91'.$result;
    $whatsappLink = '';
    if($android !== false || $ipad !== false || $iphone !== false) {//For mobile
        header("Location: https://api.whatsapp.com/send?phone='.$whatsappNumber.'&text=Hey, This is the product which I want to buy  $url");
    } else {//For desktop
        $url = $_GET['url'];
        header("Location: https://web.whatsapp.com/send?phone='.$whatsappNumber.'&text=Hey, This is the product which I want to buy $url");
    }

    // header('Location: ./');
?>