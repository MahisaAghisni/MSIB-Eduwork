<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hitung Volume Bangun Ruang</title>
</head>

<body>
    <h2>Hitung Volume Bangun Ruang</h2>

    <!-- Kubus -->
    <h3>Kubus</h3>
    <?php
    $sisi = 3;
    $volume = $sisi * $sisi * $sisi;
    echo "Panjang Sisi: " . $sisi . " cm<br>";
    echo "Volume: " . $volume . " cm<sup>3</sup><br>";
    ?>

    <!-- Balok -->
    <h3>Balok</h3>
    <?php
    $panjang = 8;
    $lebar = 6;
    $tinggi = 4;
    $volume = $panjang * $lebar * $tinggi;
    echo "Panjang: " . $panjang . " cm<br>";
    echo "Lebar: " . $lebar . " cm<br>";
    echo "Tinggi: " . $tinggi . " cm<br>";
    echo "Volume: " . $volume . " cm<sup>3</sup><br>";
    ?>

    <!-- Tabung -->
    <h3>Tabung</h3>
    <?php
    $jariJari = 5;
    $tinggiTabung = 10;
    $volume = M_PI * $jariJari * $jariJari * $tinggiTabung;
    echo "Jari-jari Lingkaran Alas: " . $jariJari . " cm<br>";
    echo "Tinggi Tabung: " . $tinggiTabung . " cm<br>";
    echo "Volume: " . round($volume, 2) . " cm<sup>3</sup><br>";
    ?>
</body>

</html>