<?php
// Konfigurasi database
$host = "localhost";
$user = "root";      // default XAMPP
$pass = "";          // default XAMPP kosong
$db   = "pelatihan_lkp";  // nama database

// Koneksi ke MySQL
$conn = mysqli_connect($host, $user, $pass, $db);

// Cek koneksi
if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>
