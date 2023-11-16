<?php
include('cek.php');
include 'connection.php';

$queryproduct = mysqli_query($conn, "SELECT * FROM product");
$jumlahproduct = mysqli_num_rows($queryproduct);

$querycategory = mysqli_query($conn, "SELECT * FROM category");
$jumlahcategory = mysqli_num_rows($querycategory);

$querybrands = mysqli_query($conn, "SELECT * FROM brands");
$jumlahbrands = mysqli_num_rows($querybrands);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dashboard</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/mafstore3.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">


<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <!-- Start Logo -->
        <div class="d-flex align-items-center justify-content-between">
            <a href="index.php" class="logo d-flex align-items-center">
                <img src="assets/img/mafstore3.png" alt="">
                <span class="d-none d-lg-block">MafStore</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div>
        <!-- End Logo -->

        <!-- Start Search Bar -->
        <div class="search-bar">
            <form class="search-form d-flex align-items-center" method="POST" action="#">
                <input type="text" name="query" placeholder="Search" title="Enter search keyword">
                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
            </form>
        </div>
        <!-- End Search Bar -->

        <!-- Start Icons Navigation -->
        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">
                <li class="nav-item dropdown pe-3">
                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $_SESSION['nama_user']; ?></span>
                    </a>

                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="../user/index.php">
                                <i class="bi bi-person"></i>
                                <span>Home</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="../user/login.php">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Log Out</span>
                            </a>
                        </li>
                    </ul>

                </li>
            </ul>
        </nav>
        <!-- End Icons Navigation -->

    </header>
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">
        <ul class="sidebar-nav" id="sidebar-nav">

            <!-- Start Dashboard Nav -->
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <!-- End Dashboard Nav -->

            <!-- Start Profile Page Nav -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="product/product.php">
                    <i class="bi bi-box2"></i>
                    <span>Product</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="category/category.php">
                    <i class="bi bi-clipboard2-data"></i>
                    <span>Category</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="brand/brand.php">
                    <i class="bi bi-tags"></i>
                    <span>Brands</span>
                </a>
            </li>
            <!-- End Profile Page Nav -->
        </ul>
    </aside>
    <!-- End Sidebar-->

    <!-- Start #main -->
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">
                <div class="col-lg">
                    <div class="row">
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card sales-card">
                                <div class="card-body">
                                    <h5 class="card-title">Product</h5>
                                    <div class="d-flex align-items-center">
                                        <a href="product/product.php">
                                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                <i class="bi bi-box2"></i>
                                            </div>
                                        </a>
                                        <div class="ps-3">
                                            <h6><?php echo $jumlahproduct; ?></h6>
                                            <span class="text-success small pt-1 fw-bold"><?php echo $jumlahproduct; ?></span> <span class="text-muted small pt-2 ps-1">Product yang tersedia</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card sales-card">
                                <div class="card-body">
                                    <h5 class="card-title">Category</h5>
                                    <div class="d-flex align-items-center">
                                        <a href="category/category.php">
                                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                <i class="bi bi-clipboard2-data"></i>
                                            </div>
                                        </a>
                                        <div class="ps-3">
                                            <h6><?php echo $jumlahcategory; ?></h6>
                                            <span class="text-success small pt-1 fw-bold"><?php echo $jumlahcategory; ?></span> <span class="text-muted small pt-2 ps-1">Category yang tersedia</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card sales-card">
                                <div class="card-body">
                                    <h5 class="card-title">Brands</h5>
                                    <div class="d-flex align-items-center">
                                        <a href="brand/brand.php">
                                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                <i class="bi bi-tags"></i>
                                            </div>
                                        </a>
                                        <div class="ps-3">
                                            <h6><?php echo $jumlahbrands; ?></h6>
                                            <span class="text-success small pt-1 fw-bold"><?php echo $jumlahbrands; ?></span> <span class="text-muted small pt-2 ps-1">Brands yang tersedia</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
    <!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>MafStore</span></strong>.
        </div>
    </footer><!-- End Footer -->

    <!-- Vendor JS Files -->
    <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chart.js/chart.umd.js"></script>
    <script src="assets/vendor/echarts/echarts.min.js"></script>
    <script src="assets/vendor/quill/quill.min.js"></script>
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>