<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Kategori Nilai</title>
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
    <h1>Kategori Nilai</h1>

    <form method="POST">
        <div class="mb-3">
            <label for="nilai" class="form-label">Masukkan Nilai</label>
            <input type="number" class="form-control" id="nilai" name="nilai">
        </div>
        <button type="submit" class="btn btn-primary">Hitung</button>
    </form>

    <?php
    if (isset($_POST['nilai'])) {
        $nilai = $_POST['nilai'];

        switch (true) {
            case ($nilai >= 90 && $nilai <= 100):
                $kategori = "A";
                break;
            case ($nilai >= 80 && $nilai <= 90):
                $kategori = "B";
                break;
            case ($nilai >= 70 && $nilai <= 80):
                $kategori = "C";
                break;
            default:
                $kategori = "D";
        }

        echo "<br><strong>Hasil:</strong><br>";
        echo "Nilai Anda $nilai masuk dalam kategori: $kategori";
    }
    ?>
</body>

</html>