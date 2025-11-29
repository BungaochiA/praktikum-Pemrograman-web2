<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Foto Peserta - Pelatihan LKP</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        
        body {
            background: #3498db;
            padding: 20px;
            min-height: 100vh;
        }
        
        .container {
            max-width: 600px;
            margin: 0 auto;
        }
        
        .header {
            text-align: center;
            margin-bottom: 30px;
            color: white;
        }
        
        .header h1 {
            font-size: 28px;
            margin-bottom: 10px;
        }
        
        .upload-card {
            background: white;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            margin-bottom: 20px;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #333;
        }
        
        input[type="text"] {
            width: 100%;
            padding: 12px;
            border: 2px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }
        
        input[type="text"]:focus {
            outline: none;
            border-color: #3498db;
        }
        
        .file-input {
            width: 100%;
            padding: 10px;
            border: 2px dashed #bdc3c7;
            border-radius: 5px;
            background: #f8f9fa;
        }
        
        .btn-upload {
            width: 100%;
            padding: 15px;
            background: #27ae60;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            margin-top: 10px;
        }
        
        .btn-upload:hover {
            background: #219652;
        }
        
        .btn-secondary {
            display: block;
            text-align: center;
            padding: 12px;
            background: white;
            color: #3498db;
            border: 2px solid #3498db;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            margin-top: 15px;
        }
        
        .btn-secondary:hover {
            background: #3498db;
            color: white;
        }
        
        .preview {
            text-align: center;
            margin: 15px 0;
        }
        
        .preview img {
            max-width: 200px;
            border-radius: 5px;
            display: none;
        }
        
        .info {
            background: #e8f4fd;
            padding: 15px;
            border-radius: 5px;
            margin-top: 20px;
            border-left: 4px solid #3498db;
        }
        
        .footer {
            text-align: center;
            color: white;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Upload Foto Hasil Pelatihan Tataboga</h1>
            <p>Pelatihan LKP</p>
        </div>

        <div class="upload-card">
            <form action="proses_upload.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nama">Nama </label>
                    <input type="text" id="nama" name="nama" placeholder="Masukkan nama peserta" required>
                </div>

                <div class="form-group">
                    <label for="foto">upload Foto</label>
                    <input type="file" id="foto" name="foto" class="file-input" accept="image/*" required>
                </div>

                <div class="preview">
                    <img id="previewImage" alt="Preview Foto">
                </div>

                <button type="submit" class="btn-upload">
                    Upload Foto
                </button>
            </form>

            <a href="tampil_foto.php" class="btn-secondary">
                Lihat Semua Foto
            </a>
        </div>

        <div class="info">
            <h3>Ketentuan Upload:</h3>
            <ul style="margin-left: 20px; margin-top: 10px;">
                <li>Format: JPG, PNG,</li>
                <li>Maksimal 2MB</li>
                <li>Foto harus jelas</li>
            </ul>
        </div>

        <div class="footer">
            <p>&copy; 2024 LKP Training Center</p>
        </div>
    </div>

    <script>
        // Preview gambar
        document.getElementById('foto').addEventListener('change', function(e) {
            const file = e.target.files[0];
            const previewImage = document.getElementById('previewImage');
            
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImage.src = e.target.result;
                    previewImage.style.display = 'block';
                }
                reader.readAsDataURL(file);
            } else {
                previewImage.style.display = 'none';
            }
        });

        // Validasi form
        document.querySelector('form').addEventListener('submit', function(e) {
            const file = document.getElementById('foto').files[0];
            const nama = document.getElementById('nama').value;
            
            if (!nama.trim()) {
                e.preventDefault();
                alert('Nama peserta harus diisi!');
                return false;
            }
            
            if (!file) {
                e.preventDefault();
                alert('Pilih foto terlebih dahulu!');
                return false;
            }
            
            if (file.size > 2 * 1024 * 1024) {
                e.preventDefault();
                alert('Ukuran file terlalu besar! Maksimal 2MB.');
                return false;
            }
        });
    </script>
</body>
</html>