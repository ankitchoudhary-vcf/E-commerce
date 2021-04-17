<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title>JaipurPlaza</title>
    <link rel="icon" href="./assets/img/avatars/logo.png">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body id="page-top">

    <div class="container-fluid">
        <?php
        include("conn.php");
        include("navbar.php");
        // include("navbar1.php");
        ?>
    </div>

    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="10000">
                <img src="./assets/img/avatars/page01.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item" data-bs-interval="2000">
                <img src="./assets/img/avatars/raisarplaza online.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="./assets/img/avatars/raisarplaza.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="container-fluid">
        <div class="row">
            <?php
            $crt = 0;
            $id = $_GET['id'];
            $pq = "SELECT * FROM `products` WHERE `Product_ID` = '$id'";
            $result = mysqli_query($conn, $pq);
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                if ($row['status'] == 0) {
                    $crt++;
            ?>
                    <div class="col-12">
                        <div class="card mb-3 p-2 m-2">
                            <div class="row g-0">
                                <div class="col-md-4">
                                <div id="imgCard" class="carousel slide" data-bs-ride="carousel">
                                        <div class="carousel-inner">
                                            <div class="carousel-item active" data-bs-interval="2000">
                                                <img src="http://jaipurplaza.com/Seller/upload/<?php echo unserialize($row['Product_Image'])[0]; ?>" class="d-block w-100" alt="...">
                                            </div>
                                            <?php
                                                for($i = 1; $i < count(unserialize($row['Product_Image'])); $i++)
                                                {
                                            ?>
                                            <div class="carousel-item" data-bs-interval="2000">
                                                <img src="http://jaipurplaza.com/Seller/upload/<?php echo unserialize($row['Product_Image'])[$i]; ?>" class="d-block w-100" alt="...">
                                            </div>
                                            <?php 
                                                }
                                            ?>
                                        <button class="carousel-control-prev" type="button" data-bs-target="#imgCard" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button" data-bs-target="#imgCard" data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                    </div>
                                </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $row['Product_Name'] ?></h5>
                                        <p class="card-text"><?php echo '<b>Product Detail</b><br><pre>'; print_r($row['Product_Detail']); echo '</pre>'; ?><br><b>Price : </b> Rs.<?php echo $row['Product_Price']; ?>/-</p>
                                        <a href="accept.php?id=<?php echo $id?>" class="card-link btn btn-success">Accept</a>
                                        <a href="reject.php?id=<?php echo $id ?>" class="card-link btn btn-danger">Reject</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
            };
            if ($crt == 0) {
                ?>
                <div class="text-center">
                    <h3 class="text-warning">
                        <h2 class="text-danger">404</h2> Item not found
                    </h3>
                </div>
            <?php
            }
            ?>
        </div>
    </div>


    <?php
    include('footer.php');
    ?>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    -->
</body>

</html>