<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Method GET proses</title>
</head>
<body>
    <?php
    if (isset($_GET["nama"])) {
        // Ambil dan escape supaya aman dari XSS
        $nama = htmlspecialchars($_GET["nama"], ENT_QUOTES, 'UTF-8');
        echo "Data nama yang diinputkan adalah: " . $nama;
    } else {
        echo "Nama belum diinput.";
    }
    ?>
</body>
</html>
