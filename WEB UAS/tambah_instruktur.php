<?php
// Include database connection
include('koneksi.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data and sanitize inputs
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $nama_panjang = mysqli_real_escape_string($conn, $_POST['nama_panjang']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $tempat_tanggal_lahir = mysqli_real_escape_string($conn, $_POST['tempat_tanggal_lahir']);
    $berat = mysqli_real_escape_string($conn, $_POST['berat']);
    $tinggi = mysqli_real_escape_string($conn, $_POST['tinggi']);
    $jenis_kelamin = isset($_POST['gender']) ? $_POST['gender'] : '';
    $hashpassword = password_hash($password, PASSWORD_DEFAULT);

    // Handling file upload (profile picture)
    $foto_profile = '';
    if (isset($_FILES['foto_profile']) && $_FILES['foto_profile']['error'] == 0) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["foto_profile"]["name"]);
        move_uploaded_file($_FILES["foto_profile"]["tmp_name"], $target_file);
        $foto_profile = $target_file;
    }

    // SQL query to insert data into the database
    $sql = "INSERT INTO instruktur (username, nama_instruktur, password, TTL, berat, tinggi, foto_profile, jenis_kelamin)
            VALUES ('$username', '$nama_panjang', '$hashpassword', '$tempat_tanggal_lahir', '$berat', '$tinggi', '$foto_profile', '$jenis_kelamin')";
    
    if (mysqli_query($conn, $sql)) {
        echo "Instruktur berhasil ditambahkan!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Instruktur</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" href="styles/tambah_instruktur_styles.css">
</head>
<body>
  <!-- Navbar -->
  <nav>
    <ul class="secondary-text">
      <a href="#"><img class="icon-segar" src="ikon/Ikon_SEGAR.png" alt="Icon 1"></a> 
    </ul>
    <ul>
      <li><a href="#">Dashboard</a></li>
      <li><a href="#">Pelanggan</a></li>
      <li><a href="#" class="highlight">Instruktur</a></li>
      <li><a href="#">Kelas</a></li>
      <a href="#"><i class="fas fa-user-circle icon-button"></i></a>
      <a href="#"><i class="fas fa-sign-out-alt icon-button"></i></a>
    </ul>
  </nav>

  <!-- Form Kontainer -->
  <div class="container">
    <button class="back-btn">
      <a href="admin_daftar_instruktur.php">Kembali</a>
    </button>
    <h2>Tambah Instruktur</h2>

    <!-- Form yang mengirim data ke script PHP -->
    <form method="POST" enctype="multipart/form-data">
      <div class="form-row">
        <div class="form-group">
          <label>Username</label>
          <input type="text" name="username" required>
        </div>
        <div class="form-group">
          <label>Nama Panjang</label>
          <input type="text" name="nama_panjang" required>
        </div>
      </div>
      
      <div class="form-row">
        <div class="form-group">
          <label>Password</label>
          <input type="password" name="password" required>
        </div>
        <div class="form-group">
          <label>Tempat, Tanggal Lahir</label>
          <input type="text" name="tempat_tanggal_lahir" required>
        </div>
      </div>
      
      <div class="form-row">
        <div class="form-group">
          <label>Berat (KG)</label>
          <input type="number" name="berat" required>
        </div>
        <div class="form-group">
          <label>Tinggi (CM)</label>
          <input type="number" name="tinggi" required>
        </div>
      </div>
      
      <div class="form-group">
        <label>Foto Profile</label>
        <input type="file" name="foto_profile" accept="image/*">
      </div>
      
      <div class="form-group">
        <label>Jenis Kelamin</label>
        <div class="radio-group">
          <label><input type="radio" name="gender" value="Perempuan"> Perempuan</label>
          <label><input type="radio" name="gender" value="Laki-laki"> Laki-laki</label>
        </div>
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
