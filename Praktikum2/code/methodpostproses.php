<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Method POST proses</title>
</head>
<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["nama"])) {
        // Ambil & amankan output supaya aman dari XSS
        $nama = htmlspecialchars($_POST["nama"], ENT_QUOTES, 'UTF-8');
        echo "Data nama yang diinputkan adalah: " . $nama;
    } else {
        echo "Nama belum diinput.";
    }
    ?>
</body>
</html>
