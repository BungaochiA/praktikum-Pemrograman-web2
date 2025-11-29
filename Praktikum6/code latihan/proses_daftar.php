<?php
include "koneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];
$gender   = $_POST['gender'];

$sql = "INSERT INTO user VALUES ('$username', '$password', '$gender')";

if(mysqli_query($conn, $sql)){
    echo "User berhasil terdaftar!<br>";
    echo "<a href='login.php'>Login Sekarang</a>";
} else {
    echo "Gagal daftar user.";
}
?>
