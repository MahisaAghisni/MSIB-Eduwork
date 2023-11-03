<?php
include '../connection.php';

#create barang masuk
if (isset($_POST['barangmasuk'])) {
    $barang = $_POST['barang'];
    $keterangan = $_POST['keterangan'];
    $qty = $_POST['qty'];

    $cekstocksekarang = mysqli_query($conn, "SELECT * FROM stock WHERE id_barang = '$barang'");
    $ambildatanya = mysqli_fetch_array($cekstocksekarang);

    $stocksekarang = $ambildatanya['stock'];
    $tambahkanquantity = $stocksekarang + $qty;


    $addtomasuk = mysqli_query($conn, "INSERT INTO masuk (id_barang, keterangan, qty) VALUES ('$barang', '$keterangan','$qty')");
    $updatestokmasuk = mysqli_query($conn, "UPDATE stock SET stock = '$tambahkanquantity' WHERE id_barang = '$barang'");
    if ($addtomasuk && $updatestokmasuk) {
        header('location:index_masuk.php?barangmasuk_success=true');
    } else {
        header('location:index_masuk.php?barangmasuk_success=false');
    }
}

#edit barang masuk
if (isset($_POST['updatebarangmasuk'])) {
    $aksi = $_POST['aksi'];
    $idm = $_POST['idm'];
    $keterangan = $_POST['keterangan'];
    $qty = $_POST['qty'];

    $lihatstock = mysqli_query($conn, "SELECT * FROM stock WHERE id_barang = '$aksi'");
    $stocknya = mysqli_fetch_array($lihatstock);
    $stockskrg = $stocknya['stock'];

    $qtyskrg = mysqli_query($conn, "SELECT * FROM masuk WHERE id_masuk = '$idm'");
    $qtynya = mysqli_fetch_array($qtyskrg);
    $qtyskrg = $qtynya['qty'];

    if ($qty > $qtyskrg) {
        $selisih = $qty - $qtyskrg;
        $tambahin = $stockskrg + $selisih;
        $tambahinstocknya = mysqli_query($conn, "UPDATE stock SET stock = '$tambahin' WHERE id_barang = '$aksi'");
        $updatenya = mysqli_query($conn, "UPDATE masuk SET qty = '$qty', keterangan = '$keterangan' WHERE id_masuk = '$idm'");

        if ($tambahinstocknya && $updatenya) {
            header('location:index_masuk.php?updatebarangmasuk_success=true');
        } else {
            header('location:index_masuk.php?updatebarangmasuk_success=false');
        }
    } else {
        $selisih = $qtyskrg - $qty;
        $tambahin = $stockskrg - $selisih;
        $tambahinstocknya = mysqli_query($conn, "UPDATE stock SET stock = '$tambahin' WHERE id_barang = '$aksi'");
        $updatenya = mysqli_query($conn, "UPDATE masuk SET qty = '$qty', keterangan = '$keterangan' WHERE id_masuk = '$idm'");

        if ($tambahinstocknya && $updatenya) {
            header('location:index_masuk.php?updatebarangmasuk_success=true');
        } else {
            header('location:index_masuk.php?updatebarangmasuk_success=false');
        }
    }
}

#delete barang masuk
if (isset($_GET['deletebarangmasuk'])) {
    $aksi = $_GET['aksi'];
    $idm = $_GET['idm'];
    $qty = $_GET['quantity'];

    $getdatastock = mysqli_query($conn, "SELECT * FROM stock WHERE id_barang = '$aksi'");
    $data = mysqli_fetch_array($getdatastock);
    $stok = $data['stock'];

    $selisih = $stok - $qty;

    $update = mysqli_query($conn, "UPDATE stock SET stock = '$selisih' WHERE id_barang = '$aksi'");
    $hapusdata = mysqli_query($conn, "DELETE FROM masuk WHERE id_masuk = '$idm'");
    if ($update && $hapusdata) {
        header('location:index_masuk.php?deletebarangmasuk_success=true');
    } else {
        header('location:index_masuk.php?deletebarangmasuk_success=false');
    }
}
