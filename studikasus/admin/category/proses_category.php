<?php
include '../connection.php';

#create barang
if (isset($_POST['add'])) {
    $category_name = $_POST['category_name'];

    $addtotable = mysqli_query($conn, "INSERT INTO category (category_name)  VALUES ('$category_name')");
    if ($addtotable) {
        header('location:category.php?add_success=true');
    } else {
        header('location:category.php?add_success=false');
    }
}

#update barang
if (isset($_POST['update'])) {
    $aksi = $_POST['aksi'];
    $category_name = $_POST['category_name'];

    $update = mysqli_query($conn, "UPDATE category SET category_name = '$category_name' WHERE id = '$aksi'");
    if ($update) {
        header('location:category.php?update_success=true');
    } else {
        header('location:category.php?update_success=false');
    }
}

#delete barang
if (isset($_GET['delete'])) {
    $aksi = $_GET['aksi'];

    $hapus = mysqli_query($conn, "DELETE FROM category WHERE id = '$aksi'");
    if ($hapus) {
        header('location:category.php?delete_success=true');
    } else {
        header('location:category.php?delete_success=false');
    }
}
