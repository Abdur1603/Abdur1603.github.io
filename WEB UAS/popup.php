<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Pop-up Konfirmasi</title>
<link rel="stylesheet" href="popup.css">
</head>
<body>

<button class="delete-icon" onclick="showPopup()">🗑️</button>

<!-- Pop-up Konfirmasi Penghapusan -->
<div id="overlay">
  <div class="popup">
    <h2>Konfirmasi</h2>
    <p>Apakah Anda yakin ingin menghapus pelanggan ini? Tindakan ini tidak dapat dibatalkan.</p>
    <div class="buttons">
      <button class="cancel" onclick="closePopup()">Batal</button>
      <button class="delete" onclick="deleteConfirmed()">Hapus</button>
    </div>
  </div>
</div>

<!-- Pop-up Konfirmasi Berhasil -->
<div id="success-overlay">
  <div class="popup">
    <h2>Pelanggan Dihapus</h2>
    <p>Pelanggan berhasil dihapus. Semua data terkait telah dihapus secara permanen.</p>
    <button class="delete" onclick="closeSuccessPopup()">Ok</button>
  </div>
</div>

<script src="script.js"></script>

</body>
</html>
