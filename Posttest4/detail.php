<?php
$durasi = isset($_POST['durasi']) ? $_POST['durasi'] : '';
$harga = isset($_POST['harga']) ? $_POST['harga'] : '';
$gambar = isset($_POST['gambar']) ? $_POST['gambar'] : '';
$nama = isset($_POST['nama']) ? $_POST['nama'] : '';
$no_hp = isset($_POST['no_hp']) ? $_POST['no_hp'] : '';
$payment = isset($_POST['payment']) ? $_POST['payment'] : '';

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
