<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sesi 27</title>
</head>

<body>
    <?php
    for ($i = 1; $i <= 9; $i++) {
        for ($j = 0; $j < $i; $j++) {
            echo "$j";
        }

        echo "<br>";
    }
    ?>

    <?php
    $colors = ["#CCCCCC", "#FFFFFF"];
    echo "<br>";
    ?>

    <table border="1" cellspacing="0">
        <tr style="background-color: #00C4FF;">
            <th>No</th>
            <th>Nama</th>
            <th>Kelas</th>
        </tr>

        <?php

        for ($i = 1; $i <= 10; $i++) :
        ?>
            <?php
            $color = $colors[$i % 2];
            $nama = "Nama ke " . $i;
            $kelas = "Kelas " . (11 - $i);
            ?>

            <tr style="background-color: <?= $color; ?>">
                <td><?= $i ?></td>
                <td><?= $nama ?></td>
                <td><?= $kelas ?></td>
            </tr>
        <?php
        endfor;
        ?>
    </table>
</body>

</html>