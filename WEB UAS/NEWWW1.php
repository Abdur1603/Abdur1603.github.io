<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="NEWWW1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <?php include('partials/head.php'); ?>

    
</head>
<body>
    <?php
    // Koneksi ke database
    $conn = new mysqli("localhost", "username", "password", "db_segar");

    // Cek koneksi
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    // Query untuk menghitung jumlah pelanggan yang bukan admin
    $query_pelanggan = "SELECT COUNT(*) AS total_pelanggan FROM pengguna WHERE role != 'admin'";
    $result_pelanggan = $conn->query($query_pelanggan);
    $total_pelanggan = $result_pelanggan->fetch_assoc()['total_pelanggan'];

    // Query untuk menghitung jumlah instruktur
    $query_instruktur = "SELECT COUNT(*) AS total_instruktur FROM instruktur";
    $result_instruktur = $conn->query($query_instruktur);
    $total_instruktur = $result_instruktur->fetch_assoc()['total_instruktur'];

    // Query untuk menghitung jumlah kelas
    $query_kelas = "SELECT COUNT(*) AS total_kelas FROM kelas";
    $result_kelas = $conn->query($query_kelas);
    $total_kelas = $result_kelas->fetch_assoc()['total_kelas'];

    // Query untuk menghitung total pelanggan per kelas (jumlah transaksi per kelas)
    $query_pelanggan_per_kelas = "SELECT COUNT(DISTINCT id_akun) AS total_pelanggan_per_kelas FROM transaksi";
    $result_pelanggan_per_kelas = $conn->query($query_pelanggan_per_kelas);
    $total_pelanggan_per_kelas = $result_pelanggan_per_kelas->fetch_assoc()['total_pelanggan_per_kelas'];

    // Tutup koneksi database
    $conn->close();
    ?>

    <?php include('partials/navbar.php'); ?>

        <!-- <div class="logo">
            <img src="logo.png" alt="Logo" width="50"> 
        </div>
        <nav>
            <a href="#" class="highlight">Dashboard</a>
            <a href="#">Pelanggan</a>
            <a href="#">Instruktur</a>
            <a href="#">Kelas</a>
            <a href="#"><i class="fas fa-user-circle icon-button" style="font-size: 23px;"></i></a>
            <a href="logout.php"><i class="fas fa-sign-out-alt icon-button" style="font-size: 23px;"></i></a> -->

    <div class="card-container">
        <div class="card">
            <div class="card-content">
                <div class="card-left">
                    <h2><?php echo $total_pelanggan; ?></h2>
                </div>
                <div class="card-right">
                    <p class="card-title">Total Pelanggan</p>
                </div>
            </div>
            <a href="admin_daftar_pelanggan.php" class="card-link">Lihat Selengkapnya &gt;</a>
        </div>
        
        <div class="card">
            <div class="card-content">
                <div class="card-left">
                    <h2><?php echo $total_instruktur; ?></h2>
                </div>
                <div class="card-right">
                    <p class="card-title">Total Instruktur</p>
                </div>
            </div>
            <a href="admin_daftar_instruktur.php" class="card-link">Lihat Selengkapnya &gt;</a>
        </div>
        
        <div class="card">
            <div class="card-content">
                <div class="card-left">
                    <h2><?php echo $total_kelas; ?></h2>
                </div>
                <div class="card-right">
                    <p class="card-title">Total Kelas</p>
                </div>
            </div>
            <a href="admin_daftar_kelas.php" class="card-link">Lihat Selengkapnya &gt;</a>
        </div>
        
        <div class="card">
            <div class="card-content">
                <div class="card-left">
                    <h2><?php echo $total_pelanggan_per_kelas; ?></h2>
                </div>
                <div class="card-right">
                    <p class="card-title">Total Pelanggan Per Kelas</p>
                </div>
            </div>
            <a href="NEWWW2.php" class="card-link">Lihat Selengkapnya &gt;</a>
        </div>
    </div>
    
    <footer>
        <p>&copy; 2024 SEGAR "Sehat & Bugar"</p>
        <div class="footer-links">
            <a href="#">Term of Use</a>
            <a href="#">Privacy Policy</a>
        </div>
    </footer>
</body>
</html>
