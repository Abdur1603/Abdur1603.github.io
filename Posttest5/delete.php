<?php
    require "koneksi.php";

    $id = $_GET['id'];

    $result = mysqli_query($koneksi, "DELETE FROM plgn WHERE id = $id");

    if ($result) {
        echo "
        <script>
            alert('Data berhasil dihapus!');
            document.location.href = 'CRUDAdmin.php';
        </script>";
    } else {
        echo "
        <script>
            alert('Data gagal dihapus!');
            document.location.href = 'CRUDAdmin.php';
        </script>";
    }
?>