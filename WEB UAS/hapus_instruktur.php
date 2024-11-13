<?php
// Koneksi ke database
$conn = new mysqli("localhost", "username", "password", "db_segar");

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil id_kelas dari URL
$id_instruktur = $_GET['id_instruktur'];

// Validasi apakah id_kelas ada
if (!isset($id_instruktur)) {
    echo "ID instruktur tidak ditemukan.";
    exit;
}

// Query untuk menghapus data kelas berdasarkan id_kelas
$sql = "DELETE FROM instruktur WHERE id_instruktur = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_instruktur);

if ($stmt->execute()) {
    echo "Data instruktur berhasil dihapus.";
    // Redirect kembali ke halaman daftar kelas setelah penghapusan
    header("Location: admin_daftar_instruktur.php");
    exit;
} else {
    echo "Gagal menghapus data instruktur: " . $conn->error;
}

$conn->close();
?>
