<?php
require 'koneksi.php';


$sql = mysqli_query($koneksi, "SELECT * FROM data_plgn");

$pelanggan = [];
while ($row = mysqli_fetch_assoc($sql)) {
  $pelanggan[] = $row;
}

if (isset($_GET['search'])) {
  $search = $_GET['search'];
  // Query SQL untuk mencari data berdasarkan nama atau NIM
  $sql = mysqli_query($koneksi, "SELECT * FROM data_plgn WHERE nama LIKE '%$search%'");
  // Menyiapkan array untuk menyimpan hasil pencarian
  $pelanggan = [];
  // Memindahkan data dari $sql ke array $mahasiswa
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

  <table class="table-pelanggan">
    <thead>
      <tr class="table-pelanggan-row">
        <th class="table-pelanggan-header">No</th>
        <th class="table-pelanggan-header">Nama</th>
        <th class="table-pelanggan-header">No. HP</th>
        <th class="table-pelanggan-header">Pembayaran</th>
        <th class="table-pelanggan-header">Durasi Langganan</th>
        <th class="table-pelanggan-header">Bukti Pembayaran</th>
        <th class="table-pelanggan-header">Aksi</th>
      </tr>
    </thead>

    <tbody>
      <?php $i = 1;
      foreach ($pelanggan as $data_plgn) : ?>
        <tr class="table-pelanggan-row">
          <td class="table-pelanggan-data"><?php echo $i ?></td>
          <td class="table-pelanggan-data"><?php echo $data_plgn['nama'] ?></td>
          <td class="table-pelanggan-data"><?php echo $data_plgn['no_hp'] ?></td>
          <td class="table-pelanggan-data"><?php echo $data_plgn['pembayaran'] ?></td>
          <td class="table-pelanggan-data"><?php echo $data_plgn['durasi'] ?> Bulan</td>
          <td class="img-container"><img src="images/<?php echo $data_plgn['bukti_pembayaran'] ?>"
              alt="<?php echo $data_plgn['nama'] ?>">
          </td>
          <td class="table-pelanggan-data">
            <div class="button-UD">
              <a href="edit.php?id=<?php echo $data_plgn['id'] ?>">
                <button class="edit-data">
                  <i class="fa-solid fa-pen" style="color: #ffffff;"></i>
                </button>
              </a>
              <a href="delete.php?id=<?php echo $data_plgn['id'] ?>" onclick="return confirm('Yakin ingin menghapus data ini?');">
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