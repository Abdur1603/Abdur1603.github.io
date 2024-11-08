<?php
session_start();
require 'koneksi.php';
date_default_timezone_set('Asia/Makassar');
if (isset($_POST["submit"])) {
  $username = $_POST["username"];
  $password = $_POST["password"];

  $query = $koneksi->prepare("SELECT * FROM users WHERE username = ?");
  $query->bind_param('s', $username);
  $query->execute();
  $result = $query->get_result();

  if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();
    if (password_verify($password, $user['password'])) {
      $_SESSION['login'] = true;
      $_SESSION['username'] = $user['username'];
      $_SESSION['id'] = $user['id'];
      $_SESSION['role'] = $user['role'];

      $tanggal_login = date('Y-m-d H:i:s');
      $id_user = $user['id'];

      $update_query = $koneksi->prepare("UPDATE membership SET tanggal_login = ? WHERE id_user = ?");
      $update_query->bind_param('si', $tanggal_login, $id_user);
      $update_query->execute();

      $check_query = $koneksi->prepare("SELECT tanggal_akhir FROM membership WHERE id_user = ?");
      $check_query->bind_param('i', $id_user);
      $check_query->execute();
      $result_check = $check_query->get_result();

      if ($result_check->num_rows === 1) {
        $membership = $result_check->fetch_assoc();
        $tanggal_akhir = $membership['tanggal_akhir'];
        $status_member = (strtotime($tanggal_login) > strtotime($tanggal_akhir)) ? 'Tidak Aktif' : 'Aktif';

        $status_update_query = $koneksi->prepare("UPDATE membership SET status_member = ? WHERE id_user = ?");
        $status_update_query->bind_param('si', $status_member, $id_user);
        $status_update_query->execute();
      }

      if ($user['role'] === 'Admin') {
        echo "
        <script>
          alert('Login berhasil! Selamat datang Admin.');
          document.location.href = 'DashboardAdmin.php';
        </script>
        ";
      } else {
        echo "
        <script>
          alert('Login berhasil! Selamat datang User.');
          document.location.href = 'index.php';
        </script>
        ";
      }
    } else {
      echo "
      <script>
        alert('Password salah!');
        document.location.href = 'login.php';
      </script>
      ";
    }
  } else {
    echo "
    <script>
      alert('Username tidak ditemukan!');
      document.location.href = 'login.php';
    </script>
    ";
  }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Form Login</title>

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
      <h1 class="auth-title">Welcome Back</h1>
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

      <div class="show-password-container">
        <input type="checkbox" class="show-password" onclick="passVisibility()">
        <label for="show-password">Show Password</label>
      </div>

      <button type="submit" name="submit" class="auth-button">LOGIN</button>
    </form>
    <div class="auth-text">
      <p>Don't have an account? <a href="register.php">Sign Up</a></p>
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