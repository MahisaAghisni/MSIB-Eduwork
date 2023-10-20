<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hitung Luas Bangun Datar</title>
</head>

<body>
    <h2>Hitung Luas Bangun Datar</h2>

    <!-- Data Persegi -->
    <h3>Persegi</h3>
    <?php
    $sisi = 5;
    $hasil = $sisi * $sisi;
    echo "Sisi: " . $sisi . " cm<br>";
    echo "Rumus Luas: s x s <br>";
    echo "Hasil Luas: " . $hasil . " cm <br>";
    ?>

    <!-- Data Persegi Panjang -->
    <h3>Persegi Panjang</h3>
    <?php
    $p = 8;
    $l = 6;
    $hasil = $p * $l;
    echo "Panjang: " . $p . " cm<br>";
    echo "Lebar: " . $l . " cm<br>";
    echo "Rumus Luas: panjang x lebar<br>";
    echo "Hasil Luas: " . $hasil . " cm <br>";
    ?>

    <!-- Data Segitiga -->
    <h3>Segitiga</h3>
    <?php
    $a = 12;
    $t = 8;
    $hasil = 0.5 * $a * $t;
    echo "Alas: " . $a . " cm<br>";
    echo "Tinggi: " . $t . " cm<br>";
    echo "Rumus Luas: 0.5 x alas x tinggi<br>";
    echo "Hasil Luas: " . $hasil . " cm <br>";
    ?>

    <!-- Data Lingkaran -->
    <h3>Lingkaran</h3>
    <?php
    $j = 5;
    $hasil = M_PI * $j * $j;
    echo "Jari-jari: " . $j . " cm<br>";
    echo "Rumus Luas: &pi; x r x r<br>";
    echo "Hasil Luas: " . round($hasil, 2) . " cm <br>";
    ?>

    <!-- Data Belah Ketupat -->
    <h3>Belah Ketupat</h3>
    <?php
    $d1 = 10;
    $d2 = 8;
    $hasil = $d1 * $d2 / 2;
    echo "Diagonal 1: " . $d1 . " cm<br>";
    echo "Diagonal 2: " . $d2 . " cm<br>";
    echo "Rumus Luas: (d1 x d2) / 2<br>";
    echo "Hasil Luas: " . $hasil . " cm <br>";
    ?>
</body>

</html>