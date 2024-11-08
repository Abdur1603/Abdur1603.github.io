<?php
session_start(); // Memulai session
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=SUSE:wght@100..800&display=swap"
    rel="stylesheet" />
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
  <link rel="stylesheet" href="style.css" />
  <title>GYMBRO</title>
</head>

<body>
  <nav id="navbar">
    <div class="title">
      <h1>GYMBRO</h1>
      <div class="nav-menu">
        <a href="index.php #header">Home</a>
        <a href="index.php #classes">Classes</a>
        <a href="index.php #membership">Membership</a>
        <a href="index.php #about">About Me</a>
      </div>
    </div>
    <div>
      <?php if (isset($_SESSION['username'])): ?>
        <!-- Jika pengguna sudah login, tampilkan nama pengguna -->
        <span class="username">Hello, <?= htmlspecialchars($_SESSION['username']) ?>!</span>
        <button class="btn">
          <a href="logout.php" class="sign-out">Sign Out</a>
        </button>
      <?php else: ?>
        <!-- Jika pengguna belum login, tampilkan "Sign In" -->
        <button class="btn">
          <a href="register.php" class="sign-in">Sign In</a>
        </button>
      <?php endif; ?>
      <div class="icons">
        <a href="#" class="burger"><i class="fa-solid fa-bars"></i></a>
        <a href="#" class="sun"><i class="fa-solid fa-sun"></i></a>
      </div>
    </div>
  </nav>
  <section id="header" class="header">
      <div class="header-text">
        <h1>From Impossible to I'm Possible</h1>
        <p>Empower yourself to make changes you need to make</p>
      </div>
    </section>
</body>

</html>
