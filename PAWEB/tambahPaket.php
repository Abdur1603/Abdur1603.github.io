<?php
require 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $harga_paket = $_POST['harga_paket'];
    $durasi_paket = $_POST['durasi_paket'];
    $jenis_paket = $_POST['jenis_paket'];
    $satuan_durasi = $_POST['satuan_durasi'];
    $sql = "INSERT INTO paket (harga_paket, durasi_paket, satuan_durasi ,jenis_paket) VALUES ('$harga_paket', '$durasi_paket', '$satuan_durasi', '$jenis_paket')";
    $query = mysqli_query($koneksi, $sql);
    if ($query) {
        echo "<script>
        alert('Data berhasil ditambahkan!');
        document.location.href = 'CRUDpaket.php';
        </script>";
    } else {
        echo "<script>
        alert('Data gagal ditambahkan!');
        document.location.href = 'CRUDpaket.php';
        </script>";
    }
}
include 'template/navbar.php';
?>
<div class="form-container">
<div class="container">
      <a href="CRUDpaket.php">
        <button class="back">
          <p>Kembali</p>
        </button>
      </a>
    </div>
    <h2>Tambah Paket</h2>
    <form method="POST">
        <div class="form-group">
            <label for="jenis_paket">Jenis Paket</label>
            <input type="text" id="jenis_paket" name="jenis_paket" placeholder="Masukkan Jenis Paket" required>
        </div>
        <div class="form-group">
            <label for="harga_paket">Harga Paket</label>
            <input type="text" id="harga_paket" name="harga_paket" placeholder="Masukkan Harga paket" required>
        </div>
        <div class="form-group">
            <label for="satuan_durasi">Satuan Durasi</label>
            <select id="satuan_durasi" name="satuan_durasi" required>
                <option value="" disabled selected>Pilih satuan durasi</option>
                <option value="menit">Menit</option>
                <option value="jam">Jam</option>
                <option value="hari">Hari</option>
                <option value="minggu">Minggu</option>
                <option value="bulan">Bulan</option>
                <option value="tahun">Tahun</option>
            </select>
        </div>
        <div class="form-group">
            <label for="durasi_paket">Durasi Paket</label>
            <input type="text" id="durasi_paket" name="durasi_paket" placeholder="Masukkan Durasi Paket" required>
        </div>
        <div class="form-group">
            <button class="btn" type="submit">Tambah Paket</button>
        </div>
    </form>
</div>

<?php
include 'template/footer.php';
?>