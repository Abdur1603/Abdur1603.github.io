<?php
session_start();
require 'koneksi.php';

if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
    echo "
    <script>
        alert('Anda harus login terlebih dahulu.');
        document.location.href = 'login.php';
    </script>
    ";
    exit;
}

$id_user = $_SESSION['id'];
$username = $_SESSION['username'];

$query = $koneksi->prepare("SELECT * FROM membership JOIN paket ON membership.id_paket = paket.id_paket WHERE id_user = ?");
$query->bind_param('i', $id_user);
$query->execute();
$result = $query->get_result();
$membership = $result->fetch_assoc();

$membership_status = $membership['status_member'] ?? 'Tidak Ada';
$jenis_membership = $membership['jenis_paket'] ?? 'Tidak Ada';
$harga_membership = $membership['harga_paket'] ?? 0;
$tanggal_akhir = $membership['tanggal_akhir'] ?? 'Tidak Ada';
include 'template/navbar.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Profile</title>
  <link rel="stylesheet" href="styles/profile.css">
</head>
<body>
  <div class="container">
    <div class="profile-card">
      <button onclick="goBack()" class="back-button">Kembali</button>
      <h2 class="username"><?= htmlspecialchars($username) ?></h2>
      <p class="membership-status">Membership: <span><?= htmlspecialchars($membership_status) ?></span></p>
      <p class="membership-status">Jenis Membership: <span><?= htmlspecialchars($jenis_membership) ?></span></p>
      <p class="membership-status">Harga Membership: <span>Rp<?= number_format($harga_membership, 0, ',', '.') ?></span></p>
      <p class="membership-status">Tanggal Berakhir: <span><?= htmlspecialchars($tanggal_akhir) ?></span></p>
      <form method="POST" action="cancelMember.php">
        <input type="hidden" name="id_user" value="<?= $id_user ?>">
        <button type="button" class="back-button" onclick="confirmCancellation()">Batalkan Membership</button>
      </form>
    </div>
  </div>

  <script>
    function goBack() {
      window.history.back();
    }

    function confirmCancellation() {
      <?php if ($membership_status === 'Tidak Ada'): ?>
        alert('Tidak ada membership yang aktif untuk dibatalkan.');
      <?php else: ?>
        if (confirm('Apakah Anda yakin ingin membatalkan membership?')) {
          document.querySelector('form').submit();
        }
      <?php endif; ?>
    }
  </script>
</body>
</html>
<script src="script.js"></script>
<?php
include 'template/footer.php';
?>