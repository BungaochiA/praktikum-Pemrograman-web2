<?php
include "koneksi.php";

$id       = $_POST['id'];
$nama     = mysqli_real_escape_string($conn, $_POST['nama']);
$email    = mysqli_real_escape_string($conn, $_POST['email']);  // SUDAH DIBENERIN
$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

if($password == ""){
    // Jika password TIDAK diganti
    $sql = "UPDATE peserta SET 
                nama='$nama', 
                email='$email', 
                username='$username'
            WHERE id_peserta='$id'";
} else {
    // Jika password DIGANTI
    $sql = "UPDATE peserta SET 
                nama='$nama', 
                email='$email', 
                username='$username',
                password='$password'
            WHERE id_peserta='$id'";
}

if(mysqli_query($conn, $sql)){
    echo "<script>
            alert('Data peserta berhasil diupdate!');
            window.location='data_peserta.php';
          </script>";
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
