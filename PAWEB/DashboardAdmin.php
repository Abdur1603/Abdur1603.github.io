<?php
require 'koneksi.php';
$query_akun = mysqli_query($koneksi, "SELECT COUNT(*) as total_akun FROM users");
$total_akun = mysqli_fetch_assoc($query_akun)['total_akun'];

$query_paket = mysqli_query($koneksi, "SELECT COUNT(*) as total_paket FROM paket");
$total_paket = mysqli_fetch_assoc($query_paket)['total_paket'];

$query_pembayaran = mysqli_query($koneksi, "SELECT COUNT(*) as total_pembayaran FROM data_plgn");
$total_pembayaran = mysqli_fetch_assoc($query_pembayaran)['total_pembayaran'];

$query_membership = mysqli_query($koneksi, "SELECT COUNT(*) as total_membership FROM membership");
$total_membership = mysqli_fetch_assoc($query_membership)['total_membership'];

include 'template/navbar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="styles/DashboardAdmin.css">
</head>
<body>
    <div class="dashboard">
        <div class="kartu">
            <div class="konten">
                <p class="number"><?=$total_akun?></p>
                <div class="text">
                    <h2>Total Akun</h2>
                    <div class="separator"></div>
                    <a href="CRUDakun.php">Lihat Selengkapnya &gt;</a>
                </div>
            </div>
        </div>
        <div class="kartu">
            <div class="konten">
                <p class="number"><?=$total_paket?></p>
                <div class="text">
                    <h2>Total Paket</h2>
                    <div class="separator"></div>
                    <a href="CRUDpaket.php">Lihat Selengkapnya &gt;</a>
                </div>
            </div>
        </div>
        <div class="kartu">
            <div class="konten">
                <p class="number"><?=$total_pembayaran?></p>
                <div class="text">
                    <h2>Total Pembayaran</h2>
                    <div class="separator"></div>
                    <a href="CRUDpembayaran.php">Lihat Selengkapnya &gt;</a>
                </div>
            </div>
        </div>
        <div class="kartu">
            <div class="konten">
                <p class="number"><?=$total_membership?></p>
                <div class="text">
                    <h2>Total Membership</h2>
                    <div class="separator"></div>
                    <a href="CRUDmember.php">Lihat Selengkapnya &gt;</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<script src="script.js"></script>
<?php
include 'template/footer.php';
?>
