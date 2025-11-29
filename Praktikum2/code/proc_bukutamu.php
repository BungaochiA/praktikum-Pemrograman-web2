<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Buku Tamu</title>
</head>
<body>
<?php
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["nama"], $_POST["email"], $_POST["komentar"])) {
    // Ambil & sanitasi input agar aman dari XSS/HTML injection
    $nama    = htmlspecialchars($_POST["nama"], ENT_QUOTES, 'UTF-8');
    $email   = htmlspecialchars($_POST["email"], ENT_QUOTES, 'UTF-8');
    $komentar = htmlspecialchars($_POST["komentar"], ENT_QUOTES, 'UTF-8');
} else {
    // Jika form belum submit atau data kurang
    $nama = $email = $komentar = '';
}
?>
<h1>Data Buku Tamu</h1>
<hr>
<p>Nama Anda : <?php echo $nama; ?></p>
<p>Email address : <?php echo $email; ?></p>
<p>Komentar :</p>
<div style="border:1px solid #ccc; padding: 8px; width: 300px;">
    <?php 
    // Tampilkan komentar — gunakan nl2br agar line break di textarea ditampilkan sebagai <br>
    echo nl2br($komentar); 
    ?>
</div>
</body>
</html>
