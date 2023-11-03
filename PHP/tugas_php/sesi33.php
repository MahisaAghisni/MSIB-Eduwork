<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sesi 33</title>

    <style>
        body {
            background-color: rgba(166, 255, 255, 0.7);
            font-family: Arial, sans-serif;
        }

        table {
            border-collapse: collapse;
            width: 90%;
            margin: auto;
            background-color: rgba(255, 255, 255, 0.8);
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #eaeaea;
        }

        b {
            font-weight: bold;
        }

        .code {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th><b>No</b></th>
                <th><b>Soal</b></th>
                <th><b>Jawaban</b></th>
                <th><b>Output</b></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            ?>

            <tr>
                <td><?php echo $i++; ?></td>
                <td>Buat looping dengan ketentuan berikut: <br> array = array("satu", "dua", "tiga", "empat", "lima")</td>
                <td class="code">
                    <?php
                    $jawaban = '<?php $array = array("satu", "dua", "tiga", "empat", "lima"); for ($i = count($array) - 1; $i >= 0; $i--) { echo $array[$i] . "<br>"; } ?>';
                    echo htmlspecialchars($jawaban);
                    ?>
                </td>
                <td>
                    <?php
                    $array = array("satu", "dua", "tiga", "empat", "lima");

                    for ($i = count($array) - 1; $i >= 0; $i--) {
                        echo $array[$i] . "<br>";
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td><?php echo $i++; ?></td>
                <td>Buat looping dengan ketentuan berikut: <br> array = array("apel", "nanas", "mangga", "jeruk")</td>
                <td class="code">
                    <?php
                    $jawaban = '<?php $array = array("apel", "nanas", "mangga", "jeruk"); echo "terdapat " . count($array) . " buah <br>"; ?>';
                    echo htmlspecialchars($jawaban);
                    ?>
                </td>
                <td>
                    <?php
                    $array = array("apel", "nanas", "mangga", "jeruk");
                    echo "terdapat " . count($array) . " buah <br>";
                    ?>
                </td>
            </tr>
            <tr>
                <td><?php echo $i++; ?></td>
                <td>Buat looping dengan ketentuan berikut: <br> array = array("7", "3", "4", "9")</td>
                <td class="code">
                    <?php
                    $jawaban = '<?php $array = array("7", "3", "4", "9"); $total = 0; foreach ($array as $value) { $total += intval($value); } echo "totalnya adalah " . $total . "<br>"; ?>';
                    echo htmlspecialchars($jawaban);
                    ?>
                </td>
                <td>
                    <?php
                    $array = array("7", "3", "4", "9");
                    $total = 0;

                    foreach ($array as $value) {
                        $total += intval($value);
                    }

                    echo "totalnya adalah " . $total . "<br>";
                    ?>
                </td>
            </tr>
            <tr>
                <td><?php echo $i++; ?></td>
                <td>Buat Looping dengan ketentuan berikut: <br> 1x1=1, sampai 1x10=10</td>
                <td class="code">
                    <?php
                    $jawaban = 'for ($i = 1; $i <= 10; $i++) { echo "1x" . $i . " = " . $i . "<br>"; }';
                    echo htmlspecialchars($jawaban);
                    ?>
                </td>
                <td>
                    <?php
                    for ($i = 1; $i <= 10; $i++) {
                        echo "1x" . $i . " = " . $i . "<br>";
                    }
                    ?>
                </td>
            </tr>
        </tbody>
    </table>
</body>

</html>