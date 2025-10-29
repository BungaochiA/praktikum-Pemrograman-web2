<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>Data Buku Tamu</title></head>
<body>
<?php
$nama = $_POST['nama'] ?? '';
$email = $_POST['email'] ?? '';
$komentar = $_POST['komentar'] ?? '';
?>
<h1>Data Buku Tamu</h1>
<hr>
<p><strong>Nama:</strong> <?php echo htmlspecialchars($nama); ?></p>
<p><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>
<p><strong>Komentar:</strong><br>
<textarea cols="40" rows="5" readonly><?php echo htmlspecialchars($komentar); ?></textarea>
</p>
</body>
</html>