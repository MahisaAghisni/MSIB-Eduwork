<?php
include('proses.php');
$query = mysqli_query($conn, "SELECT * FROM stock");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="../css/style.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.9.0/dist/sweetalert2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />

    <title>Sesi 29</title>

</head>

<body>
    <div class="main-container d-flex">
        <div class="sidebar" id="side_nav">
            <div class="header-box px-2 pt-3 pb-4 d-flex justify-content-between">
                <h1 class="fs-4"><span class="text-white">Mahisa Aghisni Fadhli</span></h1>
            </div>

            <ul class="list-unstyled px-2">
                <li class="active"><a href="index.php" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-warehouse mx-2"></i>Stock</a></li>
                <li><a href="../barangmasuk/index_masuk.php" class="text-decoration-none px-3 py-2 d-block"><i class="bi bi-graph-up-arrow mx-2"></i>Barang Masuk</a></li>
                <li><a href="../barangkeluar/index_keluar.php" class="text-decoration-none px-3 py-2 d-block"><i class="bi bi-graph-down-arrow mx-2"></i>Barang Keluar</a></li>
            </ul>
        </div>
        <div class="content">
            <nav class="navbar navbar-expand-md" style="background-color: #444444;">
                <div class="container-fluid">
                    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                        <form class="d-flex">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-primary" type="submit"><i class="bi bi-search"></i></button>
                        </form>
                        <ul class="navbar-nav mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#" style="color: #fff;">Profile</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="dashboard-content px-3 pt-4">
                <h2>Stock Barang</h2>

                <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah Barang</button>

                <!-- create modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Tambah Barang</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="post">
                                    <div class="mb-3">
                                        <label for="namabarang" class="col-form-label">Nama Barang:</label>
                                        <input type="text" name="namabarang" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="deskripsi" class="col-form-label">Deskripsi:</label>
                                        <textarea name="deskripsi" class="form-control" required></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="stock" class="col-form-label">Stock:</label>
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
                <table id="myTable" class="table table-bordered table-striped">
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
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit<?= $aksi; ?>">Edit</button>
                                    <button type="button" class="btn btn-danger" onclick="deleteItem(<?= $aksi; ?>)">Delete</button>
                                </td>
                            </tr>

                            <!-- Edit Modal -->
                            <div class="modal fade" id="edit<?= $aksi; ?>">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit Barang</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post">
                                                <div class="mb-3">
                                                    <label for="namabarang" class="col-form-label">Nama Barang:</label>
                                                    <input type="text" name="namabarang" class="form-control" value="<?= $namabarang; ?>" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="deskripsi" class="col-form-label">Deskripsi:</label>
                                                    <textarea name="deskripsi" class="form-control" required><?= $deskripsi; ?></textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="stock" class="col-form-label">Stock:</label>
                                                    <input type="number" name="stock" class="form-control" value="<?= $stock; ?>" required> </input>
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.9.0/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>

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
                title: 'Apakah anda yakin untuk menghapus <?= $namabarang; ?>?',
                text: "Anda tidak akan dapat mengembalikan ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, Saya yakin!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = `proses.php?delete=1&aksi=${itemId}`;
                }
            });
        }
    </script>

</body>

</html>