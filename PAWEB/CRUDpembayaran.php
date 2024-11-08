<?php

require 'koneksi.php';


$sql = mysqli_query($koneksi, "SELECT data_plgn.*, users.username FROM data_plgn JOIN users ON data_plgn.id_user = users.id");

$pelanggan = [];
while ($row = mysqli_fetch_assoc($sql)) {
  $pelanggan[] = $row;
}

if (isset($_GET['search'])) {
  $search = $_GET['search'];
  $sql = mysqli_query($koneksi, "SELECT data_plgn.*, users.username FROM data_plgn JOIN users ON data_plgn.id_user = users.id WHERE users.username LIKE '%$search%' OR data_plgn.nama LIKE '%$search%'");
  $pelanggan = [];
  while ($row = mysqli_fetch_assoc($sql)) {
    $pelanggan[] = $row;
  }
}
include 'template/navbar.php';
?>

<main class="data-pelanggan-section">
  <h1 class="data-pelanggan-title">
    Data Pelanggan
  </h1>
  <search>
    <form action="" method="GET" class="search-bar-pelanggan">
      <input type="text" name="search" placeholder="Cari nama pelanggan di sini"
        class="search-input-pelanggan" />
      <button type="submit" class="search-button-pelanggan">
        <i class="fa-solid fa-magnifying-glass fa-xl"></i>
      </button>
    </form>
  </search>
  <div class="container">
    <a href="DashboardAdmin.php">
      <button class="back">
        <p>Kembali</p>
      </button>
    </a>
  </div>
  <table class="table-pelanggan">
    <thead>
      <tr class="table-pelanggan-row">
        <th class="table-pelanggan-header">No</th>
        <th class="table-pelanggan-header">Username</th>
        <th class="table-pelanggan-header">Nama</th>
        <th class="table-pelanggan-header">Pembayaran</th>
        <th class="table-pelanggan-header">Bukti Pembayaran</th>
        <th class="table-pelanggan-header">Aksi</th>
      </tr>
    </thead>

    <tbody>
      <?php $i = 1;
      foreach ($pelanggan as $data_plgn) : ?>
        <tr class="table-pelanggan-row">
          <td class="table-pelanggan-data"><?php echo $i ?></td>
          <td class="table-pelanggan-data"><?php echo $data_plgn['username'] ?></td>
          <td class="table-pelanggan-data"><?php echo $data_plgn['nama'] ?></td>
          <td class="table-pelanggan-data"><?php echo $data_plgn['pembayaran'] ?></td>
          <td class="img-container"><img src="images/<?php echo $data_plgn['bukti_pembayaran'] ?>"
              alt="<?php echo $data_plgn['nama'] ?>">
          </td>
          <td class="table-pelanggan-data">
            <div class="button-UD">
              <a href="editPembayaran.php?id=<?php echo $data_plgn['id_bayar'] ?>">
                <button class="edit-data">
                  <i class="fa-solid fa-pen" style="color: #ffffff;"></i>
                </button>
              </a>
              <a href="deletePembayaran.php?id=<?php echo $data_plgn['id_bayar'] ?>" onclick="return confirm('Yakin ingin menghapus data ini?');">
                <button class="hapus-data">
                  <i class="fa-solid fa-trash-can" style="color: #ffffff;"></i>
                </button>
              </a>
            </div>
          </td>
        </tr>
      <?php $i++;
      endforeach ?>
    </tbody>
  </table>
</main>
<script src="script.js"></script>
<?php
include 'template/footer.php';
?>