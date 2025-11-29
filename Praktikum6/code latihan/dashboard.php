<?php
session_start();

// Cek apakah user sudah login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include "koneksi.php";

// Ambil data user
$username = $_SESSION['username'];
$sql_user = "SELECT * FROM user WHERE username='$username'";
$result_user = mysqli_query($conn, $sql_user);
$user = mysqli_fetch_assoc($result_user);

// Hitung statistik
$sql_peserta = "SELECT COUNT(*) as total FROM user";
$result_peserta = mysqli_query($conn, $sql_peserta);
$total_peserta = mysqli_fetch_assoc($result_peserta)['total'];

$sql_pelatihan = "SELECT COUNT(*) as total FROM pelatihan";
$result_pelatihan = mysqli_query($conn, $sql_pelatihan);
$total_pelatihan = mysqli_fetch_assoc($result_pelatihan)['total'];

// Ambil data pelatihan
$sql_data_pelatihan = "SELECT * FROM pelatihan ORDER BY tanggal_mulai DESC LIMIT 5";
$result_pelatihan = mysqli_query($conn, $sql_data_pelatihan);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Pelatihan LKP</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background: #f5f7fa;
            color: #333;
        }

        .header {
            background: white;
            padding: 15px 30px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
            color: #3498db;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .user-info span {
            color: #666;
        }

        .logout-btn {
            background: #e74c3c;
            color: white;
            padding: 8px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }

        .logout-btn:hover {
            background: #c0392b;
        }

        .container {
            display: flex;
            min-height: calc(100vh - 70px);
        }

        .sidebar {
            width: 250px;
            background: #2c3e50;
            color: white;
            padding: 20px 0;
        }

        .sidebar-menu {
            list-style: none;
        }

        .sidebar-menu li {
            padding: 12px 25px;
            border-bottom: 1px solid #34495e;
        }

        .sidebar-menu li a {
            color: white;
            text-decoration: none;
            display: block;
        }

        .sidebar-menu li:hover {
            background: #34495e;
        }

        .sidebar-menu li.active {
            background: #3498db;
        }

        .main-content {
            flex: 1;
            padding: 30px;
        }

        .welcome-section {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin-bottom: 30px;
        }

        .welcome-section h1 {
            color: #2c3e50;
            margin-bottom: 10px;
        }

        .stats-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            text-align: center;
        }

        .stat-card h3 {
            color: #666;
            font-size: 14px;
            margin-bottom: 10px;
        }

        .stat-number {
            font-size: 36px;
            font-weight: bold;
            color: #3498db;
        }

        .recent-activities {
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .recent-activities h2 {
            color: #2c3e50;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #f5f7fa;
        }

        .activity-list {
            list-style: none;
        }

        .activity-list li {
            padding: 15px;
            border-bottom: 1px solid #f5f7fa;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .activity-list li:last-child {
            border-bottom: none;
        }

        .activity-info h4 {
            color: #2c3e50;
            margin-bottom: 5px;
        }

        .activity-info p {
            color: #666;
            font-size: 14px;
        }

        .activity-status {
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
        }

        .status-active {
            background: #e8f6ef;
            color: #27ae60;
        }

        .status-upcoming {
            background: #fff4e6;
            color: #f39c12;
        }

        .status-completed {
            background: #f0f0f0;
            color: #666;
        }

        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
            }

            .stats-cards {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="logo">LKP Training Center</div>
        <div class="user-info">
            <span>Selamat datang, <strong><?php echo $user['username']; ?></strong></span>
            <a href="logout.php" class="logout-btn">Logout</a>
        </div>
    </div>

    <div class="container">
        <div class="sidebar">
            <ul class="sidebar-menu">
                <li class="active"><a href="dashboard.php">Dashboard</a></li>
                <li><a href="pelatihan.php">Data Pelatihan</a></li>
                <li><a href="peserta.php">Data Peserta</a></li>
                <li><a href="laporan.php">Laporan</a></li>
                <li><a href="pengaturan.php">Pengaturan</a></li>
            </ul>
        </div>

        <div class="main-content">
            <div class="welcome-section">
                <h1>Selamat Datang di Dashboard LKP</h1>
                <p>Halo <strong><?php echo $user['username']; ?></strong>, selamat datang kembali di sistem manajemen pelatihan LKP.</p>
            </div>

            <div class="stats-cards">
                <div class="stat-card">
                    <h3>Total Peserta</h3>
                    <div class="stat-number"><?php echo $total_peserta; ?></div>
                    <p>Peserta terdaftar</p>
                </div>
                <div class="stat-card">
                    <h3>Total Pelatihan</h3>
                    <div class="stat-number"><?php echo $total_pelatihan; ?></div>
                    <p>Program pelatihan</p>
                </div>
                <div class="stat-card">
                    <h3>Pelatihan Aktif</h3>
                    <div class="stat-number">3</div>
                    <p>Sedang berjalan</p>
                </div>
            </div>

            <div class="recent-activities">
                <h2>Pelatihan Terbaru</h2>
                <ul class="activity-list">
                    <?php if (mysqli_num_rows($result_pelatihan) > 0): ?>
                        <?php while ($pelatihan = mysqli_fetch_assoc($result_pelatihan)): ?>
                            <li>
                                <div class="activity-info">
                                    <h4><?php echo $pelatihan['nama_pelatihan']; ?></h4>
                                    <p>Tanggal: <?php echo date('d M Y', strtotime($pelatihan['tanggal_mulai'])); ?> - 
                                       <?php echo date('d M Y', strtotime($pelatihan['tanggal_selesai'])); ?></p>
                                </div>
                                <span class="activity-status status-active">Aktif</span>
                            </li>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <li>
                            <div class="activity-info">
                                <h4>Belum ada pelatihan</h4>
                                <p>Silakan tambahkan data pelatihan</p>
                            </div>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>