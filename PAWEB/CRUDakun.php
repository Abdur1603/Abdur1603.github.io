<?php
require 'koneksi.php';

$sql = mysqli_query($koneksi, "SELECT * FROM users WHERE role = 'user'");

$users = [];
while ($row = mysqli_fetch_assoc($sql)) {
  $users[] = $row;
}

if (isset($_GET['search'])) {
  $search = $_GET['search'];
  $sql = mysqli_query($koneksi, "SELECT * FROM users WHERE username LIKE '%$search%' OR username LIKE '%$search%'");
  $users = [];
  while ($row = mysqli_fetch_assoc($sql)) {
    $users[] = $row;
  }
}
include 'template/navbar.php';
?>

<main class="data-pelanggan-section">
  <h1 class="data-pelanggan-title">
    Data Pengguna
  </h1>
  <div>
    <form action="" method="GET" class="search-bar-pelanggan">
      <input type="text" name="search" placeholder="Cari username atau nama pengguna di sini" class="search-input-pelanggan" />
      <button type="submit" class="search-button-pelanggan">Cari</button>
    </form>
  </div>
  <div class="container">
    <a href="DashboardAdmin.php">
      <button class="back">
        <p>Back</p>
      </button>
    </a>
  </div>
  <table class="table-pelanggan">
    <thead>
      <tr class="table-pelanggan-row">
        <th class="table-pelanggan-header">No</th>
        <th class="table-pelanggan-header">Username</th>
        <th class="table-pelanggan-header">Role</th>
        <th class="table-pelanggan-header">Aksi</th>
      </tr>
    </thead>

    <tbody>
      <?php $i = 1;
      foreach ($users as $user) : ?>
        <tr class="table-pelanggan-row">
          <td class="table-pelanggan-data"><?php echo $i ?></td>
          <td class="table-pelanggan-data"><?php echo htmlspecialchars($user['username']) ?></td>
          <td class="table-pelanggan-data"><?php echo htmlspecialchars($user['role']) ?></td>
          <td class="table-pelanggan-data">
            <div class="button-UD">
              <a href="deleteAkun.php?id=<?php echo $user['id'] ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?')">
                <button class="hapus-data">
                  <i class="fa-solid fa-trash" style="color: #ffffff;"></i>
                </button>
              </a>
            </div>
          </td>
        </tr>
      <?php $i++;
      endforeach; ?>
    </tbody>
  </table>
</main>
<script src="script.js"></script>
<?php
include 'template/footer.php';
?>
