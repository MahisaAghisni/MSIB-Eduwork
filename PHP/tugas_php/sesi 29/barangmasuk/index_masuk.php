<?php
include('proses_masuk.php');
$query = mysqli_query($conn, "SELECT * FROM masuk");
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

    <title>Sesi 29</title>

</head>

<body>
    <div class="main-container d-flex">
        <div class="sidebar" id="side_nav">
            <div class="header-box px-2 pt-3 pb-4 d-flex justify-content-between">
                <h1 class="fs-4"><span class="text-white">Mahisa Aghisni Fadhli</span></h1>
            </div>

            <ul class="list-unstyled px-2">
                <li><a href="../stock/index.php" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-warehouse mx-2"></i>Stock</a></li>
                <li class="active"><a href="index_masuk.php" class="text-decoration-none px-3 py-2 d-block"><i class="bi bi-graph-up-arrow mx-2"></i>Barang Masuk</a></li>
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
                <h2>Barang Masuk</h2>

                <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah Barang Masuk</button>

                <!-- create modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Tambah Barang Masuk</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="post">
                                    <select class="form-select" name="barang" aria-label="Default select example">
                                        <?php
                                        $ambildata = mysqli_query($conn, "select * from stock");
                                        while ($fetcharray = mysqli_fetch_array($ambildata)) {
                                            $namabarangnya = $fetcharray['nama_barang'];
                                            $idbarangnya = $fetcharray['id_barang'];
                                        ?>
                                            <option value="<?= $idbarangnya; ?>"><?= $namabarangnya; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <div class="mb-3">
                                        <label for="qty" class="col-form-label">Quantity:</label>
                                        <input type="number" name="qty" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="keterangan" class="col-form-label">Keterangan:</label>
                                        <textarea name="keterangan" class="form-control" required></textarea>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" name="barangmasuk">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <table class="table table-bordered table-striped">
                    <thead class="table" style="background-color: #444444;">
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Jumlah</th>
                            <th>Keterangan</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $datastock = mysqli_query($conn, "SELECT * FROM masuk m, stock s WHERE s.id_barang = m.id_barang");
                        $i = 1;
                        while ($ambildata = mysqli_fetch_array($datastock)) {
                            $aksi = $ambildata['id_barang'];
                            $idm = $ambildata['id_masuk'];
                            $namabarang = $ambildata['nama_barang'];
                            $qty = $ambildata['qty'];
                            $keterangan = $ambildata['keterangan'];
                            $tanggal = $ambildata['tanggal'];
                        ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $namabarang; ?></td>
                                <td><?= $qty; ?></td>
                                <td><?= $keterangan; ?></td>
                                <td><?= $tanggal; ?></td>
                                <td>
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit<?= $idm; ?>">
                                        Edit
                                    </button>
                                    <button type="button" class="btn btn-danger" onclick="deleteItem(<?= $idm; ?>)">Delete</button>
                                </td>
                            </tr>

                            <!-- edit modal -->
                            <div class="modal fade" id="edit<?= $idm; ?>">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit Barang Masuk</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post">
                                                <div class="mb-3">
                                                    <label for="qty" class="col-form-label">Quantity:</label>
                                                    <input type="number" name="qty" class="form-control" value="<?= $qty; ?>" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="keterangan" class="col-form-label">Keterangan:</label>
                                                    <textarea name="keterangan" class="form-control" required><?= $keterangan; ?></textarea>
                                                </div>
                                                <input type="hidden" name="aksi" value="<?= $aksi; ?>">
                                                <input type="hidden" name="idm" value="<?= $idm; ?>">
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary" name="updatebarangmasuk">Submit</button>
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
    <script src="js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.9.0/dist/sweetalert2.all.min.js"></script>
    <script>
        const urlParams = new URLSearchParams(window.location.search);
        const barangmasukSuccess = urlParams.get('barangmasuk_success');
        const updatebarangmasukSuccess = urlParams.get('updatebarangmasuk_success');
        const deletebarangmasukSuccess = urlParams.get('deletebarangmasuk_success');

        // sweetalert2 barangmasuk
        if (barangmasukSuccess === 'true') {
            Swal.fire('Berhasil!', 'Data Berhasil ditambahkan.', 'success');
        } else if (barangmasukSuccess === 'false') {
            Swal.fire('Error', 'Data Gagal ditambahkan.', 'error');
        }

        // sweetalert2 updatebarangmasuk
        if (updatebarangmasukSuccess === 'true') {
            Swal.fire('Berhasil!', 'Data Berhasil diupdate.', 'success');
        } else if (updatebarangmasukSuccess === 'false') {
            Swal.fire('Error', 'Data Gagal diupdate.', 'error');
        }

        // sweetalert2 deletebarangmasuk
        if (deletebarangmasukSuccess === 'true') {
            Swal.fire('Berhasil!', 'Data Berhasil dihapus.', 'success');
        } else if (deletebarangmasukSuccess === 'false') {
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
                    window.location.href = `proses_masuk.php?deletebarangmasuk=true&aksi=DELETE&idm=${itemId}`;
                }
            });
        }
    </script>
</body>

</html>