<?php
include '../connection.php';

#create barang
if (isset($_POST['add'])) {
    $brand_name = $_POST['brand_name'];

    $addtotable = mysqli_query($conn, "INSERT INTO brands (brand_name) VALUES ('$brand_name')");
    if ($addtotable) {
        header('location:brand.php?add_success=true');
    } else {
        header('location:brand.php?add_success=false');
    }
}

#update barang
if (isset($_POST['update'])) {
    $aksi = $_POST['aksi'];
    $brand_name = $_POST['brand_name'];

    $update = mysqli_query($conn, "UPDATE brands SET brand_name = '$brand_name' WHERE id = '$aksi'");
    if ($update) {
        header('location:brand.php?update_success=true');
    } else {
        header('location:brand.php?update_success=false');
    }
}

#delete barang
if (isset($_GET['delete'])) {
    $aksi = $_GET['aksi'];

    $hapus = mysqli_query($conn, "DELETE FROM brands WHERE id = '$aksi'");
    if ($hapus) {
        header('location:brand.php?delete_success=true');
    } else {
        header('location:brand.php?delete_success=false');
    }
}
