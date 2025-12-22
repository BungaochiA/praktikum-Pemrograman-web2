<?php
include 'koneksi.php';
$data = mysqli_query($conn, "SELECT * FROM peserta");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Peserta</title>
</head>
<body>
    <h2>Data Peserta</h2>
    <table border="1" cellpadding="8">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Email</th>
        </tr>

        <?php $no=1; while($row=mysqli_fetch_assoc($data)) { ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $row['nama'] ?></td>
            <td><?= $row['alamat'] ?></td>
            <td><?= $row['email'] ?></td>
        </tr>
        <?php } ?>
    </table>

    <br>
    <a href="laporan.php">Cetak PDF</a>
</body>
</html>
