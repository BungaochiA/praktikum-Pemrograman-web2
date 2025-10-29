<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>Hasil POST</title></head>
<body>
    <?php $nama = $_POST['nama'] ?? ''; ?>
    <h1>Hasil Input (POST)</h1>
    <hr>
    Data nama yang diinputkan adalah: <b><?php echo htmlspecialchars($nama); ?></b>
</body>
</html>