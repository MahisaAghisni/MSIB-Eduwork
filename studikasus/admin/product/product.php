<?php
include('proses_product.php');
$query = mysqli_query($conn, "SELECT * FROM product");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Product</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="../assets/img/mafstore3.png" rel="icon">
    <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="../assets/css/style.css" rel="stylesheet">

    <!-- Eksternal -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.9.0/dist/sweetalert2.min.css" rel="stylesheet">


<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <!-- Start Logo -->
        <div class="d-flex align-items-center justify-content-between">
            <a href="../index.php" class="logo d-flex align-items-center">
                <img src="../assets/img/mafstore3.png" alt="">
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
                        <img src="../assets/img/profile.png" alt="Profile" class="rounded-circle">
                        <span class="d-none d-md-block dropdown-toggle ps-2">Admin</span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="../../user/index.php">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Log Out</span>
                            </a>
                        </li>
                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav>
        <!-- End Icons Navigation -->

    </header>
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">
        <ul class="sidebar-nav" id="sidebar-nav">

            <!-- dashboard -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="../index.php">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <!-- end dashboard -->

            <!-- product -->
            <li class="nav-item">
                <a class="nav-link" href="product.php">
                    <i class="bi bi-box2"></i>
                    <span>Product</span>
                </a>
            </li>
            <!-- end product -->

            <!-- category -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="../category/category.php">
                    <i class="bi bi-clipboard2-data"></i>
                    <span>Category</span>
                </a>
            </li>
            <!-- end category -->

            <!-- brand -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="../brand/brand.php">
                    <i class="bi bi-tags"></i>
                    <span>Brands</span>
                </a>
            </li>
            <!-- end brand -->

        </ul>
    </aside>
    <!-- End Sidebar-->

    <!-- Start #main -->
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Product</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Product</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="card">
                <div class="card-header">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Tambah Product
                    </button>

                    <!-- Create Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Product</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" enctype="multipart/form-data">
                                        <div class="mb-3">
                                            <label for="product_name" class="col-form-label">Nama Product</label>
                                            <input type="text" name="product_name" class="form-control" required>
                                        </div>
                                        <select class="form-select mb-3" name="brands" aria-label="Default select example">
                                            <option selected>Pilih Brands</option>
                                            <?php
                                            $ambildata = mysqli_query($conn, "select * from brands");
                                            while ($fetcharray = mysqli_fetch_array($ambildata)) {
                                                $brandname = $fetcharray['brand_name'];
                                                $brandid = $fetcharray['id'];
                                            ?>
                                                <option value="<?= $brandid; ?>"><?= $brandname; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                        <select class="form-select mb-3" name="category" aria-label="Default select example">
                                            <option selected>Pilih Category</option>
                                            <?php
                                            $ambildata = mysqli_query($conn, "select * from category");
                                            while ($fetcharray = mysqli_fetch_array($ambildata)) {
                                                $categoryname = $fetcharray['category_name'];
                                                $categoryid = $fetcharray['id'];
                                            ?>
                                                <option value="<?= $categoryid; ?>"><?= $categoryname; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                        <div class="mb-3">
                                            <label for="image" class="col-form-label">Image</label>
                                            <input type="file" name="image" class="form-control" required></input>
                                        </div>
                                        <div class="mb-3">
                                            <label for="description" class="col-form-label">Deskripsi</label>
                                            <textarea name="description" class="form-control" required></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="price" class="col-form-label">Price</label>
                                            <input type="number" name="price" class="form-control" required></input>
                                        </div>
                                        <div class="mb-3">
                                            <label for="stock" class="col-form-label">Stock</label>
                                            <input type="number" name="stock" class="form-control" required></input>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary" name="add">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered display" id="myTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Product</th>
                                    <th>Nama Brand</th>
                                    <th>Nama Category</th>
                                    <th>Image</th>
                                    <th>Deskripsi</th>
                                    <th>Price</th>
                                    <th>Stock</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $datastock = mysqli_query($conn, "SELECT a.*, b.brand_name, c.category_name FROM product a
                                JOIN brands b ON a.brands_id = b.id
                                JOIN category c ON a.category_id = c.id ");
                                $i = 1;
                                while ($ambildata = mysqli_fetch_array($datastock)) {
                                    $idp = $ambildata['id'];
                                    $product_name = $ambildata['product_name'];
                                    $brand_name = $ambildata['brand_name'];
                                    $brand = $ambildata['brands_id'];
                                    $category_name = $ambildata['category_name'];
                                    $category = $ambildata['category_id'];
                                    $image = $ambildata['image'];
                                    $description = $ambildata['description'];
                                    $price = $ambildata['price'];
                                    $stock = $ambildata['stock'];
                                    $aksi = $ambildata['id'];
                                ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $product_name; ?></td>
                                        <td><?= $brand_name; ?></td>
                                        <td><?= $category_name; ?></td>
                                        <td><img src="../assets/img/<?= $image; ?>" width="100px"></td>
                                        <td><?= $description; ?></td>
                                        <td><?= $price; ?></td>
                                        <td><?= $stock; ?></td>
                                        <td>
                                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit<?= $aksi; ?>">Edit</button>
                                            <button type="button" class="btn btn-danger" onclick="deleteItem(<?= $aksi; ?>)">Delete</button>
                                        </td>
                                    </tr>

                                    <!-- Edit Modal -->
                                    <div class="modal fade" id="edit<?= $aksi; ?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit Product</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="post" enctype="multipart/form-data">
                                                        <input type="hidden" name="oldImage" value="<?= $image; ?>">
                                                        <div class="mb-3">
                                                            <label for="product_name" class="col-form-label">Nama Product</label>
                                                            <input type="text" name="product_name" class="form-control" value="<?= $product_name; ?>" required>
                                                        </div>
                                                        <select class="form-select mb-3" name="brands" aria-label="Default select example">
                                                            <option selected>Pilih Brands</option>
                                                            <?php
                                                            $ambildata = mysqli_query($conn, "select * from brands");
                                                            while ($fetcharray = mysqli_fetch_array($ambildata)) {
                                                                $brandname = $fetcharray['brand_name'];
                                                                $brandid = $fetcharray['id'];
                                                            ?>
                                                                <option value="<?= $brandid; ?>" <?php if ($brandid == $brand) echo "selected"; ?>><?= $brandname; ?></option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                        <select class="form-select mb-3" name="category" aria-label="Default select example">
                                                            <option selected>Pilih Category</option>
                                                            <?php
                                                            $ambildata = mysqli_query($conn, "select * from category");
                                                            while ($fetcharray = mysqli_fetch_array($ambildata)) {
                                                                $categoryname = $fetcharray['category_name'];
                                                                $categoryid = $fetcharray['id'];
                                                            ?>
                                                                <option value="<?= $categoryid; ?>" <?php if ($categoryid == $category) echo "selected"; ?>><?= $categoryname; ?></option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                        <div class="mb-3">
                                                            <label for="image" class="col-form-label">Image</label>
                                                            <input type="file" name="image" class="form-control" required></input>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="description" class="col-form-label">Deskripsi</label>
                                                            <textarea name="description" class="form-control" required><?= $description ?></textarea>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="price" class="col-form-label">Price</label>
                                                            <input type="number" name="price" class="form-control" value="<?= $price ?>" required></input>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="stock" class="col-form-label">Stock</label>
                                                            <input type="number" name="stock" class="form-control" value="<?= $stock ?>" required></input>
                                                        </div>
                                                        <input type="hidden" name="aksi" value="<?= $aksi; ?>">
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary" name="update">Update</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                };
                                ?>
                            </tbody>
                        </table>
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
    <script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/chart.js/chart.umd.js"></script>
    <script src="../assets/vendor/echarts/echarts.min.js"></script>
    <script src="../assets/vendor/quill/quill.min.js"></script>
    <script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="../assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="../assets/vendor/php-email-form/validate.js"></script>


    <!-- Template Main JS File -->
    <script src="../assets/js/main.js"></script>

    <!-- Eksternal -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.9.0/dist/sweetalert2.all.min.js"></script>


    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });

        const urlParams = new URLSearchParams(window.location.search);
        const addSuccess = urlParams.get('add_success');
        const updateSuccess = urlParams.get('update_success');
        const deleteSuccess = urlParams.get('delete_success');

        // sweetalert2 tambah barang
        if (addSuccess === 'true') {
            Swal.fire('Berhasil!', 'Data Berhasil ditambahkan.', 'success');
        } else if (addSuccess === 'false') {
            Swal.fire('Error', 'Data Gagal ditambahkan.', 'error');
        }

        // sweetalert2 edit barang
        if (updateSuccess === 'true') {
            Swal.fire('Berhasil!', 'Data Berhasil diupdate.', 'success');
        } else if (updateSuccess === 'false') {
            Swal.fire('Error', 'Data Gagal diupdate.', 'error');
        }

        // sweetalert2 delete barang
        if (deleteSuccess === 'true') {
            Swal.fire('Berhasil!', 'Data Berhasil dihapus.', 'success');
        } else if (deleteSuccess === 'false') {
            Swal.fire('Error', 'Data Gagal dihapus.', 'error');
        }

        function deleteItem(itemId) {
            Swal.fire({
                title: 'Apakah anda yakin untuk menghapus <?= $product_name; ?>?',
                text: "Anda tidak akan dapat mengembalikan ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, Saya yakin!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = `proses_product.php?delete=1&aksi=${itemId}`;
                }
            });
        }
    </script>

</body>

</html>