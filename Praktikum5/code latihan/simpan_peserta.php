<?php
include "koneksi.php";

$nama     = mysqli_real_escape_string($conn, $_POST['nama']);
$email    = mysqli_real_escape_string($conn, $_POST['email']);
$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

$query = "INSERT INTO peserta (nama, email, username, password)
          VALUES ('$nama', '$email', '$username', '$password')";

if(mysqli_query($conn, $query)){
    echo "<script>
            alert('Data peserta berhasil disimpan!');
            window.location='data_peserta.php';
          </script>";
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
