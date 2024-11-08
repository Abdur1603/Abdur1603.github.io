<?php
require 'koneksi.php';

if (isset($_GET['id'])) {
    $id_user = $_GET['id'];
    $query = $koneksi->prepare("DELETE FROM users WHERE id = ?");
    $query->bind_param('i', $id_user);
    $result = $query->execute();
    if ($result) {
        echo "
        <script>
            alert('Akun berhasil dihapus!');
            document.location.href = 'CRUDakun.php';
        </script>";
    } else {
        echo "
        <script>
            alert('Akun gagal dihapus!');
            document.location.href = 'CRUDakun.php';
        </script>";
    }
} else {
    echo "
    <script>
        alert('ID akun tidak ditemukan!');
        document.location.href = 'CRUDpelanggan.php';
    </script>";
}
?>