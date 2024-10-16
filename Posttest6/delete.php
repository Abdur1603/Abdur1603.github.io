<?php
require "koneksi.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sqlGetFile = "SELECT bukti_pembayaran FROM data_plgn WHERE id = $id";
    $result = mysqli_query($koneksi, $sqlGetFile);
    $data = mysqli_fetch_assoc($result);

    if ($data && file_exists('images/' . $data['bukti_pembayaran'])) {
        unlink('images/' . $data['bukti_pembayaran']); 
    }

    $sqlDelete = "DELETE FROM data_plgn WHERE id = $id";
    $deleteResult = mysqli_query($koneksi, $sqlDelete);

    if ($deleteResult) {
        echo "
                <script>
                    alert('Data mahasiswa dan file gambar berhasil dihapus!');
                    document.location.href = 'CRUDAdmin.php';
                </script>";
    } else {
        echo "
                <script>
                    alert('Gagal menghapus data mahasiswa!');
                    document.location.href = 'CRUDAdmin.php';
                </script>";
    }
}
