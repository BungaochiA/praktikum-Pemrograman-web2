<?php
include "koneksi.php";

// Proses hapus foto
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    
    // Ambil data foto
    $sql_foto = "SELECT * FROM foto_peserta WHERE id='$id'";
    $result_foto = mysqli_query($conn, $sql_foto);
    $foto = mysqli_fetch_assoc($result_foto);
    
    // Hapus file dari folder
    if (file_exists("gambar/" . $foto['foto'])) {
        unlink("gambar/" . $foto['foto']);
    }
    
    // Hapus dari database
    mysqli_query($conn, "DELETE FROM foto_peserta WHERE id='$id'");
    
    header("Location: tampil_foto.php?sukses=1");
    exit();
}

$sql = "SELECT * FROM foto_peserta ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Foto Peserta - Pelatihan LKP</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        
        body {
            background: #f5f7fa;
            padding: 20px;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .header {
            text-align: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 2px solid #eee;
        }
        
        .header h1 {
            color: #2c3e50;
            margin-bottom: 10px;
        }
        
        .actions {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background: #3498db;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin: 5px;
            border: none;
            cursor: pointer;
        }
        
        .btn:hover {
            background: #2980b9;
        }
        
        .btn-hapus {
            background: #e74c3c;
        }
        
        .btn-hapus:hover {
            background: #c0392b;
        }
        
        .photos-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }
        
        .photo-card {
            background: white;
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        
        .photo-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        
        .photo-info {
            padding: 15px;
        }
        
        .photo-name {
            font-weight: bold;
            margin-bottom: 5px;
            color: #2c3e50;
        }
        
        .photo-actions {
            margin-top: 10px;
            text-align: center;
        }
        
        .empty-state {
            text-align: center;
            padding: 50px 20px;
            color: #666;
        }
        
        .empty-state .icon {
            font-size: 48px;
            margin-bottom: 15px;
        }
        
        .sukses {
            background: #d4edda;
            color: #155724;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
            text-align: center;
            border: 1px solid #c3e6cb;
        }
        
        .footer {
            text-align: center;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #eee;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Daftar Foto </h1>
            <p>Pelatihan LKP - Semua foto hasil pelatihan tataboga</p>
        </div>
        
        <?php if (isset($_GET['sukses'])): ?>
            <div class="sukses">
                ✅ Foto berhasil dihapus!
            </div>
        <?php endif; ?>
        
        <div class="actions">
            <a href="input_foto.php" class="btn">📤 Upload Foto Baru</a>
        </div>
        
        <?php if (mysqli_num_rows($result) > 0): ?>
            <div class="photos-grid">
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <div class="photo-card">
                        <img src="gambar/<?php echo $row['foto']; ?>" 
                             alt="Foto <?php echo $row['nama']; ?>" 
                             class="photo-image"
                             onerror="this.style.display='none'">
                        <div class="photo-info">
                            <div class="photo-name"><?php echo $row['nama']; ?></div>
                            <div style="color: #666; font-size: 12px; margin-bottom: 10px;">
                                File: <?php echo $row['foto']; ?>
                            </div>
                            <div class="photo-actions">
                                <a href="tampil_foto.php?hapus=<?php echo $row['id']; ?>" 
                                   class="btn btn-hapus"
                                   onclick="return confirm('Yakin hapus foto <?php echo $row['nama']; ?>?')">
                                    🗑️ Hapus
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php else: ?>
            <div class="empty-state">
                <div class="icon">📷</div>
                <h3>Belum Ada Foto</h3>
                <p>Silakan upload foto peserta pertama Anda</p>
                <a href="input_foto.php" class="btn" style="margin-top: 15px;">Upload Foto</a>
            </div>
        <?php endif; ?>
        
        <div class="footer">
            <p>Total: <?php echo mysqli_num_rows($result); ?> foto</p>
        </div>
    </div>

    <script>
        // Konfirmasi hapus
        document.querySelectorAll('.btn-hapus').forEach(btn => {
            btn.addEventListener('click', function(e) {
                if (!confirm('Yakin ingin menghapus foto ini?')) {
                    e.preventDefault();
                }
            });
        });
    </script>
</body>
</html>

<?php mysqli_close($conn); ?>