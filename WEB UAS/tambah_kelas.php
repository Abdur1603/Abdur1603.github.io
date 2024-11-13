<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Kelas</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" href="styles/tambah_kelas_styles.css">
</head>
<body>
  <?php
  // Koneksi ke database
  $conn = new mysqli("localhost", "username", "password", "db_segar");

  // Cek koneksi
  if ($conn->connect_error) {
      die("Koneksi gagal: " . $conn->connect_error);
  }

  // Ambil daftar instruktur dari tabel instruktur untuk dropdown
  $query_instruktur = "SELECT id_instruktur, nama_instruktur FROM instruktur";
  $result_instruktur = $conn->query($query_instruktur);

  // Proses form submission
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      // Ambil data dari form
      $nama_kelas = $_POST['nama_kelas'];
      $kategori = $_POST['kategori'];
      $id_instruktur = $_POST['id_instruktur'];
      $ruangan = $_POST['ruangan'];
      $durasi = $_POST['durasi'];
      $maks_peserta = $_POST['maks_peserta'];
      $harga = $_POST['harga'];
      $deskripsi = $_POST['deskripsi'];

      // Insert data ke tabel kelas
      $stmt_kelas = $conn->prepare("INSERT INTO kelas (nama_kelas, kategori, ruangan, durasi, maks_peserta, harga, deskripsi) VALUES (?, ?, ?, ?, ?, ?, ?)");
      $stmt_kelas->bind_param("sssiids", $nama_kelas, $kategori, $ruangan, $durasi, $maks_peserta, $harga, $deskripsi);

      if ($stmt_kelas->execute()) {
          $id_kelas = $stmt_kelas->insert_id; // Mendapatkan id_kelas yang baru saja dimasukkan

          // Insert data ke tabel kelas_instruktur
          $stmt_kelas_instruktur = $conn->prepare("INSERT INTO kelas_instruktur (id_kelas, id_instruktur) VALUES (?, ?)");
          $stmt_kelas_instruktur->bind_param("ii", $id_kelas, $id_instruktur);
          $stmt_kelas_instruktur->execute();

          echo "<script>alert('Kelas berhasil ditambahkan!'); window.location.href='admin_daftar_kelas.php';</script>";
      } else {
          echo "<script>alert('Gagal menambahkan kelas.');</script>";
      }
  }
  ?>

  <!-- Navbar -->
  <nav>
    <ul class="secondary-text">
      <a href="#"><img class="icon-segar" src="/ikon/Ikon_SEGAR.png" alt="Icon 1"></a> 
    </ul>
    <ul>
      <li><a href="#">Dashboard</a></li>
      <li><a href="#">Pelanggan</a></li>
      <li><a href="#">Instruktur</a></li>
      <li><a href="#" class="highlight">Kelas</a></li>
      <a href="#"><i class="fas fa-user-circle icon-button"></i></a>
      <a href="#"><i class="fas fa-sign-out-alt icon-button"></i></a>
    </ul>
  </nav>

  <!-- Form Kontainer -->
  <div class="container">
    <button class="back-btn">
      <a href="admin_daftar_kelas.php">Kembali</a>
    </button>
    <h2>Tambah Kelas</h2>

    <form method="POST">
      <div class="form-row">
        <div class="form-group">
          <label>Nama Kelas</label>
          <input type="text" name="nama_kelas" required>
        </div>
        <div class="form-group">
          <label>Kategori</label>
          <input type="text" name="kategori" required>
        </div>
      </div>
      
      <div class="form-row">
        <div class="form-group">
          <label>Instruktur</label>
          <select name="id_instruktur" required>
            <option value="">Pilih Instruktur</option>
            <?php
            // Loop untuk menampilkan opsi instruktur
            if ($result_instruktur->num_rows > 0) {
                while ($row = $result_instruktur->fetch_assoc()) {
                    echo "<option value='" . $row['id_instruktur'] . "'>" . $row['nama_instruktur'] . "</option>";
                }
            }
            ?>
          </select>
        </div>
        <div class="form-group">
          <label>Ruangan</label>
          <input type="text" name="ruangan" required>
        </div>
      </div>
      
      <div class="form-row">
        <div class="form-group">
          <label>Durasi (Menit)</label>
          <input type="number" name="durasi" required>
        </div>
        <div class="form-group">
          <label>Maksimal Peserta</label>
          <input type="number" name="maks_peserta" required>
        </div>
        <div class="form-group">
          <label>Harga</label>
          <input type="number" name="harga" required>
        </div>
      </div>
      
      <div class="form-group">
        <label>Deskripsi</label>
        <textarea rows="4" name="deskripsi" required></textarea>
      </div>
      
      <div class="form-group">
        <button type="submit" class="submit-btn">Tambah</button>
      </div>
    </form>
  </div>

  <!-- Footer -->
  <footer>
    <div class="footer-content secondary-text">
      <div class="footer-left">
        <i class="copyright-icon">&copy;</i> 2024 SEGAR “Sehat & Bugar”
      </div>
      <div class="footer-right">
        Term of Use | Privacy Policy
      </div>
    </div>
  </footer>  
</body>
</html>
