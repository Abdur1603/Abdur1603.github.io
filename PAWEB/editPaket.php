<?php

require 'koneksi.php';

if (isset($_GET['id'])) {
    $id_paket = $_GET['id'];

    $query = $koneksi->prepare("SELECT * FROM paket WHERE id_paket = ?");
    $query->bind_param('i', $id_paket);
    $query->execute();
    $result = $query->get_result();
    $paket = $result->fetch_assoc();

    if (isset($_POST['ubah'])) {
        $jenis_paket = $_POST['jenis_paket'];
        $durasi_paket = $_POST['durasi_paket'];
        $satuan_durasi = $_POST['satuan_durasi'];
        $harga_paket = $_POST['harga_paket'];

        $sql = "UPDATE paket SET harga_paket='$harga_paket', durasi_paket='$durasi_paket', satuan_durasi='$satuan_durasi', jenis_paket='$jenis_paket' WHERE id_paket =$id_paket";
        $result = mysqli_query($koneksi, $sql);
        if ($result) {
            echo "
            <script>
                alert('Data paket berhasil diperbarui!');
                document.location.href = 'CRUDpaket.php';
            </script>";
        } else {
            echo "
            <script>
                alert('Data paket gagal diperbarui!');
                document.location.href = 'editPaket.php?id=$id_paket';
            </script>";
        }
    }
} else {
    echo "
    <script>
        alert('ID paket tidak ditemukan!');
        document.location.href = 'CRUDpaket.php';
    </script>";
    exit;
}

include 'template/navbar.php';
?>

<main class="data-pelanggan-section">
    <h1 class="data-pelanggan-title">
        Ubah Data Paket
    </h1>

    <div class="container">
        <a href="CRUDpaket.php">
            <button class="back">
                <p>Back</p>
            </button>
        </a>
    </div>

    <div class="form-container">
        <h2>Detail Paket</h2>
        <form method="POST" action="">
            <div class="form-group">
                <label for="jenis_paket">Jenis Paket</label>
                <input type="text" id="jenis_paket" name="jenis_paket" value="<?php echo htmlspecialchars($paket['jenis_paket']); ?>" required>
            </div>
            <div class="form-group">
                <label for="jenis_paket">Durasi Paket</label>
                <input type="number" id="durasi_paket" name="durasi_paket" value="<?php echo htmlspecialchars($paket['durasi_paket']); ?>" required>
            </div>
            <div class="form-group">
            <label for="satuan_durasi">Satuan Durasi</label>
            <select id="satuan_durasi" name="satuan_durasi" required>
                <option value="" disabled selected><?php echo htmlspecialchars($paket['satuan_durasi']); ?></option>
                <option value="menit">Menit</option>
                <option value="jam">Jam</option>
                <option value="hari">Hari</option>
                <option value="minggu">Minggu</option>
                <option value="bulan">Bulan</option>
                <option value="tahun">Tahun</option>
            </select>
        </div>
            <div class="form-group">
                <label for="jenis_paket">Harga Paket</label>
                <input type="number" id="harga_paket" name="harga_paket" value="<?php echo htmlspecialchars($paket['harga_paket']); ?>" required>
            </div>
            <div class="form-group">
                <button class="btn" type="submit" value="ubah" name="ubah">Ubah Data</button>
            </div>
        </form>
    </div>
</main>

<script src="script.js"></script>
<?php
include 'template/footer.php';
?>