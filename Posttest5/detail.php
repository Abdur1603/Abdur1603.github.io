<?php
require 'koneksi.php';
$durasi = isset($_GET['durasi']) ? $_GET['durasi'] : '';
$harga = isset($_GET['harga']) ? $_GET['harga'] : '';
$gambar = isset($_GET['gambar']) ? $_GET['gambar'] : '';
$nama = isset($_GET['nama']) ? $_GET['nama'] : '';
$no_hp = isset($_GET['no_hp']) ? $_GET['no_hp'] : '';
$payment = isset($_GET['payment']) ? $_GET['payment'] : '';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $no_hp = $_POST['no_hp'];
    $payment = $_POST['payment'];
    $harga = $_POST['harga'];
    $durasi = $_POST['durasi'];
    $sql = "INSERT INTO plgn (nama, no_hp, pembayaran, durasi) VALUES ('$nama', '$no_hp', '$payment', '$durasi')";
    $query = mysqli_query($koneksi, $sql);
    if ($query) {
        echo "<script>
        alert('Data berhasil ditambahkan!');
        document.location.href = 'CRUDAdmin.php';
        </script>";
    } else {
        echo "<script>
        alert('Data gagal ditambahkan!');
        document.location.href = 'CRUDAdmin.php';
        </script>";
    }
}

include 'template/navbar.php';
include 'template/header.php';
?>

<div class="header-summary">
    <h1>Pemesanan Berhasil!</h1>
    <p>Pesanan membership Anda telah diterima</p>
</div>

<div class="order-details">
    <div>
        <p class="key">Nama:</p>
        <p><?php echo $nama; ?></p>
    </div>
    <div>
        <p class="key">Nomor HP:</p>
        <p><?php echo $no_hp; ?></p>
    </div>
    <div>
        <p class="key">Durasi Membership:</p>
        <p><?php echo $durasi; ?> Bulan</p>
    </div>
    <div>
        <p class="key">Metode Pembayaran:</p>
        <p><?php echo $payment; ?></p>
    </div>
    <div>
        <p class="key">Total Harga:</p>
        <p>Rp<?php echo $harga; ?>,00</p>
    </div>
</div>

<?php
include "template/footer.php";
?>
