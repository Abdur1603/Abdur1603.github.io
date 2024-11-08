<?php
require 'koneksi.php';
$id_user = isset($_GET['id_user']) ? $_GET['id_user'] : null;
$id_paket = isset($_GET['id_paket']) ? $_GET['id_paket'] : null;
$durasi = '';
$harga = '';
$jenis = '';
$satuan = '';
if ($id_paket) {
    $query = "SELECT durasi_paket, harga_paket, jenis_paket, satuan_durasi FROM paket WHERE id_paket = ?";
    $stmt = $koneksi->prepare($query);
    $stmt->bind_param("i", $id_paket);
    $stmt->execute();
    $stmt->bind_result($durasi, $harga, $jenis, $satuan);
    $stmt->fetch();
    $stmt->close();
} else {
    echo "Paket tidak ditemukan.";
}
$nama = isset($_GET['nama']) ? $_GET['nama'] : '';
$payment = isset($_GET['payment']) ? $_GET['payment'] : '';
$foto = isset($_GET['foto']) ? $_GET['foto'] : '';

function calculateEndDate($startDate, $duration, $unit) {
    switch ($unit) {
        case 'menit':
            return date('Y-m-d H:i:s', strtotime("+$duration minute", strtotime($startDate)));
        case 'jam':
            return date('Y-m-d H:i:s', strtotime("+$duration hour", strtotime($startDate)));
        case 'hari':
            return date('Y-m-d', strtotime("+$duration day", strtotime($startDate)));
        case 'minggu':
            return date('Y-m-d', strtotime("+$duration week", strtotime($startDate)));
        case 'bulan':
            return date('Y-m-d', strtotime("+$duration month", strtotime($startDate)));
        case 'tahun':
            return date('Y-m-d', strtotime("+$duration year", strtotime($startDate)));
        default:
            return $startDate;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_user = $_POST['id_user'];
    $id_paket = $_POST['id_paket'];
    $nama = $_POST['nama'];
    $payment = $_POST['payment'];
    $id_paket = $_POST['id_paket'];
    $harga = $_POST['harga'];
    $durasi = $_POST['durasi'];
    $jenis = $_POST['jenis'];
    $satuan = $_POST['satuan'];
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
              document.location.href = 'tambah.php?id_paket=$id_paket&nama=$nama&payment=$payment&harga=$harga&durasi=$durasi&jenis=$jenis&foto=$foto';
          </script>";
    } else if (!in_array($fileExtension, $validExtensions)) {
        echo "
          <script>
              alert('Tolong upload file gambar dengan format jpg, jpeg, atau png!');
              document.location.href = 'tambah.php?id_paket=$id_paket&nama=$nama&payment=$payment&harga=$harga&durasi=$durasi&jenis=$jenis&foto=$foto';
          </script>";
    } else {
        date_default_timezone_set('Asia/Makassar');
        $newFileName = date('Y-m-d H.i.s') . '.' . $fileExtension;
        if (move_uploaded_file($tmp_name, 'images/' . $newFileName)) {
            $check_query = $koneksi->prepare("SELECT * FROM membership WHERE id_user = ? AND status_member = 'Aktif'");
            $check_query->bind_param('i', $id_user);
            $check_query->execute();
            $result_check = $check_query->get_result();

            if ($result_check->num_rows > 0) {
                echo "<script>
                      alert('Anda sudah memiliki paket yang aktif. Tidak dapat menambahkan paket baru.');
                      document.location.href = 'index.php';
                      </script>";
            } else {
                $sql = "INSERT INTO data_plgn (id_user, nama, pembayaran, bukti_pembayaran) VALUES ('$id_user','$nama', '$payment', '$newFileName')";
                $query = mysqli_query($koneksi, $sql);
                if ($query) {
                    $id_bayar = mysqli_insert_id($koneksi);
                    $tanggal_login = date('Y-m-d H:i:s');
                    $tanggal_awal = date('Y-m-d H:i:s');
                    $tanggal_akhir = calculateEndDate($tanggal_awal, $durasi, $satuan);
                    $status_member = (strtotime($tanggal_login) > strtotime($tanggal_akhir)) ? 'Tidak Aktif' : 'Aktif';
                    $sql = "INSERT INTO membership (id_user, id_paket, id_bayar, tanggal_awal, tanggal_akhir, status_member, tanggal_login) VALUES ('$id_user', '$id_paket', '$id_bayar', '$tanggal_awal','$tanggal_akhir', '$status_member', '$tanggal_login')";
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
                } else {
                    echo "<script>
                    alert('Data gagal ditambahkan!');
                    </script>";
                }
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
        <p class="key">Durasi Membership:</p>
        <p><?php echo $durasi?> <?php echo $satuan?> </p>
    </div>
    <div>
        <p class="key">Metode Pembayaran:</p>
        <p><?php echo $payment; ?></p>
    </div>
    <div>
        <p class="key">Total Harga:</p>
        <p>Rp<?= number_format($harga, 0, ',', '.') ?></p>
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