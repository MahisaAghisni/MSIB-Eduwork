<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sesi 26</title>

    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid black;
            padding: 5px;
        }

        th {
            background-color: #eaeaea;
        }

        b {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <h3>Pakai Tabel</h3>
    <table>
        <thead>
            <tr>
                <th><b>Nomor 1</b></th>
                <th><b>Nomor 2</b></th>
                <th><b>Nomor 3</b></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <?php
                    for ($i = 1; $i <= 10; $i++) {
                        $angka = $i;
                        if ($i % 2 == 0) {
                            echo "Angka $angka adalah bilangan genap<br>";
                        } else {
                            echo "Angka $angka adalah bilangan ganjil<br>";
                        }
                    }
                    ?>
                </td>
                <td>
                    <?php
                    for ($tahun = 2000; $tahun <= 2023; $tahun++) {
                        if (($tahun % 4 == 0 && $tahun % 100 != 0) || $tahun % 400 == 0) {
                            echo "Tahun $tahun adalah tahun kabisat<br>";
                        } else {
                            echo "Tahun $tahun bukan tahun kabisat<br>";
                        }
                    }
                    ?>
                </td>
                <td>
                    <?php
                    for ($i = 9; $i >= 1; $i--) {
                        for ($j = 1; $j <= $i; $j++) {
                            echo $j;
                        }
                        echo "<br>";
                    }
                    ?>
                </td>
            </tr>
        </tbody>
    </table>

    <h3>Tanpa Pakai Tabel</h3>
    <?php

    // Nomor 1
    echo "Nomor 1";
    echo "<br>";
    for ($i = 1; $i <= 10; $i++) {
        $angka = $i;
        if ($i % 2 == 0) {
            echo "Angka $angka adalah bilangan genap";
            echo "<br>";
        } else {
            echo "Angka $angka adalah bilangan ganjil";
            echo "<br>";
        }
    }

    // Nomor 2
    echo "<br>";
    echo "Nomor 2";
    echo "<br>";
    for ($tahun = 2000; $tahun <= 2023; $tahun++) {
        if (($tahun % 4 == 0 && $tahun % 100 != 0) || $tahun % 400 == 0) {
            echo "Tahun $tahun adalah tahun kabisat";
            echo "<br>";
        } else {
            echo "Tahun $tahun bukan tahun kabisat";
            echo "<br>";
        }
    }

    // Nomor 3
    echo "<br>";
    echo "Nomor 3";
    echo "<br>";
    for ($i = 9; $i >= 1; $i--) {
        for ($j = 1; $j <= $i; $j++) {
            echo $j;
        }
        echo "<br>";
    }

    ?>
</body>

</html>