<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Proses Input</title>
</head>
<body>
<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // cek apakah variabel ada
    if (isset($_POST["bil1"]) && isset($_POST["bil2"])) {
        // sanitasi input — ubah karakter khusus HTML untuk mencegah XSS
        $bil1 = htmlspecialchars($_POST["bil1"], ENT_QUOTES, 'UTF-8');
        $bil2 = htmlspecialchars($_POST["bil2"], ENT_QUOTES, 'UTF-8');

        echo "<h1>Perbandingan Bilangan</h1>";
        echo "<hr>";
        echo "Bil I : " . $bil1 . "<br>";
        echo "Bil II: " . $bil2 . "<br>";

        // Pastikan membandingkan sebagai angka (jika memang bilangan)
        if (is_numeric($bil1) && is_numeric($bil2)) {
            $n1 = (float)$bil1;
            $n2 = (float)$bil2;
            if ($n1 < $n2) {
                echo "$n1 lebih kecil dari $n2";
            } elseif ($n1 > $n2) {
                echo "$n1 lebih besar dari $n2";
            } else {
                echo "$n1 sama dengan $n2";
            }
        } else {
            echo "Input bukan bilangan valid.";
        }
    } else {
        echo "Data bil1 atau bil2 belum diisi.";
    }
} else {
    echo "Form belum disubmit.";
}
?>
</body>
</html>
