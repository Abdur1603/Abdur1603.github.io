<?php
require "koneksi.php";
// Cek apakah tombol submit sudah ditekan
if (isset($_POST["submit"])) {
  $username = $_POST["username"];
  $password = password_hash($_POST["password"], PASSWORD_DEFAULT); // Hash password
  $role = $_POST["role"];
  // Cek apakah username sudah digunakan
  $checkQuery = "SELECT * FROM users WHERE username = '$username'";
  $checkResult = mysqli_query($koneksi, $checkQuery);
  if (mysqli_num_rows($checkResult) > 0) {
    // Jika username sudah digunakan
    echo "
        <script>
        alert('Username sudah digunakan! Silakan gunakan username lain.');
        document.location.href = 'registrasi.php';
        </script>
        ";
  } else {
    // Jika username belum digunakan, lanjutkan proses registrasi
    $query = "INSERT INTO users (username, password, role) VALUES ('$username','$password', '$role')";
    if (mysqli_query($koneksi, $query)) {
      echo "
            <script>
            alert('Registrasi berhasil!');
            document.location.href = 'login.php';
            </script>
            ";
    } else {
      echo "
            <script>
            alert('Registrasi gagal!');
            document.location.href = 'index.php';
            </script>
            ";
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Form Register</title>

  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />

  <link rel="stylesheet" href="styles/base.css" />
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="styles/auth.css" />
</head>

<body>
  <section class="auth-card">
    <hgroup>
      <h1 class="auth-title">Get Started</h1>
      <p class="auth-description">Please enter your details</p>
    </hgroup>

    <form action="" method="post" class="auth-form-container">
      <div class="auth-form-group">
        <label for="username" class="auth-form-title">Username</label>
        <input
          type="text"
          placeholder="Username"
          name="username"
          id="username"
          class="auth-form-input"
          required />
      </div>

      <div class="auth-form-group">
        <label for="password" class="auth-form-title">Password</label>
        <input
          type="password"
          placeholder="Password"
          name="password"
          id="password"
          class="auth-form-input"
          required />
      </div>

      <div class="auth-form-group">
        <label for="role" class="auth-form-title">Role</label>
        <select name="role" id="role" class="auth-form-input" required>
          <option name="role" value="Admin">Admin</option>
          <option name="role" value="User">User</option>
        </select>
      </div>

      <div class="show-password-container">
        <input type="checkbox" class="show-password" onclick="passVisibility()">
        <label for="show-password">Show Password</label>
      </div>

      <button type="submit" name="submit" class="auth-button">REGISTER</button>
    </form>
    <div class="auth-text">
      <p>Already have an account? <a href="login.php">Log in</a></p>
    </div>

    <div class="container">
      <a href="index.php">
        <button class="back">
          <p>Back</p>
        </button>
      </a>
    </div>
  </section>


  <script src="scripts/script.js"></script>
</body>

</html>