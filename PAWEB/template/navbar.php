<?php
session_start();
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
    </div>
    <ul class="nav-links">
      <li><a href="index.php #header">Home</a></li>
      <li><a href="index.php #classes">Classes</a></li>
      <li><a href="index.php #membership">Membership</a></li>
      <li><a href="index.php #about">About Us</a></li>
    </ul>
    <div>
      <?php if (isset($_SESSION['username'])): ?>
        <button class="btn">
          <?php if ($_SESSION['role'] === 'Admin'): ?>
            <a href="dashboardAdmin.php" class="profile-link">Hello, <?= htmlspecialchars($_SESSION['username']) ?>!</a>
          <?php else: ?>
            <a href="profilUser.php" class="profile-link">Hello, <?= htmlspecialchars($_SESSION['username']) ?>!</a>
          <?php endif; ?>
        </button>
        <button class="btn">
          <a href="logout.php" class="sign-out">Sign Out</a>
        </button>
      <?php else: ?>
        <button class="btn">
          <a href="login.php" class="sign-in">Log In</a>
        </button>
        <button class="btn">
          <a href="register.php" class="sign-in">Sign Up</a>
        </button>
      <?php endif; ?>
      <div class="burger" onclick="toggleMenu()">
        <i class="fa-solid fa-bars"></i>
      </div>
    </div>
  </nav>
  <script src="scripts/script.js"></script>
</body>

</html>