<?php
session_start();
include "koneksi.php";

// Cek apakah user sudah login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Fungsi untuk menampilkan pesan dengan desain yang baik
function showMessage($type, $title, $message, $links = '') {
    $html = "
    <!DOCTYPE html>
    <html lang='id'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Hapus Foto - Pelatihan LKP</title>
        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            }
            
            body {
                background: linear-gradient(135deg, #3498db, #8e44ad);
                min-height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 20px;
            }
            
            .message-container {
                background: white;
                padding: 40px;
                border-radius: 15px;
                box-shadow: 0 10px 30px rgba(0,0,0,0.2);
                text-align: center;
                max-width: 500px;
                width: 100%;
                animation: fadeIn 0.5s ease;
            }
            
            @keyframes fadeIn {
                from { opacity: 0; transform: translateY(-20px); }
                to { opacity: 1; transform: translateY(0); }
            }
            
            .icon {
                font-size: 64px;
                margin-bottom: 20px;
            }
            
            .success { color: #27ae60; }
            .error { color: #e74c3c; }
            .warning { color: #f39c12; }
            
            h2 {
                color: #2c3e50;
                margin-bottom: 15px;
            }
            
            p {
                color: #666;
                margin-bottom: 25px;
                line-height: 1.6;
            }
            
            .btn-group {
                display: flex;
                gap: 10px;
                justify-content: center;
                flex-wrap: wrap;
                margin-top: 25px;
            }
            
            .btn {
                display: inline-flex;
                align-items: center;
                gap: 8px;
                padding: 12px 25px;
                background: #3498db;
                color: white;
                text-decoration: none;
                border-radius: 8px;
                font-weight: 600;
                transition: all 0.3s ease;
                border: none;
                cursor: pointer;
                font-size: 14px;
            }
            
            .btn:hover {
                transform: translateY(-2px);
                box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            }
            
            .btn-primary {
                background: #3498db;
            }
            
            .btn-primary:hover {
                background: #2980b9;
            }
            
            .btn-secondary {
                background: #95a5a6;
            }
            
            .btn-secondary:hover {
                background: #7f8c8d;
            }
            
            .btn-danger {
                background: #e74c3c;
            }
            
            .btn-danger:hover {
                background: #c0392b;
            }
            
            .photo-preview {
                margin: 20px 0;
                padding: 20px;
                background: #f8f9fa;
                border-radius: 10px;
            }
            
            .photo-preview img {
                max-width: 150px;
                border-radius: 8px;
                box-shadow: 0 3px 10px rgba(0,0,0,0.1);
            }
            
            .photo-info {
                margin-top: 10px;
                color: #666;
                font-size: 14px;
            }
        </style>
    </head>
    <body>
        <div class='message-container'>
            <div class='icon {$type}'>" . 
                ($type == 'success' ? '✅' : 
                 ($type == 'error' ? '❌' : '⚠️')) . 
            "</div>
            <h2>{$title}</h2>
            <p>{$message}</p>
            <div class='btn-group'>{$links}</div>
        </div>
    </body>
    </html>
    ";
    echo $html;
    exit;
}

// Validasi ID
if (!isset($_GET['id']) || empty($_GET['id'])) {
    showMessage('error', 'ID Tidak Valid', 'ID foto tidak ditemukan atau tidak valid.', "<a href='tampil_foto.php' class='btn btn-primary'>📁 Kembali ke Daftar Foto</a>");
}

$id = $_GET['id'];

// Validasi numeric ID
if (!is_numeric($id)) {
    showMessage('error', 'ID Tidak Valid', 'Format ID tidak valid.', "<a href='tampil_foto.php' class='btn btn-primary'>📁 Kembali ke Daftar Foto</a>");
}

// Ambil data foto dari database
$stmt = mysqli_prepare($conn, "SELECT * FROM foto_peserta WHERE id = ?");
if ($stmt) {
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $data = mysqli_fetch_assoc($result);
    mysqli_stmt_close($stmt);
    
    if (!$data) {
        showMessage('error', 'Data Tidak Ditemukan', 'Foto dengan ID tersebut tidak ditemukan dalam database.', "<a href='tampil_foto.php' class='btn btn-primary'>📁 Kembali ke Daftar Foto</a>");
    }
} else {
    showMessage('error', 'Database Error', 'Terjadi kesalahan saat mengakses database.', "<a href='tampil_foto.php' class='btn btn-primary'>📁 Kembali ke Daftar Foto</a>");
}

// Tampilkan konfirmasi hapus jika belum dikonfirmasi
if (!isset($_GET['confirm'])) {
    $photo_preview = "
        <div class='photo-preview'>
            <img src='gambar/{$data['foto']}' 
                 alt='Foto {$data['nama']}'
                 onerror=\"this.src='data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTUwIiBoZWlnaHQ9IjE1MCIgdmlld0JveD0iMCAwIDE1MCAxNTAiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjxyZWN0IHdpZHRoPSIxNTAiIGhlaWdodD0iMTUwIiBmaWxsPSIjRjVGNUY1Ii8+CjxwYXRoIGQ9Ik03NSA1MEM2Ny44Mjg0IDUwIDYyIDU1LjgyODQgNjIgNjNDNjIgNzAuMTcxNiA2Ny44Mjg0IDc2IDc1IDc2QzgyLjE3MTYgNzYgODggNzAuMTcxNiA4OCA2M0M4OCA1NS44Mjg0IDgyLjE3MTYgNTAgNzUgNTBaIiBmaWxsPSIjRDZENkQ2Ii8+CjxwYXRoIGQ9Ik01NCA5M0M1NCA4Ni44Mjg0IDU5LjgyODQgODEgNjYgODFIODRDOTAuMTcxNiA4MSA5NiA4Ni44Mjg0IDk2IDkzVjkzSDU0WiIgZmlsbD0iI0Q2RDZENiIvPgo8L3N2Zz4K'\">
            <div class='photo-info'>
                <strong>Nama:</strong> {$data['nama']}<br>
                <strong>File:</strong> {$data['foto']}
            </div>
        </div>
    ";
    
    showMessage('warning',
        'Konfirmasi Hapus Foto',
        'Apakah Anda yakin ingin menghapus foto ini? Tindakan ini tidak dapat dibatalkan.' . $photo_preview,
        "
            <a href='hapus_foto.php?id={$id}&confirm=yes' class='btn btn-danger'>🗑️ Ya, Hapus</a>
            <a href='tampil_foto.php' class='btn btn-secondary'>❌ Batal</a>
        "
    );
}

// Proses hapus jika sudah dikonfirmasi
if (isset($_GET['confirm']) && $_GET['confirm'] === 'yes') {
    $success = true;
    $errors = [];
    
    // Hapus file dari folder
    $file_path = "gambar/" . $data['foto'];
    if (file_exists($file_path)) {
        if (!unlink($file_path)) {
            $errors[] = "Gagal menghapus file dari folder";
            $success = false;
        }
    } else {
        $errors[] = "File tidak ditemukan di folder";
        // Lanjutkan proses karena mungkin file sudah terhapus manual
    }
    
    // Hapus dari database
    $stmt = mysqli_prepare($conn, "DELETE FROM foto_peserta WHERE id = ?");
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $id);
        if (!mysqli_stmt_execute($stmt)) {
            $errors[] = "Gagal menghapus data dari database";
            $success = false;
        }
        mysqli_stmt_close($stmt);
    } else {
        $errors[] = "Error database connection";
        $success = false;
    }
    
    if ($success) {
        showMessage('success',
            'Berhasil Dihapus',
            'Foto peserta berhasil dihapus dari sistem.',
            "
                <a href='tampil_foto.php' class='btn btn-primary'>📁 Lihat Semua Foto</a>
                <a href='input_foto.php' class='btn btn-secondary'>📤 Upload Foto Baru</a>
            "
        );
    } else {
        $error_details = implode('<br>', $errors);
        showMessage('error',
            'Gagal Menghapus',
            'Terjadi kesalahan saat menghapus foto:<br>' . $error_details,
            "
                <a href='tampil_foto.php' class='btn btn-primary'>📁 Kembali ke Daftar Foto</a>
                <a href='input_foto.php' class='btn btn-secondary'>📤 Upload Foto Baru</a>
            "
        );
    }
}

mysqli_close($conn);
?>