<?php
require 'koneksi.php';
include 'template/navbar.php';
include 'template/header.php';

$id_paket = isset($_GET['id_paket']) ? $_GET['id_paket'] : null;
$durasi = '';
$harga = '';
$jenis = '';
$satuan = '';
if ($id_paket) {
    $query = "SELECT durasi_paket, harga_paket, jenis_paket, satuan_durasi FROM paket WHERE id_paket = ?";
    $stmt = $koneksi->prepare($query);
    $stmt->bind_param("i", $id_paket);
    $stmt->execute();
    $stmt->bind_result($durasi, $harga, $jenis, $satuan);
    $stmt->fetch();
    $stmt->close();
} else {
    echo "Paket tidak ditemukan.";
}
?>

<div class="form-container">
    <h2>Detail Pemesanan Membership</h2>
    <div class="membership-details">
        <p><strong><?= $jenis ?></strong> </p>
        <p><strong>Durasi:</strong> <?= $durasi ?> <?= $satuan ?></p>
        <p><strong>Harga:</strong> Rp<?= number_format($harga, 0, ',', '.') ?></p>
    </div>
    <form method="POST" action="detail.php?id_paket=<?= $id_paket ?>&id_user=<?= $_SESSION['id'] ?>" enctype="multipart/form-data">
        <input type="hidden" name="id_paket" value="<?= $id_paket ?>">
        <input type="hidden" name="durasi" value="<?= $durasi ?>">
        <input type="hidden" name="harga" value="<?= $harga ?>">
        <input type="hidden" name="jenis" value="<?= $jenis ?>">
        <input type="hidden" name="satuan" value="<?= $satuan ?>">
        <input type="hidden" name="id_user" value="<?= $_SESSION['id']?>">
        

        <div class="form-group">
            <label for="nama">Nama Lengkap</label>
            <input type="text" id="nama" name="nama" placeholder="Masukkan nama lengkap" required>
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
            <label class="label-field" for="foto">Bukti Pembayaran</label>
            <input type="file" name="foto" id="foto" required>
        </div>
        <div class="form-group">
            <button class="btn" type="submit">Pesan</button>
        </div>
    </form>
</div>

<?php
include 'template/footer.php';
?>