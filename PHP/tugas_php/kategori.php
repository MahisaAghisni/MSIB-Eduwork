<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Kalkulator BMI</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f2f2f2;
        }

        h1 {
            color: #333;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            margin: 0 auto;
            width: 400px;
        }
    </style>
</head>

<body>
    <h1>Kalkulator BMI</h1>

    <form method="POST">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama">
        </div>
        <div class="mb-3">
            <label for="tinggi" class="form-label">Tinggi (cm)</label>
            <input type="number" class="form-control" id="tinggi" name="tinggi">
        </div>
        <div class="mb-3">
            <label for="berat" class="form-label">Berat (kg)</label>
            <input type="number" class="form-control" id="berat" name="berat">
        </div>
        <button type="submit" class="btn btn-primary">Hitung</button>
    </form>

    <?php
    if (isset($_POST['nama'])) {
        $nama = $_POST['nama'];
        $tinggi = $_POST['tinggi'] / 100;
        $berat = $_POST['berat'];

        $kalBMI = $berat / ($tinggi * $tinggi);

        if ($kalBMI <= 18.4) {
            $kategori = "Kurus";
        } else if ($kalBMI <= 24.9) {
            $kategori = "Sedang";
        } else {
            $kategori = "Gemuk";
        }

        echo "<br><strong>Hasil:</strong><br>";
        echo "Halo, " . $nama . "!<br>";
        echo "Nilai BMI Anda adalah " . round($kalBMI, 1) . "<br>";
        echo "Anda termasuk " . $kategori . ".";
    }
    ?>
</body>

</html>