<?php
require 'koneksi.php';

if (isset($_GET['id'])) {
    $id_membership = $_GET['id'];

    $query = $koneksi->prepare("DELETE FROM membership WHERE id_membership = ?");
    $query->bind_param('i', $id_membership);
    $result = $query->execute();
    if ($result) {
        echo "
        <script>
            alert('Membership berhasil dihapus!');
            document.location.href = 'CRUDmember.php';
        </script>";
    } else {
        echo "
        <script>
            alert('Membership gagal dihapus!');
            document.location.href = 'CRUDmember.php';
        </script>";
    }
} else {
    echo "
    <script>
        alert('ID membership tidak ditemukan!');
        document.location.href = 'CRUDmember.php';
    </script>";
}
?>