<?php include "pagination.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pelatihan LKP Tata Boga La-Shinta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f7f9fc;
            font-family: 'Segoe UI', sans-serif;
        }
        .table-hover tbody tr:hover {
            background-color: #eef3ff;
        }
        .header-box {
            background: white;
            padding: 20px 25px;
            border-radius: 10px;
            box-shadow: 0px 3px 10px rgba(0,0,0,0.1);
            margin-bottom: 25px;
            text-align: center;
        }
        .container {
            margin-top: 40px;
        }
    </style>
</head>

<body>

<div class="container">

    <div class="header-box">
        <h2 class="fw-bold">Pelatihan LKP Tata Boga La-Shinta</h2>
        <p class="text-muted">Daftar Peserta Pelatihan – Sistem Pagination Modern</p>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">

            <table class="table table-bordered table-hover text-center">
                <thead class="table-primary">
                    <tr>
                        <th>ID Peserta</th>
                        <th>Nama Depan</th>
                        <th>Nama Belakang</th>
                        <th>Username</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_array($dataQuery)) { ?>
                        <tr>
                            <td><?= $row['id_peserta'] ?></td>
                            <td><?= $row['firstname'] ?></td>
                            <td><?= $row['lastname'] ?></td>
                            <td><?= $row['username'] ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

            <?= $pagination ?>

        </div>
    </div>

</div>

</body>
</html>
