<?php
include '../connection.php';

#create barang keluar
if (isset($_POST['barangkeluar'])) {
    $barang = $_POST['barang'];
    $penerima = $_POST['penerima'];
    $qty = $_POST['qty'];

    $cekstocksekarang = mysqli_query($conn, "SELECT * FROM stock WHERE id_barang = '$barang'");
    $ambildatanya = mysqli_fetch_array($cekstocksekarang);

    $stocksekarang = $ambildatanya['stock'];

    if ($stocksekarang >= $qty) {

        $tambahkanquantity = $stocksekarang - $qty;

        $addtokeluar = mysqli_query($conn, "INSERT INTO keluar (id_barang, penerima, qty) VALUES ('$barang', '$penerima','$qty')");
        $updatestokmasuk = mysqli_query($conn, "UPDATE stock SET stock = '$tambahkanquantity' WHERE id_barang = '$barang'");
        if ($addtokeluar && $updatestokmasuk) {
            header('location:index_keluar.php?barangkeluar_success=true');
        } else {
            header('location:index_keluar.php?barangkeluar_success=false');
        }
    } else {
        echo
        '<script>window.location.href = "index_keluar.php?barangkeluar_success=stock_not_enough";</script>';
    }
}

#edit barang keluar
if (isset($_POST['updatebarangkeluar'])) {
    $idk = $_POST['idk'];
    $penerima = $_POST['penerima'];
    $qty = $_POST['qty'];

    $qtyskrg = mysqli_query($conn, "SELECT * FROM keluar WHERE id_keluar = '$idk'");
    $qtynya = mysqli_fetch_array($qtyskrg);
    $qty_sekarang = $qtynya['qty'];

    $id_barang = $qtynya['id_barang'];
    $lihatstock = mysqli_query($conn, "SELECT stock FROM stock WHERE id_barang = '$id_barang'");
    $stocknya = mysqli_fetch_array($lihatstock);
    $stock_sekarang = $stocknya['stock'];

    $selisih_qty = $qty - $qty_sekarang;


    if ($selisih_qty <= $stock_sekarang) {
        $stok_setelah_update = $stock_sekarang - $selisih_qty;

        $kurangistocknya = mysqli_query($conn, "UPDATE stock SET stock = '$stok_setelah_update' WHERE id_barang = '$id_barang'");
        $updatenya = mysqli_query($conn, "UPDATE keluar SET qty = '$qty', penerima = '$penerima' WHERE id_keluar = '$idk'");

        if ($kurangistocknya && $updatenya) {
            header('location:index_keluar.php?updatebarangkeluar_success=true');
        } else {
            header('location:index_keluar.php?updatebarangkeluar_success=false');
        }
    } else {
        echo
        '<script>window.location.href = "index_keluar.php?barangkeluar_success=stock_not_enough";</script>';
    }
}

#delete barang keluar
if (isset($_GET['deletebarangkeluar'])) {
    $aksi = $_GET['aksi'];
    $idk = $_GET['idk'];
    $qty = $_GET['quantity'];

    $getdatastock = mysqli_query($conn, "SELECT * FROM stock WHERE id_barang = '$aksi'");
    $data = mysqli_fetch_array($getdatastock);
    $stok = $data['stock'];

    $selisih = $stok + $qty;

    $update = mysqli_query($conn, "UPDATE stock SET stock = '$selisih' WHERE id_barang = '$aksi'");
    $hapusdata = mysqli_query($conn, "DELETE FROM keluar WHERE id_keluar = '$idk'");
    if ($update && $hapusdata) {
        header('location:index_keluar.php?deletebarangkeluar_success=true');
    } else {
        header('location:index_keluar.php?deletebarangkeluar_success=false');
    }
}
