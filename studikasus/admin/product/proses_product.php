<?php
include '../connection.php';

#create product
if (isset($_POST['add'])) {
    $product_name = $_POST['product_name'];
    $category_id = $_POST['category'];
    $brand_id = $_POST['brands'];
    $product_price = $_POST['price'];
    $product_stock = $_POST['stock'];
    $product_description = $_POST['description'];
    $nama_file = $_FILES['image']['name'];
    $folder = '../assets/img/';
    move_uploaded_file($folder, $nama_file);


    $addtotable = mysqli_query($conn, "INSERT INTO product (category_id, brands_id, product_name, image, description, price, stock)  VALUES ('$category_id', 
    '$brand_id','$product_name','$nama_file','$product_description', '$product_price', '$product_stock')");


    if ($addtotable) {
        header('location:product.php?add_success=true');
    } else {
        header('location:product.php?add_success=false');
    }
}

#edit product
if (isset($_POST['update'])) {
    $aksi = $_POST['aksi'];
    $product_name = $_POST['product_name'];
    $category_id = $_POST['category'];
    $brand_id = $_POST['brands'];
    $product_price = $_POST['price'];
    $product_stock = $_POST['stock'];
    $product_description = $_POST['description'];
    $oldImage = $_POST['oldImage'];

    if ($_FILES['image']['name'] == "") {
        $nama_file = $oldImage;
    } else {
        unlink('../assets/img/' . $oldImage);
        $nama_file = $_FILES['image']['name'];
        $folder = '../assets/img/';
        move_uploaded_file($folder, $nama_file);
    }

    $update = mysqli_query($conn, "UPDATE product set category_id = '$category_id', brands_id = '$brand_id', product_name = '$product_name', image = '$nama_file', description = '$product_description', price = '$product_price', stock = '$product_stock' WHERE id = '$aksi'");

    if ($update) {
        header('location:product.php?update_success=true');
    } else {
        header('location:product.php?update_success=false');
    }
}

#delete barang
if (isset($_GET['delete'])) {
    $aksi = $_GET['aksi'];

    $hapus = mysqli_query($conn, "DELETE FROM product WHERE id = '$aksi'");
    if ($hapus) {
        header('location:product.php?delete_success=true');
    } else {
        header('location:product.php?delete_success=false');
    }
}
