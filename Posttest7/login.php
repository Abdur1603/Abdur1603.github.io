<?php
session_start();
require "koneksi.php";

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
  
      if ($user['role'] === 'Admin') {
        $_SESSION['role'] = 'admin'; 
        echo "
        <script>
          alert('Login berhasil! Selamat datang Admin.');
          document.location.href = 'CRUDAdmin.php';
        </script>
        ";
      } else {
        $_SESSION['role'] = 'user';
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
      </script>
      ";
    }
  } else {
    echo "
    <script>
      alert('Username tidak ditemukan!');
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