<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Proses Input</title>
</head>
<body>
    <?php
    // Cek apakah form dikirim via POST dan variabel username & password tersedia
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["username"]) && isset($_POST["password"])) {
        // Sanitasi input agar aman dari XSS
        $username = htmlspecialchars($_POST["username"], ENT_QUOTES, 'UTF-8');
        $password = htmlspecialchars($_POST["password"], ENT_QUOTES, 'UTF-8');
    } else {
        $username = '';
        $password = '';
    }
    ?>

    <p>Username : <?php echo $username; ?></p>
    <p>Password : <?php echo $password; ?></p>
</body>
</html>
