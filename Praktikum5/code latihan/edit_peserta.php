<?php
include "koneksi.php";

$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM peserta WHERE id_peserta = '$id'");
$data  = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Peserta</title>
    <style>
        body { font-family: Arial; background: #f4f6f8; padding: 30px; }
        .container { background: #fff; padding: 20px; border-radius: 10px; width: 450px; margin: auto; }
        label { font-weight: bold; display: block; margin-top: 12px; }
        input { width: 100%; padding: 10px; border-radius: 6px; border: 1px solid #ccc; margin-top: 5px; }
        button { margin-top: 20px; background: #2e7d32; color: #fff; padding: 10px; border-radius: 6px; width: 100%; border: none; }
    </style>
</head>

<body>

<div class="container">

<h2>Edit Data Peserta</h2>

<form action="update_peserta.php" method="POST">

    <input type="hidden" name="id" value="<?= $data['id_peserta']; ?>">

    <label>Nama Lengkap</label>
    <input type="text" name="nama" value="<?= $data['nama']; ?>" required>

    <label>Email</label>
    <input type="email" name="email" value="<?= $data['email']; ?>" required>

    <label>Username</label>
    <input type="text" name="username" value="<?= $data['username']; ?>" required>

    <label>Password (kosongkan jika tidak diganti)</label>
    <input type="password" name="password">

    <button type="submit">Update</button>
</form>

</div>

</body>
</html>
