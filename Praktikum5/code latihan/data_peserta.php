<?php
include "koneksi.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Peserta</title>
    <style>
        table { width: 80%; margin: 20px auto; border-collapse: collapse; }
        th, td { padding: 10px; border: 1px solid #ccc; text-align: center; }
        th { background: #1976d2; color: white; }
        a { text-decoration: none; padding: 6px 12px; border-radius: 6px; color: white; }
        .btn-edit { background: #2e7d32; }
        .btn-hapus { background: #d32f2f; }
        .btn-tambah { background: #1976d2; display: inline-block; margin: 20px auto; }
    </style>
</head>

<body>

<center>
    <a href="tambah_peserta.php" class="btn-tambah">+ Tambah Peserta</a>
</center>

<table>
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Username</th>
        <th>Aksi</th>
    </tr>

    <?php
    $no = 1;
    $result = mysqli_query($conn, "SELECT * FROM peserta ORDER BY id_peserta DESC");

    while($row = mysqli_fetch_assoc($result)){
    ?>
    <tr>
        <td><?= $no++; ?></td>
        <td><?= $row['nama']; ?></td>
        <td><?= $row['email']; ?></td>
        <td><?= $row['username']; ?></td>
        <td>
            <a href="edit_peserta.php?id=<?= $row['id_peserta']; ?>" class="btn-edit">Edit</a>
            <a onclick="return confirm('Yakin hapus?');"
               href="hapus_peserta.php?id=<?= $row['id_peserta']; ?>" class="btn-hapus">Hapus</a>
        </td>
    </tr>
    <?php } ?>
</table>

</body>
</html>
