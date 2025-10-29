<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Registrasi Mahasiswa Baru</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f9f9f9;
            color: #333;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            color: #2c3e50;
        }
        hr {
            border: none;
            height: 1px;
            background: #ddd;
            margin: 20px 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table td {
            padding: 12px 15px;
            vertical-align: top;
        }
        table tr:nth-child(even) {
            background: #f2f2f2;
        }
        table tr td:first-child {
            font-weight: bold;
            width: 35%;
            color: #555;
        }
        @media (max-width: 600px) {
            body {
                padding: 10px;
            }
            .container {
                padding: 20px;
            }
            table td {
                display: block;
                width: 100%;
                box-sizing: border-box;
            }
            table tr {
                margin-bottom: 15px;
                display: block;
                border-bottom: 1px solid #ddd;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Data Registrasi Mahasiswa Baru</h2>
    <hr>

    <?php
    $no_pendaftaran = $_POST["no_pendaftaran"];
    $nama_lengkap   = $_POST["nama_lengkap"];
    $jenis_kelamin  = $_POST["jenis_kelamin"];
    $tempat_lahir   = $_POST["tempat_lahir"];
    $tanggal_lahir  = $_POST["tanggal_lahir"];
    $email          = $_POST["email"];
    $no_hp          = $_POST["no_hp"];
    $prodi          = $_POST["prodi"];
    $alamat         = $_POST["alamat"];
    ?>

    <table>
        <tr><td>No. Pendaftaran</td><td><?php echo htmlspecialchars($no_pendaftaran); ?></td></tr>
        <tr><td>Nama Lengkap</td><td><?php echo htmlspecialchars($nama_lengkap); ?></td></tr>
        <tr><td>Jenis Kelamin</td><td><?php echo htmlspecialchars($jenis_kelamin); ?></td></tr>
        <tr><td>Tempat, Tanggal Lahir</td><td><?php echo htmlspecialchars($tempat_lahir) . ", " . htmlspecialchars($tanggal_lahir); ?></td></tr>
        <tr><td>Email</td><td><?php echo htmlspecialchars($email); ?></td></tr>
        <tr><td>No. HP</td><td><?php echo htmlspecialchars($no_hp); ?></td></tr>
        <tr><td>Program Studi</td><td><?php echo htmlspecialchars($prodi); ?></td></tr>
        <tr><td>Alamat Lengkap</td><td><?php echo nl2br(htmlspecialchars($alamat)); ?></td></tr>
    </table>
</div>

</body>
</html>
