<?php
require 'koneksi.php';
$durasi = isset($_GET['durasi']) ? $_GET['durasi'] : '';
$harga = isset($_GET['harga']) ? $_GET['harga'] : '';
$gambar = isset($_GET['gambar']) ? $_GET['gambar'] : '';
$nama = isset($_GET['nama']) ? $_GET['nama'] : '';
$no_hp = isset($_GET['no_hp']) ? $_GET['no_hp'] : '';
$payment = isset($_GET['payment']) ? $_GET['payment'] : '';
$foto = isset($_GET['foto']) ? $_GET['foto'] : '';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $gambar = $_POST['gambar'];
    $no_hp = $_POST['no_hp'];
    $payment = $_POST['payment'];
    $harga = $_POST['harga'];
    $durasi = $_POST['durasi'];
    $foto = $_FILES['foto']['name'];

    $tmp_name = $_FILES['foto']['tmp_name'];
    $file_name = $_FILES['foto']['name'];
    $file_size = $_FILES['foto']['size'];
    $max_size = 2000000; 

    $validExtensions = ['jpg', 'jpeg', 'png'];
    $fileExtension = explode('.', $file_name);
    $fileExtension = strtolower(end($fileExtension));

    if ($file_size > $max_size) {
        echo "
          <script>
              alert('Ukuran file terlalu besar! Maksimum 2MB.');
              document.location.href = 'tambah.php?durasi=$durasi&harga=$harga&gambar=$gambar';
          </script>";
    } else if (!in_array($fileExtension, $validExtensions)) {
        echo "
          <script>
              alert('Tolong upload file gambar dengan format jpg, jpeg, atau png!');
              document.location.href = 'tambah.php?durasi=$durasi&harga=$harga&gambar=$gambar';
          </script>";
    } else {
        date_default_timezone_set('Asia/Makassar');
        $newFileName = date('Y-m-d H.i.s') . '.' . $fileExtension;
        if (move_uploaded_file($tmp_name, 'images/' . $newFileName)) {
            $sql = "INSERT INTO data_plgn (nama, no_hp, pembayaran, durasi, bukti_pembayaran) VALUES ('$nama', '$no_hp', '$payment', '$durasi', '$newFileName')";
            $query = mysqli_query($koneksi, $sql);
            if ($query) {
                echo "<script>
                alert('Data berhasil ditambahkan!');
                </script>";
            } else {
                echo "<script>
                alert('Data gagal ditambahkan!');
                </script>";
            }
        }
    }
}

include 'template/navbar.php';
?>

<div class="header-summary">
    <h1>Pemesanan Berhasil!</h1>
    <p>Pesanan membership Anda telah diterima</p>
</div>

<div class="order-details">
    <div>
        <p class="key">Nama:</p>
        <p><?php echo $nama; ?></p>
    </div>
    <div>
        <p class="key">Nomor HP:</p>
        <p><?php echo $no_hp; ?></p>
    </div>
    <div>
        <p class="key">Durasi Membership:</p>
        <p><?php echo $durasi; ?> Bulan</p>
    </div>
    <div>
        <p class="key">Metode Pembayaran:</p>
        <p><?php echo $payment; ?></p>
    </div>
    <div>
        <p class="key">Total Harga:</p>
        <p>Rp<?php echo $harga; ?>,00</p>
    </div>
    <div>
        <p class="key">Bukti Pembayaran:</p>
        <div class="img-container"> <img src="images/<?php echo $newFileName; ?>" alt="Bukti Pembayaran"></div>
    </div>
    <div class="container">
      <a href="index.php">
        <button class="back">
          <p>Back</p>
        </button>
      </a>
    </div> 
</div>

<?php
include "template/footer.php";
?>