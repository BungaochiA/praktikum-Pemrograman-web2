<?php
include 'koneksi.php';

$nama     = $_POST['nama'];
$email    = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password']; // tanpa MD5 (sesuai sistem kamu)

$sql = "INSERT INTO peserta (nama, email, username, password)
        VALUES ('$nama', '$email', '$username', '$password')";

if (mysqli_query($conn, $sql)) {
    echo "<script>
            alert('Data peserta berhasil disimpan!');
            window.location='form_peserta.php';
          </script>";
} else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
