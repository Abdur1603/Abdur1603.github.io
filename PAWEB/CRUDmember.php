<?php
require 'koneksi.php';

$sql = mysqli_query($koneksi, "SELECT membership.*, users.username, paket.jenis_paket FROM membership JOIN users ON membership.id_user = users.id JOIN paket ON membership.id_paket = paket.id_paket");

$memberships = [];
while ($row = mysqli_fetch_assoc($sql)) {
    $memberships[] = $row;
}

if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $sql = mysqli_query($koneksi, "SELECT membership.*, users.username, paket.jenis_paket FROM membership JOIN users ON membership.id_user = users.id JOIN paket ON membership.id_paket = paket.id_paket WHERE users.username LIKE '$search%' OR paket.jenis_paket LIKE '$search%'");
    $memberships = [];
    while ($row = mysqli_fetch_assoc($sql)) {
        $memberships[] = $row;
    }
}
include 'template/navbar.php';
?>

<main class="data-pelanggan-section">
    <h1 class="data-pelanggan-title">
        Data Pengguna
    </h1>
    <search>
        <form action="" method="GET" class="search-bar-pelanggan">
            <input type="text" name="search" placeholder="Cari username atau jenis paket di sini" class="search-input-pelanggan" />
            <button type="submit" class="search-button-pelanggan">Cari</button>
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
                <th class="table-pelanggan-header">Jenis Paket</th>
                <th class="table-pelanggan-header">Tanggal Awal</th>
                <th class="table-pelanggan-header">Tanggal Akhir</th>
                <th class="table-pelanggan-header">Status Member</th>
                <th class="table-pelanggan-header">Aksi</th>
            </tr>
        </thead>

        <tbody>
            <?php $i = 1;
            foreach ($memberships as $member) : ?>
                <tr class="table-pelanggan-row">
                    <td class="table-pelanggan-data"><?php echo $i ?></td>
                    <td class="table-pelanggan-data"><?php echo htmlspecialchars($member['username']) ?></td>
                    <td class="table-pelanggan-data"><?php echo htmlspecialchars($member['jenis_paket']) ?></td>
                    <td class="table-pelanggan-data"><?php echo htmlspecialchars($member['tanggal_awal']) ?></td>
                    <td class="table-pelanggan-data"><?php echo htmlspecialchars($member['tanggal_akhir']) ?></td>
                    <td class="table-pelanggan-data"><?php echo htmlspecialchars($member['status_member']) ?></td>
                    <td class="table-pelanggan-data">
                        <div class="button-UD">
                            <a href="deleteMembership.php?id=<?php echo $member['id_member'] ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?')">
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