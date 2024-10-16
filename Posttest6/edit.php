<?php
require "koneksi.php";

$id = $_GET['id'];

$result = mysqli_query($koneksi, "SELECT * FROM data_plgn WHERE id = $id");

$pelanggan = mysqli_fetch_assoc($result);

if (isset($_POST['ubah'])) {
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $no_hp = mysqli_real_escape_string($koneksi, $_POST['no_hp']);
    $oldImg = $pelanggan['bukti_pembayaran'];

    $tmp_name = $_FILES['foto']['tmp_name'];
    $file_name = $_FILES['foto']['name'];
    $file_size = $_FILES['foto']['size']; 
    $max_size = 2000000; 
    
    $validExtensions = ['jpg', 'jpeg', 'png'];
    $fileExtension = explode('.', $file_name);
    $fileExtension = strtolower(end($fileExtension));

    if ($file_name) {
        if ($file_size > $max_size) {
            echo "
                  <script>
                      alert('Ukuran file terlalu besar! Maksimum 2MB.');
                      document.location.href = 'edit.php?id=$id';
                  </script>";
        } elseif (!in_array($fileExtension, $validExtensions)) {
            echo "
                    <script>
                        alert('Tolong upload file gambar dengan format jpg, jpeg, atau png!');
                        document.location.href = 'edit.php?id=$id';
                    </script>";
        } else {
            date_default_timezone_set('Asia/Makassar');
            $newFileName = date('Y-m-d H.i.s') . '.' . $fileExtension;
            if (move_uploaded_file($tmp_name, 'images/' . $newFileName)) {
                unlink('images/' . $oldImg);
            }
            $sql = "UPDATE data_plgn SET nama='$nama', no_hp='$no_hp', bukti_pembayaran='$newFileName' WHERE id=$id";
        }
    } else {
        $sql = "UPDATE data_plgn SET nama='$nama', no_hp='$no_hp' WHERE id=$id";
    }

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
        Ubah Data Pelanggan
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
        <form method="POST" action="" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nama">Nama Lengkap</label>
                <input type="text" id="nama" name="nama" value="<?php echo $pelanggan['nama']; ?>" required>
            </div>
            <div class="form-group">
                <label for="no_hp">Nomor HP</label>
                <input type="text" id="no_hp" name="no_hp" value="<?php echo $pelanggan['no_hp']; ?>" required>
            </div>
            <div class="form-group">
                <div class="img-container"><img src="images/<?= $pelanggan['bukti_pembayaran'] ?>" alt="<?= $pelanggan['nama'] ?>"></div>

                <label class="label-field" for="foto">Bukti Pembayaran</label>
                <input type="file" name="foto" id="foto">
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
