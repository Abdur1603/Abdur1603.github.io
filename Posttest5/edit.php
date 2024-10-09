<?php
require "koneksi.php";

$id = $_GET['id'];

$result = mysqli_query($koneksi, "SELECT * FROM plgn WHERE id = $id");

$pelanggan = mysqli_fetch_assoc($result);

if (isset($_POST['ubah'])) {
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $no_hp = mysqli_real_escape_string($koneksi, $_POST['no_hp']);

    $sql = "UPDATE plgn SET nama='$nama', no_hp='$no_hp' WHERE id=$id";
    $result = mysqli_query($koneksi, $sql);

    if ($result) {
        echo "
        <script>
            alert('Data berhasil diubah!');
            document.location.href = 'CRUDAdmin.php';
        </script>";
    } else {
        echo "
        <script>
            alert('Data gagal diubah!');
            document.location.href = 'CRUDAdmin.php';
        </script>";
    }
}

include 'template/navbar.php';
include 'template/header.php';
?>

<main class="data-pelanggan-section">
    <h1 class="data-pelanggan-title">
        Ubah Data pelanggan
    </h1>

    <div class="container">
        <a href="CRUDAdmin.php">
            <button class="back">
                <p>Back</p>
            </button>
        </a>
    </div>

    <div class="form-container">
        <h2>Detail Pemesanan Membership</h2>
        <form method="POST" action="">
            <div class="form-group">
                <label for="nama">Nama Lengkap</label>
                <input type="text" id="nama" name="nama" value="<?php echo $pelanggan['nama']; ?>" required>
            </div>
            <div class="form-group">
                <label for="no_hp">Nomor HP</label>
                <input type="text" id="no_hp" name="no_hp" value="<?php echo $pelanggan['no_hp']; ?>" required>
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
