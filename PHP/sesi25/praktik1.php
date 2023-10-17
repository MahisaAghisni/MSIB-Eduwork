<?php

$nama = "Mahisa Aghisni Fadhli";
$jenis_kelamin = "Laki-laki";
$tahun_lahir = 2001;
$umur = date('Y') - $tahun_lahir;

if ($jenis_kelamin == "Laki-laki") {
    echo "Selamat pagi tuan $nama";
    echo "<br>";
    echo "Umur anda sekarang $umur tahun";
} else {
    echo "Selamat pagi nyonya $nama";
    echo "<br>";
    echo "Umur anda sekarang $umur tahun";
}
