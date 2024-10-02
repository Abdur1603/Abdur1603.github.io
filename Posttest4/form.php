<?php
$durasi = isset($_GET['durasi']) ? $_GET['durasi'] : '';
$harga = isset($_GET['harga']) ? $_GET['harga'] : '';
$gambar = isset($_GET['gambar']) ? $_GET['gambar'] : '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $no_hp = $_POST['no_hp'];
    $payment = $_POST['payment'];
    if (!empty($nama) && !empty($no_hp) && !empty($payment)) {
        header("Location: detail.php?durasi=$durasi&harga=$harga&nama=$nama&no_hp=$no_hp&payment=$payment");
        exit();
    } else {
        echo "<h3>Mohon masukkan semua informasi yang diminta.</h3>";
    }
}
include 'template/navbar.php';
include 'template/header.php';
?>

<div class="form-container">
    <h2>Detail Pemesanan Membership</h2>
    <div class="membership-details">
        <img src="<?=$gambar?>" alt="Membership Image">
        <p><strong>Durasi:</strong> <?=$durasi?> Bulan</p>
        <p><strong>Harga:</strong> Rp<?=$harga?>,00</p>
    </div>
    <form method="POST" action="detail.php">
    <input type="hidden" name="durasi" value="<?=$durasi?>">
    <input type="hidden" name="harga" value="<?=$harga?>">
    <input type="hidden" name="gambar" value="<?=$gambar?>">

    <div class="form-group">
        <label for="nama">Nama Lengkap</label>
        <input type="text" id="nama" name="nama" placeholder="Masukkan nama lengkap" required>
    </div>
    <div class="form-group">
        <label for="no_hp">Nomor HP</label>
        <input type="text" id="no_hp" name="no_hp" placeholder="Masukkan nomor HP" required>
    </div>
    <div class="form-group">
        <label for="payment">Metode Pembayaran</label>
        <select id="payment" name="payment" required>
            <option value="" disabled selected>Pilih metode pembayaran</option>
            <option value="Transfer Bank">Transfer Bank</option>
            <option value="Kartu Kredit">Kartu Kredit</option>
            <option value="OVO">OVO</option>
            <option value="GoPay">GoPay</option>
            <option value="Dana">Dana</option>
        </select>
    </div>
    <div class="form-group">
        <button class="btn" type="submit">Pesan</button>
    </div>
</form>
</div>
<?php
  include 'template/footer.php';
?>
