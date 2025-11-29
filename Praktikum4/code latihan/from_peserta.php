<!DOCTYPE html>
<html>
<head>
    <title>Form Tambah Peserta</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            padding: 30px;  
        }
        .container {
            background: #fff;
            width: 450px;
            padding: 20px;
            margin: auto;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        .container h2 {
            text-align: center;
            margin-bottom: 18px;
        }
        label {
            font-weight: bold;
            display: block;
            margin-top: 12px;
        }
        input {
            width: 100%;
            padding: 10px;
            margin-top: 6px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }
        button {
            width: 100%;
            padding: 10px;
            margin-top: 20px;
            border: none;
            background: #1976d2;
            color: white;
            font-size: 16px;
            border-radius: 6px;
            cursor: pointer;
        }
        button:hover {
            background: #125da2;
        }
    </style>
</head>

<body>

<div class="container">

    <h2>Tambah Data Peserta</h2>

    <form action="simpan_peserta.php" method="POST">

        <label>Nama Lengkap</label>
        <input type="text" name="nama" placeholder="Masukkan nama peserta" required>

        <label>Email</label>
        <input type="email" name="email" placeholder="Masukkan email" required>

        <label>Username</label>
        <input type="text" name="username" placeholder="Buat username peserta" required>

        <label>Password</label>
        <input type="password" name="password" placeholder="Buat password" required>

        <button type="submit">Simpan</button>
    </form>

</div>

</body>
</html>