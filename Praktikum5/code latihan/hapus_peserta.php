<?php
include "koneksi.php";

$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM peserta WHERE id_peserta = '$id'");

echo "<script>
        alert('Data peserta berhasil dihapus!');
        window.location='data_peserta.php';
      </script>";
?>
