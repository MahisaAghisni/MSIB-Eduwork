<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sesi 28</title>

    <style>
        body {
            margin: 0;
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
        }

        .navbar {
            background-color: #B3A492;
            margin-bottom: 20px;
            text-align: center;
            padding: 5px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        table {
            margin: auto;
            border-collapse: collapse;
            width: 80%;
            background-color: #fff;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            padding: 12px;
            text-align: left;
        }

        th {
            font-weight: bold;
        }

        tbody tr:nth-child(odd) {
            background-color: #F1EFEF;
        }

        tbody tr:hover {
            background-color: #D3D3D3;
        }
    </style>


</head>

<body>
    <div class="navbar">
        <h2>Daftar Nilai</h2>
    </div>
    <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Tanggal Lahir</th>
                <th>Umur</th>
                <th>Alamat</th>
                <th>Kelas</th>
                <th>Nilai</th>
                <th>Hasil</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $file = file_get_contents("data.json");
            $datas = json_decode($file, true);

            $nomor = 0;

            foreach ($datas as $data) {

                // Menambahkan nomor
                $nomor++;

                // Menghitung umur
                $tgl_lahir = new DateTime($data['tanggal_lahir']);
                $sekarang = new DateTime();
                $umur = $sekarang->diff($tgl_lahir)->y;

                // Menghitung hasil
                $hasil = "";
                if ($data['nilai'] >= 90) {
                    $hasil = "A";
                } elseif ($data['nilai'] >= 80) {
                    $hasil = "B";
                } elseif ($data['nilai'] >= 70) {
                    $hasil = "C";
                } elseif ($data['nilai'] >= 50) {
                    $hasil = "D";
                } else {
                    $hasil = "E";
                }

                // Menampilkan data pada tabel
                echo "<tr>";
                echo "<td>" . $nomor . "." . "</td>";
                echo "<td>" . $data['nama'] . "</td>";
                echo "<td>" . $data['tanggal_lahir'] . "</td>";
                echo "<td>" . $umur . " tahun</td>";
                echo "<td>" . $data['alamat'] . "</td>";
                echo "<td>" . $data['kelas'] . "</td>";
                echo "<td>" . $data['nilai'] . "</td>";
                echo "<td>" . $hasil . "</td";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>

</html>