<?php
session_start();
include "koneksi.php";

// Fungsi untuk menampilkan pesan error/sukses dengan desain yang baik
function showMessage($type, $message, $link = '') {
    $html = "
    <!DOCTYPE html>
    <html lang='id'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Upload Foto - Pelatihan LKP</title>
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
            }
            
            .icon {
                font-size: 64px;
                margin-bottom: 20px;
            }
            
            .success { color: #27ae60; }
            .error { color: #e74c3c; }
            
            h2 {
                color: #2c3e50;
                margin-bottom: 15px;
            }
            
            p {
                color: #666;
                margin-bottom: 25px;
                line-height: 1.6;
            }
            
            .btn {
                display: inline-block;
                padding: 12px 30px;
                background: #3498db;
                color: white;
                text-decoration: none;
                border-radius: 8px;
                font-weight: 600;
                transition: all 0.3s ease;
                margin: 5px;
            }
            
            .btn:hover {
                background: #2980b9;
                transform: translateY(-2px);
                box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            }
            
            .btn-secondary {
                background: #95a5a6;
            }
            
            .btn-secondary:hover {
                background: #7f8c8d;
            }
            
            .preview {
                margin: 20px 0;
            }
            
            .preview img {
                max-width: 200px;
                border-radius: 10px;
                box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            }
        </style>
    </head>
    <body>
        <div class='message-container'>
            <div class='icon {$type}'>" . ($type == 'success' ? '✅' : '❌') . "</div>
            <h2>" . ($type == 'success' ? 'Berhasil!' : 'Terjadi Kesalahan') . "</h2>
            <p>{$message}</p>
            {$link}
        </div>
    </body>
    </html>
    ";
    echo $html;
    exit;
}

// Cek apakah form sudah disubmit
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    showMessage('error', 'Akses tidak valid!', "<a href='input_foto.php' class='btn'>Kembali ke Form Upload</a>");
}

// Validasi input
$nama = trim($_POST["nama"] ?? '');

// Validasi nama
if (empty($nama)) {
    showMessage('error', 'Nama peserta tidak boleh kosong!', "<a href='input_foto.php' class='btn'>Kembali ke Form Upload</a>");
}

// Validasi file
if (!isset($_FILES['foto']) || $_FILES['foto']['error'] != UPLOAD_ERR_OK) {
    showMessage('error', 'File foto tidak valid atau terjadi error saat upload!', "<a href='input_foto.php' class='btn'>Kembali ke Form Upload</a>");
}

$file_name  = $_FILES['foto']['name'];
$tmp_name   = $_FILES['foto']['tmp_name'];
$file_size  = $_FILES['foto']['size'];
$file_error = $_FILES['foto']['error'];

$folder = "gambar/";

// Buat folder jika belum ada
if (!is_dir($folder)) {
    if (!mkdir($folder, 0777, true)) {
        showMessage('error', 'Gagal membuat folder penyimpanan!', "<a href='input_foto.php' class='btn'>Kembali ke Form Upload</a>");
    }
}

// Ekstensi diperbolehkan
$allowed_ext = ['jpg', 'jpeg', 'png', 'gif'];
$ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

// Validasi ekstensi
if (!in_array($ext, $allowed_ext)) {
    showMessage('error', 
        'Tipe file tidak valid!<br>Format yang diperbolehkan: JPG, JPEG, PNG, GIF', 
        "<a href='input_foto.php' class='btn'>Kembali ke Form Upload</a>"
    );
}

// Validasi ukuran file (max 2MB)
$max_size = 2 * 1024 * 1024; // 2MB dalam bytes
if ($file_size > $max_size) {
    showMessage('error', 
        'Ukuran file terlalu besar!<br>Maksimal 2MB', 
        "<a href='input_foto.php' class='btn'>Kembali ke Form Upload</a>"
    );
}

// Generate nama file baru yang unik
$new_name = uniqid() . '_' . rand(1000, 9999) . "." . $ext;

// Upload file
if (!move_uploaded_file($tmp_name, $folder . $new_name)) {
    showMessage('error', 
        'Gagal mengupload file!<br>Pastikan folder memiliki izin yang cukup.', 
        "<a href='input_foto.php' class='btn'>Kembali ke Form Upload</a>"
    );
}

// Simpan ke database
$sql = "INSERT INTO foto_peserta (nama, foto) VALUES (?, ?)";
$stmt = mysqli_prepare($conn, $sql);

if ($stmt) {
    mysqli_stmt_bind_param($stmt, "ss", $nama, $new_name);
    
    if (mysqli_stmt_execute($stmt)) {
        $success_message = "
            <div class='preview'>
                <img src='{$folder}{$new_name}' alt='Foto {$nama}'>
            </div>
            <p><strong>Nama Peserta:</strong> {$nama}</p>
            <p><strong>File:</strong> {$new_name}</p>
        ";
        
        $links = "
            <a href='input_foto.php' class='btn'>Upload Foto Lain</a>
            <a href='tampil_foto.php' class='btn btn-secondary'>Lihat Semua Foto</a>
        ";
        
        showMessage('success', $success_message, $links);
    } else {
        // Hapus file yang sudah diupload jika gagal menyimpan ke database
        unlink($folder . $new_name);
        showMessage('error', 
            'Gagal menyimpan data ke database!', 
            "<a href='input_foto.php' class='btn'>Kembali ke Form Upload</a>"
        );
    }
    
    mysqli_stmt_close($stmt);
} else {
    // Hapus file yang sudah diupload jika gagal prepared statement
    unlink($folder . $new_name);
    showMessage('error', 
        'Error database connection!', 
        "<a href='input_foto.php' class='btn'>Kembali ke Form Upload</a>"
    );
}

mysqli_close($conn);
?>