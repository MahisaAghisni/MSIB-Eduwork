<?php

//Nomor 1
$nilai = 10;

if ($nilai % 2 == 0) {
    echo "$nilai adalah bilangan genap";
} else {
    echo "$nilai adalah bilangan ganjil";
}

//Nomor 2
echo "<br>";

$tahun = 2023;

if (($tahun % 4 == 0 && $tahun % 100 != 0) || $tahun % 400 == 0) {
    echo "$tahun adalah tahun kabisat.";
} else {
    echo "$tahun bukan tahun kabisat.";
}

//Nomor 3
echo "<br>";

$nilai = 100;

if ($nilai >= 90 && $nilai <= 100) {
    echo "Grade A";
} else if ($nilai >= 80 && $nilai < 90) {
    echo "Grade B";
} else if ($nilai >= 70 && $nilai < 80) {
    echo "Grade C";
} else if ($nilai >= 60 && $nilai < 70) {
    echo "Grade D";
} else {
    echo "Grade E";
}
