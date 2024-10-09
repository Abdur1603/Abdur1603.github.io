<?php
require 'koneksi.php';
$sql = mysqli_query($koneksi, "SELECT * FROM plgn");

$pelanggan = [];
while($row = mysqli_fetch_assoc($sql)) {
  $pelanggan[] = $row;
}

include 'template/navbar.php';
include 'template/header.php';
?>

  <main class="data-pelanggan-section">
    <h1 class="data-pelanggan-title">
      Data Pelanggan
    </h1>

    <div class="container">
    <a href="index.php">
      <button class="tambah">
        <p>Tambah</p>
      </button>
      <a href="index.php">
        <button class="back">
          <p>Back</p>
        </button>
      </a>
    </div>

    <table class="table-pelanggan">
      <thead>
        <tr class="table-pelanggan-row">
          <th class="table-pelanggan-header">No</th>
          <th class="table-pelanggan-header">Nama</th>
          <th class="table-pelanggan-header">No. HP</th>
          <th class="table-pelanggan-header">Pembayaran</th>
          <th class="table-pelanggan-header">Durasi Langganan</th>
        </tr>
      </thead>

      <tbody>
        <?php $i = 1; foreach($pelanggan as $plgn) : ?>
          <tr class="table-pelanggan-row">
            <td class="table-pelanggan-data"><?php echo $i?></td>
            <td class="table-pelanggan-data"><?php echo $plgn['nama']?></td>
            <td class="table-pelanggan-data"><?php echo $plgn['no_hp']?></td>
            <td class="table-pelanggan-data"><?php echo $plgn['pembayaran']?></td>
            <td class="table-pelanggan-data"><?php echo $plgn['durasi']?> Bulan</td>
            <td class="table-pelanggan-data">
            <div class="button-UD">
                <a href="edit.php?id=<?php echo $plgn['id']?>">
                  <button class="edit-data">
                    <i class="fa-solid fa-pen" style="color: #ffffff;"></i>
                  </button>
                </a>
                <a href="delete.php?id=<?php echo $plgn['id']?>" onclick="return confirm('Yakin ingin menghapus data ini?');">
                  <button class="hapus-data">
                    <i class="fa-solid fa-trash-can" style="color: #ffffff;"></i>
                  </button>
                </a>
              </div>
            </td>
          </tr>
        <?php $i++; endforeach ?>
      </tbody>
    </table>
  </main>
  <script src="script.js"></script>
  <?php
include 'template/footer.php';
?>