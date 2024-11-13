<?php
// Koneksi ke database
$conn = new mysqli("localhost", "username", "password", "db_segar");

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil id_kelas dari URL
$id_kelas = $_GET['id_kelas'];

// Validasi apakah id_kelas ada
if (!isset($id_kelas)) {
    echo "ID kelas tidak ditemukan.";
    exit;
}

// Query untuk menghapus data kelas berdasarkan id_kelas
$sql = "DELETE FROM kelas WHERE id_kelas = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_kelas);

if ($stmt->execute()) {
    echo "Data kelas berhasil dihapus.";
    // Redirect kembali ke halaman daftar kelas setelah penghapusan
    header("Location: admin_daftar_kelas.php");
    exit;
} else {
    echo "Gagal menghapus data kelas: " . $conn->error;
}

$conn->close();
?>
