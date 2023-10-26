<?php
include('connection.php');
$query = mysqli_query($conn, "SELECT * FROM stock");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Sesi 29</title>

    <style>
        body {
            margin: 0;
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
        }

        .container {
            padding: 20px;
        }

        #side_nav {
            background: #444444;
            min-width: 250px;
            max-width: 250px;
            transition: all 0.3s;
        }

        .content {
            min-height: 100vh;
            width: 100%;
        }

        hr.h-color {
            background: #eee;
        }

        .sidebar li.active {
            background: #eee;
            border-radius: 8px;
        }

        .sidebar li.active a,
        .sidebar li.active a:hover {
            color: #444444;
        }

        .sidebar li a {
            color: #fff;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            background-color: #fff;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            padding: 10px;
            text-align: center;
        }

        th {
            font-weight: bold;
            color: #fff;
        }

        tbody tr:nth-child(odd) {
            background-color: #F1EFEF;
        }

        tbody tr:hover {
            background-color: #D3D3D3;
        }
    </style>

</head>

<body>
    <div class="main-container d-flex">
        <div class="sidebar" id="side_nav">
            <div class="header-box px-2 pt-3 pb-4 d-flex justify-content-between">
                <h1 class="fs-4"><span class="text-white">Mahisa Aghisni Fadhli</span></h1>
                <button class="btn d-md-none d-block close-btn px-1 py-0 text-white"><i class="fal fa-stream"></i></button>
            </div>

            <ul class="list-unstyled px-2">
                <li class="active"><a href="#" class="text-decoration-none px-3 py-2 d-block"><i class="fal fa-home"></i> Stock</a></li>
            </ul>
        </div>
        <div class="content">
            <nav class="navbar navbar-expand-md" style="background-color: #444444;">
                <div class="container-fluid">
                    <div class="d-flex justify-content-between d-md-none d-block">
                        <button class="btn px-1 py-0 open-btn me-2"><i class="fal fa-stream"></i></button>
                        <a class="navbar-brand fs-4" href="#"><span class="bg-dark rounded px-2 py-0 text-white">CL</span></a>

                    </div>
                    <button class="navbar-toggler p-0 border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fal fa-bars"></i>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                        <ul class="navbar-nav mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#" style="color: #fff;">Profile</a>
                            </li>

                        </ul>

                    </div>
                </div>
            </nav>

            <div class="dashboard-content px-3 pt-4">
                <table class="table table-bordered table-striped">
                    <thead class="table" style="background-color: #444444;">
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Deskripsi</th>
                            <th>Stock</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $datastock = mysqli_query($conn, "SELECT * FROM stock");
                        $i = 1;
                        while ($ambildata = mysqli_fetch_array($datastock)) {
                            $namabarang = $ambildata['nama_barang'];
                            $deskripsi = $ambildata['deskripsi'];
                            $stock = $ambildata['stock'];
                            $aksi = $ambildata['id_barang'];
                        ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $namabarang; ?></td>
                                <td><?= $deskripsi; ?></td>
                                <td><?= $stock; ?></td>
                                <td>
                                    <a href="edit.php?id=<?= $aksi; ?>" class="btn btn-warning">Edit</a>
                                    <a href="delete.php?id=<?= $aksi; ?>" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        <?php
                        };
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>