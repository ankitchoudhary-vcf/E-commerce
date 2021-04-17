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
        include("navbar1.php");
        ?>
    </div>
    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="1000">
                <img src="./assets/img/avatars/page01.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item" data-bs-interval="1000">
                <img src="./assets/img/avatars/raisarplaza online.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item" data-bs-interval="1000">
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



    <!--New Products -->
    <div class="container-fluid">
        <div class="row container h3 text-success m-4">New Products</div>
        <div class="row m-2" style="flex-wrap:inherit; overflow-x:auto;">
            <?php
            $crt = 0;
            $pq = "SELECT * FROM `products` ORDER BY `count` ASC LIMIT 10";
            $result = mysqli_query($conn, $pq);
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                if ($row['status'] == 1) {
                    $crt++;
                    $id = $row['Product_ID'];
            ?>
                    <div class="col-xs-12 col-sm-6 col-md-5 col-lg-4 col-xl-3">
                        <a href="./card.php?id=<?php echo $id; ?>" style="color: black; text-decoration: none;">
                            <div class="card p-2 m-2" style="width: 18rem;">
                                <img src="http://jaipurplaza.com/Seller/upload/<?php echo unserialize($row['Product_Image'])[0]; ?>" class="card-img-top" alt="...">
                                <!-- <img src="./assets/img/avatars/Mobile.png" class="card-img-top" alt="..."> -->
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $row['Product_Name'] ?></h5>
                                    <p class="card-text"><small class="text-muted">-By <?php echo $row['Sold_By']?></small></p>
                                    <p class="card-text"><b>Price : </b> Rs.<?php echo $row['Product_Price'] ?>/-</p>
                                </div>
                            </div>
                        </a>
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

    <!--Top Trending Products -->
    <div class="container-fluid">
        <div class="row container h3 text-success m-4">Top Trending Products</div>
        <div class="row" style="flex-wrap:inherit; overflow-x:auto;">
            <?php
            $crt = 0;
            $pq = "SELECT * FROM `products` ORDER BY `count` DESC LIMIT 10";
            $result = mysqli_query($conn, $pq);
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                if ($row['status'] == 1) {
                    $crt++;
                    $id = $row['Product_ID'];
            ?>
                    <div class="col-xs-12 col-sm-6 col-md-5 col-lg-4 col-xl-3">
                        <a href="./card.php?id=<?php echo $id; ?>" style="color: black; text-decoration: none;">
                            <div class="card p-2 m-2">
                                <img src="http://jaipurplaza.com/Seller/upload/<?php echo unserialize($row['Product_Image'])[0]; ?>" class="card-img-top" alt="...">
                                <!-- <img src="./assets/img/avatars/Mobile.png" class="card-img-top" alt="..."> -->
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $row['Product_Name'] ?></h5>
                                    <p class="card-text"><small class="text-muted">-By <?php echo $row['Sold_By']?></small></p>
                                    <p class="card-text"><b>Price : </b> Rs.<?php echo $row['Product_Price'] ?>/-</p>
                                </div>
                            </div>
                        </a>
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

    <!-- All Products -->

    <div class="container-fluid">
        <div class="row container h3 text-success m-4">All Products</div>
        <div class="row">
            <?php
            $crt = 0;
            $pq = "SELECT * FROM `products`";
            $result = mysqli_query($conn, $pq);
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                if ($row['status'] == 1) {
                    $crt++;
                    $id = $row['Product_ID'];
            ?>
                    <div class="col-xs-12 col-sm-6 col-md-5 col-lg-4 col-xl-3">
                        <a href="./card.php?id=<?php echo $id; ?>" style="color: black; text-decoration: none;">
                            <div class="card p-2 m-2">
                                <img src="http://jaipurplaza.com/Seller/upload/<?php echo unserialize($row['Product_Image'])[0]; ?>" class="card-img-top" alt="...">
                                <!-- <img src="./assets/img/avatars/Mobile.png" class="card-img-top" alt="..."> -->
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $row['Product_Name'] ?></h5>
                                    <p class="card-text"><small class="text-muted">-By <?php echo $row['Sold_By']?></small></p>
                                    <p class="card-text"><b>Price : </b> Rs.<?php echo $row['Product_Price'] ?>/-</p>
                                </div>
                            </div>
                        </a>
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


    <div id="myModal" class="modal">
        <!-- Modal content -->

        
        <div class="modal-content">
            <span class="close">&times;</span>
            <form action="add.php" method="post" enctype="multipart/form-data">
                <div class="row container h4">Add New Products</div>
                <div class="row">
                    <div class="col-xs-12 col-sm-6" style="width: 30rem;">
                        <div class="card p-2 m-2">
                            <div class="card-body">
                                <p class="card-text">
                                <h5>Select Category : </h5><select name="category" style="width: -webkit-fill-available;" required>
                                    <option value="Mobile">Mobile</option>
                                    <optgroup label="Mobile Accessories">
                                        <option value="Tempered Glass">Tempered Glass</option>
                                        <option value="Back Cover">Back Cover</option>
                                        <option value="Charger">Charger</option>
                                        <option value="Earphone">Earphone</option>
                                    </optgroup>
                                    <option value="Laptop">Laptop</option>
                                    <optgroup label="Computer Accessories">
                                        <option value="keyboard">Keyboard</option>
                                        <option value="Mouse">Mouse</option>
                                    </optgroup>
                                    <optgroup label="Footwear">
                                        <option value="Men\'s Footwear">Men's Footwear</option>
                                        <option value="Women\'s Footwear">Women's Footwear</option>
                                    </optgroup>
                                    <optgroup label="Fashion">
                                        <option value="Men\'s Fashion">Men's Fashion</option>
                                        <option value="Women\'s Fashion">Women's Fashion</option>
                                    </optgroup>
                                </select>
                                </p>
                                <p class="card-text">
                                <h5>Enter Product Name : </h5><input type="text" name="pname" id="name" style="width: -webkit-fill-available;" required></p>
                                <p class="card-text">
                                <h5>Enter Description : </h5><textarea name="description" id="description" style="width: -webkit-fill-available;" required></textarea></p>
                                <p class="card-text">
                                <h5>Enter Price : </h5><input type="text" name="Price" id="price" style="width: -webkit-fill-available;" required></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6s" style="width: 30rem;">
                        <div class="card p-2 m-2">
                            <div class="card-body">
                            <p class="card-text">
                                <h5>Sold By : </h5><input type="text" name="SoldBy" id="SoldBy" style="width: -webkit-fill-available;" required></p>
                            <p class="card-text">
                                <h5>Seller WhatsApp No. : </h5><input type="text" name="Number" id="Number" style="width: -webkit-fill-available;" required></p>
                                <p><input type="file" accept="image/*" name="fileUpload[]" id="file" style="width: -webkit-fill-available;" required multiple></p>
                                <p>
                                <div class="user-image mb-3 text-center">
                                    <div class="imgGallery">
                                        <!-- Image preview -->
                                    </div>
                                </div>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <p><button class="btn bg-danger text-white" type="submit" value="Submit" name="Submit" onclick="Add()">Submit</button>
                </div>
            </form>
        </div>
    </div>

    <?php
    include('footer.php');
    ?>

    <a class="fixedButton" id="myBtn">
        <div class="roundedFixedBtn"><i class="fa fa-plus align-center"></i></div>
    </a>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script>
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on the button, open the modal
        btn.onclick = function() {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

        $(function() {
            // Multiple images preview with JavaScript
            var multiImgPreview = function(input, imgPreviewPlaceholder) {

                if (input.files) {
                    var filesAmount = input.files.length;

                    for (i = 0; i < filesAmount; i++) {
                        var reader = new FileReader();

                        reader.onload = function(event) {
                            $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(imgPreviewPlaceholder);
                        }

                        reader.readAsDataURL(input.files[i]);
                    }
                }

            };


            $('#file').on('change', function() {
                multiImgPreview(this, 'div.imgGallery');
            });
        });
    </script>
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