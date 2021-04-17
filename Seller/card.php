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

    <div class="container-fluid">
        <div class="row">
            <?php
            $crt = 0;
            $id = $_GET['id'];
            $pq = "SELECT * FROM `products` WHERE `Product_ID` = '$id'";
            $result = mysqli_query($conn, $pq);
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                if ($row['status'] == 1) {
                    $crt++;
            ?>
                    <div class="col-12">
                        <div class="card mb-3 p-2 m-2">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
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
                                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                    </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $row['Product_Name'] ?></h5>
                                        <p class="card-text"><small class="text-muted">-By <?php echo $row['Sold_By']?></small></p>
                                        <p class="card-text"><?php echo '<b>Product Detail</b><br><pre>';
                                                                print_r($row['Product_Detail']);
                                                                echo '</pre>'; ?><br><b>Price : </b> Rs.<?php echo $row['Product_Price'] ?>/-</p>
                                        <a id="Edit" class="card-link btn btn-success">Edit</a>
                                        <a href="./delete.php?id=<?php echo $id; ?>" class="card-link btn btn-primary">Delete</a>
                                    </div>
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

    <!--Top Trending Products -->
    <div class="container-fluid">
        <div class="row container h3 text-success m-4">Top Trending Products</div>
        <div class="row">
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
                        <a href="http://localhost/Digital-Marketing/card.php?id=<?php echo $id; ?>" style="color: black; text-decoration: none;">
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

    <div id="EditModal" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>
            <?php
                $id = $_GET['id'];
                $pq = "SELECT * FROM `products` WHERE `Product_ID` = '$id'";
                $result = mysqli_query($conn, $pq);
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            ?>
            <form action="update.php/?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
                <div class="row container h4">Edit Products</div>
                <div class="row">
                    <div class="col-xs-12 col-sm-6" style="width: 30rem;">
                        <div class="card p-2 m-2">
                            <div class="card-body">
                                <p class="card-text">
                                <h5>Select Category : </h5><select name="category" style="width: -webkit-fill-available;" required>
                                    <optgroup label="Electronics">
                                        <option value="Mobile" <?php if ($row['Category'] == 'Mobile') echo ' selected="selected"'; ?> >Mobile</option>
                                        <option value="Tempered Glass" <?php if ($row['Category'] == 'Tempered Glass') echo ' selected="selected"'; ?> >Tempered Glass</option>
                                        <option value="Back Cover" <?php if ($row['Category'] == 'Back Cover') echo ' selected="selected"'; ?> >Back Cover</option>
                                        <option value="Charger" <?php if ($row['Category'] == 'Charger') echo ' selected="selected"'; ?> >Charger</option>
                                        <option value="Earphone" <?php if ($row['Category'] == 'Earphone') echo ' selected="selected"'; ?> >Earphone</option>
                                        <option value="Laptop" <?php if ($row['Category'] == 'Laptop') echo ' selected="selected"'; ?> >Laptop</option>
                                        <option value="Keyboard" <?php if ($row['Category'] == 'Keyboard') echo ' selected="selected"'; ?> >Keyboard</option>
                                        <option value="Mouse" <?php if ($row['Category'] == 'Mouse') echo ' selected="selected"'; ?> >Mouse</option>
                                    </optgroup>
                                    <optgroup label="Footwear">
                                        <option value="Women\'s Footwear" <?php if ($row['Category'] == "Women\'s Footwear") echo ' selected="selected"'; ?> >Men's Footwear</option>
                                        <option value="Women\'s Footwear" <?php if ($row['Category'] == "Women\'s Footwear") echo ' selected="selected"'; ?> >Women's Footwear</option>
                                    </optgroup>
                                    <optgroup label="Fashion">
                                        <option value="Men\'s Fashion" <?php if ($row['Category'] == "Men\'s Fashion") echo ' selected="selected"'; ?> >Men's Fashion</option>
                                        <option value="Women\'s Fashion" <?php if ($row['Category'] == "Women\'s Fashion") echo ' selected="selected"'; ?> >Women's Fashion</option>
                                    </optgroup>
                                </select>
                                </p>
                                <p class="card-text">
                                <h5>Enter Product Name : </h5><input type="text" name="pname" value="<?php echo $row['Product_Name']; ?>" id="name" style="width: -webkit-fill-available;" required></p>
                                <p class="card-text">
                                <h5>Enter Description : </h5><textarea name="description" id="description" style="width: -webkit-fill-available;" required><?php echo $row['Product_Detail']; ?></textarea></p>
                                <p class="card-text">
                                <h5>Enter Price : </h5><input type="text" name="Price" id="price" value="<?php echo $row['Product_Price']; ?>" style="width: -webkit-fill-available;" required></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6s" style="width: 30rem;">
                        <div class="card p-2 m-2">
                            <div class="card-body">
                            <p class="card-text">
                                <h5>Sold By : </h5><input type="text" name="SoldBy" value="<?php echo $row['Sold_By']; ?>" id="SoldBy" style="width: -webkit-fill-available;" required></p>
                            <p class="card-text">
                                <h5>Seller WhatsApp No. : </h5><input type="text" value="<?php echo $row['WhatsApp_No']; ?>" name="Number" id="Number" style="width: -webkit-fill-available;" required></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <p><button class="btn bg-success text-white" type="submit" value="Submit" name="Submit" onclick="Add()">Update</button>
                </div>
            </form>
            <?php 
            }?>
        </div>
    </div>

    <?php
    include('footer.php');
    ?>
    <!-- Optional JavaScript; choose one of the two! -->


    <script>
        var modal = document.getElementById("EditModal");

        // Get the button that opens the modal
        var btn = document.getElementById("Edit");

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
    </script>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    -->
</body>

</html>