<?php
include "koneksi.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Peserta</title>

<style>
    body {
        font-family: Arial, sans-serif;
        background: #f4f6f8;
        padding: 30px;
    }

    .form-card {
        background: #fff;
        padding: 25px;
        border-radius: 12px;
        box-shadow: 0 6px 18px rgba(0,0,0,0.06);
        width: 100%;
        max-width: 700px;
        margin: auto;
    }

    .form-card h3 {
        margin-top: 0;
        margin-bottom: 18px;
        font-size: 22px;
        color: #243447;
        text-align: center;
    }

    .form-group {
        margin-bottom: 16px;
    }

    label {
        font-weight: 600;
        margin-bottom: 6px;
        display: block;
        color: #333;
    }

    .input {
        width: 100%;
        padding: 12px;
        border: 1px solid #d4d7db;
        border-radius: 8px;
        font-size: 15px;
        transition: .2s;
    }

    .input:focus {
        border-color: #1976d2;
        box-shadow: 0 0 4px rgba(25,118,210,0.4);
        outline: none;
    }

    .btn-add {
        background: #1976d2;
        padding: 10px 15px;
        border-radius: 8px;
        color: white;
        border: none;
        cursor: pointer;
        font-size: 15px;
        width: 100%;
        margin-top: 10px;
    }

    .btn-add:hover {
        background: #125a9c;
    }

    .btn-cancel {
        background: #666;
        padding: 10px 15px;
        border-radius: 8px;
        color: white;
        text-align: center;
        display: block;
        font-size: 15px;
        margin-top: 10px;
        text-decoration: none;
    }

    .btn-cancel:hover {
        background: #444;
    }
</style>

</head>

<body>

<div class="form-card">
    <h3>➕ Tambah Data Peserta</h3>

    <form action="simpan_peserta.php" method="post">

        <div class="form-group">
            <label>Nama Lengkap</label>
            <input class="input" name="nama" placeholder="Masukkan nama lengkap peserta" required>
        </div>

        <div class="form-group">
            <label>Email</label>
            <input class="input" name="email" type="email" placeholder="Masukkan email peserta" required>
        </div>

        <div class="form-group">
            <label>Username</label>
            <input class="input" name="username" placeholder="Buat username peserta" required>
        </div>

        <div class="form-group">
            <label>Password</label>
            <input class="input" name="password" type="password" placeholder="Buat password peserta" required>
        </div>

        <button class="btn-add" type="submit">✔ Simpan</button>
        <a href="data_peserta.php" class="btn-cancel">✖ Batal</a>

    </form>
</div>

</body>
</html>
