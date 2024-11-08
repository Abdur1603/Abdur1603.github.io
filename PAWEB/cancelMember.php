<?php
session_start();
require 'koneksi.php';

// Pastikan pengguna sudah login
if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
    echo "
    <script>
        alert('Anda harus login terlebih dahulu.');
        document.location.href = 'login.php';
    </script>
    ";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_user = $_POST['id_user'];

    // Hapus data membership dari database
    $delete_query = $koneksi->prepare("DELETE FROM membership WHERE id_user = ?");
    $delete_query->bind_param('i', $id_user);
    if ($delete_query->execute()) {
        echo "
        <script>
            alert('Membership berhasil dibatalkan.');
            document.location.href = 'profilUser.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Gagal membatalkan membership.');
            document.location.href = 'profilUser.php';
        </script>
        ";
    }
}
?>