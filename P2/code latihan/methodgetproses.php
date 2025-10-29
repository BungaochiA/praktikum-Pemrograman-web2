<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>Hasil GET</title></head>
<body>
    <?php $nama = $_GET['nama'] ?? ''; ?>
    <h1>Hasil Input (GET)</h1>
    <hr>
    Data nama yang diinputkan adalah: <b><?php echo htmlspecialchars($nama); ?></b>
</body>
</html>