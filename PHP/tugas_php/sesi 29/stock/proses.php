<?php
include '../connection.php';

#create barang
if (isset($_POST['add'])) {
    $namabarang = $_POST['namabarang'];
    $deskripsi = $_POST['deskripsi'];
    $stock = $_POST['stock'];

    $addtotable = mysqli_query($conn, "INSERT INTO stock (nama_barang, deskripsi, stock) VALUES ('$namabarang', '$deskripsi', '$stock')");
    if ($addtotable) {
        header('location:index.php?add_success=true');
    } else {
        header('location:index.php?add_success=false');
    }
}

#update stock barang
if (isset($_POST['update'])) {
    $aksi = $_POST['aksi'];
    $namabarang = $_POST['namabarang'];
    $deskripsi = $_POST['deskripsi'];
    $stock = $_POST['stock'];

    $update = mysqli_query($conn, "UPDATE stock SET nama_barang = '$namabarang', deskripsi = '$deskripsi', stock = '$stock' WHERE id_barang = '$aksi'");
    if ($update) {
        header('location:index.php?update_success=true');
    } else {
        header('location:index.php?update_success=false');
    }
}

#delete stock barang
if (isset($_GET['delete'])) {
    $aksi = $_GET['aksi'];

    $hapus = mysqli_query($conn, "DELETE FROM stock WHERE id_barang = '$aksi'");
    if ($hapus) {
        header('location:index.php?delete_success=true');
    } else {
        header('location:index.php?delete_success=false');
    }
}
