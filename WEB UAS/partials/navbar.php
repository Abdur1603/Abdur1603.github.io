<style>
    .navbar {
        position: sticky;
        top: 0;
        z-index: 1000;
        background: var(--bg-primary);
    }

    .navbar img {
        width: 70%;
    }

    .nav-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: var(--spacing-xs) 0;
    }

    .logo {
        font-size: 2rem;
        font-weight: bold;
        color: var(--primary-color);
        text-decoration: none;
    }
    .nav-link.profile, .nav-link.logout {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 1.5rem;
        height: 1.5rem;
    }

    .nav-link.profile img, .nav-link.logout img {
        width: 100%;
        height: 100%;
        object-fit: contain;
    }
</style>
<?php
$halamanSekarang = basename($_SERVER['SCRIPT_NAME']);

function isActive($halaman) {
    global $halamanSekarang;
    return $halamanSekarang === $halaman ? 'active' : '';
}
?>
<nav class="navbar">
    <div class="container nav-container">
        <a href="#" class="logo"><img src="assets/logo.png" alt=""></a>
        <div class="hamburger">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') { ?>
            <div class="nav-menu">
                <a href="" class="nav-link <?= isActive('dashboard.php'); ?>">Dashboard</a>
                <a href="" class="nav-link <?= isActive('pelanggan.php'); ?>">Pelanggan</a>
                <a href="" class="nav-link <?= isActive('instruktur.php'); ?>">Instruktur</a>
                <a href="" class="nav-link <?= isActive('kelas.php'); ?>">Kelas</a>
                <a href="profile.php" class="nav-link profile"><img src="assets/profile.png" alt=""></a>
                <a href="logout.php" class="nav-link logout"><img src="assets/logout.png" alt=""></a>
            </div>
        <?php } else {?>
            <div class="nav-menu">
                <a href="" class="nav-link <?= isActive('index.php'); ?>">Beranda</a>
                <a href="" class="nav-link  <?= isActive('layanan.php'); ?>">Layanan</a>
                <?php if (isset($_SESSION['is_login']) && $_SESSION['is_login'] === true) { ?>
                    <a href="" class="nav-link <?= isActive('riwayat.php'); ?>">Riwayat</a>
                    <a href="" class="nav-link <?= isActive('topup.php'); ?>">Top Up</a>
                    <a href="profile.php" class="nav-link profile"><img src="assets/profile.png" alt=""></a>
                    <a href="logout.php" class="nav-link logout"><img src="assets/logout.png" alt=""></a>
                <?php } else {?>
                    <a href="tampilParfum.php" class="nav-link  <?= isActive('tentang.php'); ?>">Tentang Kami</a>
                    <a class="btn btn-outline" href="login.php">Masuk</a>
                    <a class="btn btn-primary" href="daftar.php">Daftar</a>
                <?php } ?>
            </div>
        <?php }?>
    </div>
</nav>