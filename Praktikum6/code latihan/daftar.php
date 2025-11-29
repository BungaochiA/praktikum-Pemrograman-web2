<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran User Pelatihan LKP</title>
    <style>
        :root {
            --primary-color: #3498db;
            --secondary-color: #2980b9;
            --accent-color: #e74c3c;
            --light-color: #f5f7fa;
            --dark-color: #2c3e50;
            --success-color: #2ecc71;
            --shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: #f0f2f5;
            color: var(--dark-color);
            line-height: 1.6;
            padding: 20px;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        
        .container {
            width: 100%;
            max-width: 500px;
            margin: 0 auto;
        }
        
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .header h1 {
            color: var(--primary-color);
            font-size: 28px;
            margin-bottom: 10px;
            position: relative;
            display: inline-block;
        }
        
        .header h1::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background-color: var(--accent-color);
        }
        
        .header p {
            color: #666;
            font-size: 16px;
        }
        
        .form-container {
            background-color: white;
            border-radius: 10px;
            box-shadow: var(--shadow);
            padding: 30px;
            transition: transform 0.3s ease;
        }
        
        .form-container:hover {
            transform: translateY(-5px);
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: var(--dark-color);
        }
        
        .input-group {
            position: relative;
        }
        
        input, select {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            transition: all 0.3s ease;
        }
        
        input:focus, select:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 2px rgba(52, 152, 219, 0.2);
        }
        
        .password-toggle {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            cursor: pointer;
            color: #777;
        }
        
        .radio-group {
            display: flex;
            gap: 20px;
            margin-top: 5px;
        }
        
        .radio-option {
            display: flex;
            align-items: center;
            gap: 5px;
        }
        
        .radio-option input {
            width: auto;
        }
        
        .btn {
            display: block;
            width: 100%;
            padding: 14px;
            background-color: var(--primary-color);
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        
        .btn:hover {
            background-color: var(--secondary-color);
        }
        
        .additional-info {
            margin-top: 20px;
            text-align: center;
            font-size: 14px;
            color: #666;
        }
        
        .additional-info a {
            color: var(--primary-color);
            text-decoration: none;
        }
        
        .additional-info a:hover {
            text-decoration: underline;
        }
        
        .footer {
            margin-top: 30px;
            text-align: center;
            color: #777;
            font-size: 14px;
        }
        
        @media (max-width: 576px) {
            .form-container {
                padding: 20px;
            }
            
            .header h1 {
                font-size: 24px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Pendaftaran User Pelatihan LKP</h1>
            <p>Daftarkan diri Anda untuk mengikuti pelatihan kami</p>
        </div>
        
        <div class="form-container">
            <form method="POST" action="proses_daftar.php" id="registrationForm">
                <div class="form-group">
                    <label for="username">Username</label>
                    <div class="input-group">
                        <input type="text" id="username" name="username" placeholder="Masukkan username" required>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="input-group">
                        <input type="password" id="password" name="password" placeholder="Masukkan password" required>
                        <button type="button" class="password-toggle" id="togglePassword">👁️</button>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="confirmPassword">Konfirmasi Password</label>
                    <div class="input-group">
                        <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Masukkan ulang password" required>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="fullName">Nama Lengkap</label>
                    <div class="input-group">
                        <input type="text" id="fullName" name="fullName" placeholder="Masukkan nama lengkap" required>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="email">Email</label>
                    <div class="input-group">
                        <input type="email" id="email" name="email" placeholder="Masukkan alamat email" required>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="phone">Nomor Telepon</label>
                    <div class="input-group">
                        <input type="tel" id="phone" name="phone" placeholder="Masukkan nomor telepon" required>
                    </div>
                </div>
                
                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <div class="radio-group">
                        <div class="radio-option">
                            <input type="radio" id="male" name="gender" value="Laki-laki" required>
                            <label for="male">Laki-laki</label>
                        </div>
                        <div class="radio-option">
                            <input type="radio" id="female" name="gender" value="Perempuan">
                            <label for="female">Perempuan</label>
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="training">Jenis Pelatihan</label>
                    <select id="training" name="training" required>
                        <option value="" disabled selected>Pilih jenis pelatihan</option>
                        <option value="Komputer Dasar">Komputer Dasar</option>
                        <option value="Pemrograman Web">Pemrograman Web</option>
                        <option value="Desain Grafis">Desain Grafis</option>
                        <option value="Digital Marketing">Digital Marketing</option>
                        <option value="Bahasa Inggris">Bahasa Inggris</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="address">Alamat</label>
                    <textarea id="address" name="address" rows="3" placeholder="Masukkan alamat lengkap" style="width: 100%; padding: 12px 15px; border: 1px solid #ddd; border-radius: 5px; font-size: 16px; resize: vertical;" required></textarea>
                </div>
                
                <div class="form-group">
                    <div class="radio-option">
                        <input type="checkbox" id="agree" name="agree" required>
                        <label for="agree">Saya menyetujui syarat dan ketentuan yang berlaku</label>
                    </div>
                </div>
                
                <button type="submit" class="btn">Daftar Sekarang</button>
            </form>
            
            <div class="additional-info">
                <p>Sudah punya akun? <a href="#">Login di sini</a></p>
            </div>
        </div>
        
        <div class="footer">
            <p>&copy; 2023 LKP Training Center. All rights reserved.</p>
        </div>
    </div>

    <script>
        // Toggle password visibility
        document.getElementById('togglePassword').addEventListener('click', function() {
            const passwordInput = document.getElementById('password');
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            this.textContent = type === 'password' ? '👁️' : '🔒';
        });
        
        // Form validation
        document.getElementById('registrationForm').addEventListener('submit', function(e) {
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirmPassword').value;
            
            if (password !== confirmPassword) {
                e.preventDefault();
                alert('Password dan Konfirmasi Password tidak cocok!');
                document.getElementById('password').focus();
            }
        });
        
        // Add some interactivity to form elements
        const inputs = document.querySelectorAll('input, select, textarea');
        inputs.forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.style.borderRadius = '5px';
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.style.borderRadius = '5px';
            });
        });
    </script>
</body>
</html>