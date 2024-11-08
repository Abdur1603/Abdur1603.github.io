<?php
require 'koneksi.php';

$sql = mysqli_query($koneksi, "SELECT * FROM paket");

$pakets = [];
while ($row = mysqli_fetch_assoc($sql)) {
    $pakets[] = $row;
}

if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $sql = mysqli_query($koneksi, "SELECT * FROM paket WHERE jenis_paket LIKE '$search%'");
    $pakets = [];
    while ($row = mysqli_fetch_assoc($sql)) {
        $pakets[] = $row;
    }
}
include 'template/navbar.php';
?>

<main class="data-pelanggan-section">
    <h1 class="data-pelanggan-title">
        Data Paket
    </h1>
    <search>
        <form action="" method="GET" class="search-bar-pelanggan">
            <input type="text" name="search" placeholder="Cari Jenis Paket di sini" class="search-input-pelanggan" />
            <button type="submit" class="search-button-pelanggan">Cari</button>
        </form>
    </search>
    <div class="container">
        <a href="tambahPaket.php">
            <button class="tambah">
                <p>Tambah</p>
            </button>
        </a>
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
                <th class="table-pelanggan-header">Jenis Paket</th>
                <th class="table-pelanggan-header">Durasi Paket</th>
                <th class="table-pelanggan-header">Satuan Durasi</th>
                <th class="table-pelanggan-header">Harga Paket</th>
                <th class="table-pelanggan-header">Aksi</th>
            </tr>
        </thead>

        <tbody>
            <?php $i = 1;
            foreach ($pakets as $paket) : ?>
                <tr class="table-pelanggan-row">
                    <td class="table-pelanggan-data"><?php echo $i ?></td>
                    <td class="table-pelanggan-data"><?php echo htmlspecialchars($paket['jenis_paket']) ?></td>
                    <td class="table-pelanggan-data"><?php echo htmlspecialchars($paket['durasi_paket']) ?></td>
                    <td class="table-pelanggan-data"><?php echo htmlspecialchars($paket['satuan_durasi']) ?></td>
                    <td class="table-pelanggan-data"><?php echo htmlspecialchars($paket['harga_paket']) ?></td>
                    <td class="table-pelanggan-data">
                        <div class="button-UD">
                            <a href="editPaket.php?id=<?php echo $paket['id_paket'] ?>">
                                <button class="edit-data">
                                    <i class="fa-solid fa-pen" style="color: #ffffff;"></i>
                                </button>
                            </a>
                            <a href="deletePaket.php?id=<?php echo $paket['id_paket'] ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus paket ini?')">
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