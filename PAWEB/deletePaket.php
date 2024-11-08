<?php
require 'koneksi.php';

if (isset($_GET['id'])) {
    $id_paket = $_GET['id'];

    $query = $koneksi->prepare("DELETE FROM paket WHERE id_paket = ?");
    $query->bind_param('i', $id_paket);
    $result = $query->execute();

    if ($result) {
        echo "
        <script>
            alert('Paket berhasil dihapus!');
            document.location.href = 'CRUDpaket.php';
        </script>";
    } else {
        echo "
        <script>
            alert('Paket gagal dihapus!');
            document.location.href = 'CRUDpaket.php';
        </script>";
    }
} else {
    echo "
    <script>
        alert('ID paket tidak ditemukan!');
        document.location.href = 'CRUDpaket.php';
    </script>";
}
?>