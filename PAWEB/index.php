<?php

require 'koneksi.php';

$query = "SELECT id_paket, durasi_paket, harga_paket, satuan_durasi, jenis_paket FROM paket";
$result = $koneksi->query($query);

include 'template/navbar.php';
include 'template/header.php';
?>
<section class="main">
  <section id="classes">
    <div class="border-text">CLASSES</div>
    <div class="classes-items">
      <div class="classes-item">
        <img src="Media/giga-bodybuilding.png" alt="Project 1" />
        <h1>BODY BUILDING</h1>
        <p>You’ll look at graphs and charts in Task One, how to approach the task</p>
      </div>
      <div class="classes-item">
        <img src="Media/giga-musclegain.png" alt="Project 1" />
        <h1>MUSCLE GAIN</h1>
        <p>You’ll look at graphs and charts in Task One, how to approach the task</p>
      </div>
      <div class="classes-item">
        <img src="Media/giga-weightloss.png" alt="Project 1" />
        <h1>WEIGHT LOSS</h1>
        <p>You’ll look at graphs and charts in Task One, how to approach the task</p>
      </div>
    </div>
  </section>
  <section id="membership">
    <div class="border-text">MEMBERSHIP</div>
    <div class="membership-items">
      <?php while ($row = $result->fetch_assoc()): ?>
        <div class="membership-item">
          <h1><?= $row['jenis_paket']?></h1>
          <h3><?= $row['durasi_paket'] ?> <?= $row['satuan_durasi']?> </h3>
          <h4>Rp<?= number_format($row['harga_paket'], 0, ',', '.') ?>,00</h4>
          <?php if (isset($_SESSION['login']) && $_SESSION['login'] === true): ?>
            <button class="btn">
            <a href="tambahPembayaran.php?id_paket=<?= $row['id_paket'] ?>&id_user=<?= $_SESSION['id'] ?>" class="order">Pesan Sekarang</a>
          </button>
          <?php else: ?>
            <p>Silakan <a href="login.php">login</a> untuk memesan paket ini.</p>
          <?php endif; ?>
        </div>
      <?php endwhile; ?>
    </div>
  </section>
</section>
<div id="about" class="about-container">
  <div class="about-image">
    <img src="Media/profilePicture.jpg" alt="Foto pembuat WEB" />
  </div>
  <div class="about-text">
    <h1>About Us</h1>
    <h4>Perkenalkan Nama Kita ||Abdurahman Shidiq 2309106068 | Irvan Nurdiansyah 2309106070 | Christian Mahatma 2309106079||</h4>
    <p>Kita adalah 3 orang pemuda dengan impian memiliki studio GYM, Maka dari itu kita dengan sadar dan yakin mendirikan GYM dengan memulai membuat website membersip seperti ini. 
      Mohon untuk membeli membersip di atas untuk membantu 3 pemuda ini mewujudkan mimpi mereka. Terimakasih 🙏🙏🙏🙏</p>
  </div>
</div>
<?php
include 'template/footer.php';
?>