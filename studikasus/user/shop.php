<?php
session_start();
include('../admin/connection.php');
$query = mysqli_query($conn, "SELECT id, category_id, brands_id, product_name, image, description, price, stock FROM product");
$categories = mysqli_query($conn, "SELECT id, category_name FROM category");
$brand = mysqli_query($conn, "SELECT id, brand_name FROM brands");

//get product by category
if (isset($_GET['category'])) {
    $getcategoryid = mysqli_query($conn, "SELECT id FROM category WHERE category_name ='$_GET[category]'");
    $categoryid = mysqli_fetch_array($getcategoryid);
    $query = mysqli_query($conn, "SELECT id, category_id, brands_id, product_name, image, description, price, stock FROM product WHERE category_id = '$categoryid[id]'");
}

//get product by brand
if (isset($_GET['brand'])) {
    $getbrandid = mysqli_query($conn, "SELECT id FROM brands WHERE brand_name ='$_GET[brand]'");
    $brandid = mysqli_fetch_array($getbrandid);
    $query = mysqli_query($conn, "SELECT id, category_id, brands_id, product_name, image, description, price, stock FROM product WHERE brands_id = '$brandid[id]'");
}

$countdata = mysqli_num_rows($query);
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MafStore | Shop</title>
    <link href="../admin/assets/img/mafstore3.png" rel="icon">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__option">
            <div class="offcanvas__links">
                <a href="#">Sign in</a>
            </div>
        </div>
        <div id="mobile-menu-wrap"></div>
    </div>
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    <header class="header fixed-top" style="transition: 0.5s;">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="header__logo">
                        <a href="index.php"><img src="../admin/assets/img/mafstore3.png"></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <nav class="header__menu mobile-menu">
                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <li class="active"><a href="shop.php">Shop</a></li>
                            <li><a href="about.php">About Us</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3 col-md-3">
                    <div class="header__menu mobile-menu">
                        <ul>
                            <?php
                            if (isset($_SESSION['role'])) {
                            ?>
                                <li><a href="#"><?php echo $_SESSION['nama_user']; ?></a>
                                    <ul class="dropdown">
                                        <li><a href="logout.php">Logout</a></li>
                                        <?php
                                        if ($_SESSION['role'] === 'admin') {
                                        ?>
                                            <li><a href="../admin/">Dashboard</a></li>
                                        <?php
                                        }
                                        ?>
                                    </ul>
                                </li>
                            <?php } else { ?>
                                <li><a href="login.php">Login</a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="canvas__open"><i class="fa fa-bars"></i></div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Shop</h4>
                        <div class="breadcrumb__links">
                            <a href="index.php">Home</a>
                            <span>Shop</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shop Section Begin -->
    <section class="shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="shop__sidebar">
                        <div class="shop__sidebar__accordion mt-5">
                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseOne">Categories</a>
                                    </div>
                                    <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__categories">
                                                <ul class="nice-scroll">
                                                    <?php while ($categories_data = mysqli_fetch_array($categories)) { ?>
                                                        <a href="shop.php?category=<?php echo $categories_data['category_name']; ?>">
                                                            <li style="color: #b7b7b7;" onmouseover="this.style.color='black'" onmouseout="this.style.color='#b7b7b7'"><?php echo $categories_data['category_name']; ?></li>
                                                        </a>
                                                    <?php } ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseTwo">Branding</a>
                                    </div>
                                    <div id="collapseTwo" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__brand">
                                                <ul>
                                                    <?php while ($brand_data = mysqli_fetch_array($brand)) { ?>
                                                        <a href="shop.php?brand=<?php echo $brand_data['brand_name']; ?>">
                                                            <li style="color: #b7b7b7;" onmouseover="this.style.color='black'" onmouseout="this.style.color='#b7b7b7'"><?php echo $brand_data['brand_name']; ?></li>
                                                        </a>
                                                    <?php } ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <h3 style="margin-top: 50px; text-align:center">Product</h3>
                    <div class="row mt-3">

                        <?php
                        if ($countdata == 0) {
                        ?>
                            <div class="col-lg-12">
                                <div class="alert alert-danger" style="text-align: center;" role="alert">
                                    No product found!
                                </div>
                            </div>
                        <?php
                        }
                        ?>

                        <?php
                        $count = 0;
                        while ($data = mysqli_fetch_array($query)) {
                            if ($count % 3 == 0) {
                                echo '</div><div class="row mt-3">';
                            }
                        ?>
                            <div class="col-lg-4">
                                <div class="card h-100">
                                    <img class="card-img-top" src="../admin/assets/img/<?php echo $data['image']; ?>" alt="..." style="width: 100%; height: 200px;" />
                                    <div class="product__item__text text-center">
                                        <h5><?php echo $data['product_name']; ?></h5>
                                        <div class="rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <h5>Rp. <?php echo number_format($data['price'], 0, ',', '.'); ?></h5>
                                        <div class="product__color__select">
                                            <label for="pc-1">
                                                <input type="radio" id="pc-1">
                                            </label>
                                            <label class="active black" for="pc-2">
                                                <input type="radio" id="pc-2">
                                            </label>
                                            <label class="grey" for="pc-3">
                                                <input type="radio" id="pc-3">
                                            </label>
                                        </div>
                                    </div>
                                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                    </div>
                                </div>
                            </div>
                        <?php
                            $count++;
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__logo">
                            <a href="index.php"><img src="../admin/assets/img/mafstore3.png" alt=""></a>
                        </div>
                        <p>At Mafstore, it's all about you!. You're not just a customer, you're the heartbeat of our unique style journey.</p>
                        <a href="#"><img src="img/payment.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-2 offset-lg-1 col-md-3 col-sm-6">
                    <div class="footer__widget">
                        <h6>Shopping</h6>
                        <ul>
                            <li><a href="#">Clothing Store</a></li>
                            <li><a href="#">Trending Shoes</a></li>
                            <li><a href="#">Accessories</a></li>
                            <li><a href="#">Sale</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <div class="footer__widget">
                        <h6>Shopping</h6>
                        <ul>
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">Payment Methods</a></li>
                            <li><a href="#">Delivary</a></li>
                            <li><a href="#">Return & Exchanges</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 offset-lg-1 col-md-6 col-sm-6">
                    <div class="footer__widget">
                        <h6>NewLetter</h6>
                        <div class="footer__newslatter">
                            <p>Be the first to know about new arrivals, look books, sales & promos!</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="footer__copyright__text">
                        <p>Copyright ©
                            <script>
                                document.write(new Date().getFullYear());
                            </script>
                            <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="index.php" target="_blank"><strong><span>MafStore</span></strong> </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery.nicescroll.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>

    <script>
        var prevScrollpos = window.pageYOffset;

        window.onscroll = function() {
            var currentScrollPos = window.pageYOffset;

            if (prevScrollpos > currentScrollPos) {
                document.querySelector('.header').style.top = '0';
            } else {
                document.querySelector('.header').style.top = '-100px';
            }

            prevScrollpos = currentScrollPos;
        }
    </script>
</body>

</html>