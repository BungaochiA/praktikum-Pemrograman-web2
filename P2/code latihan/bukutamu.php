<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>Buku Tamu</title></head>
<body>
<h1>Buku Tamu</h1>
<p>Komentar dan saran sangat kami butuhkan untuk meningkatkan kualitas situs kami.</p>
<hr>
<form action="proc_bukutamu.php" method="post">
Nama: <input type="text" name="nama" size="25" required><br><br>
Email: <input type="email" name="email" size="25" required><br><br>
Komentar:<br>
<textarea name="komentar" cols="40" rows="5" required></textarea><br><br>
<input type="submit" value="Kirim">
<input type="reset" value="Ulangi">
</form>
</body>
</html>