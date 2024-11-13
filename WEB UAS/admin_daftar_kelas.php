<!DOCTYPE html>
<html lang="en">
<?php include('partials/head.php'); ?>

<body>
    <?php include('partials/navbar.php'); ?>

    <main>
        <h2>Daftar Kelas</h2>
        <div class="table_container">
            <a href="tambah_kelas.php">
                <button>Tambah</button>
            </a>
            <table>
                <thead>
                    <tr>
                        <th>ID Kelas</th>
                        <th>Nama Kelas</th>
                        <th>Jumlah Pelanggan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Koneksi ke database
                    $conn = new mysqli("localhost", "username", "password", "db_segar");

                    // Cek koneksi
                    if ($conn->connect_error) {
                        die("Koneksi gagal: " . $conn->connect_error);
                    }

                    // Query untuk mengambil data kelas beserta jumlah pelanggan
                    $sql = "SELECT k.id_kelas, k.nama_kelas, COUNT(t.id_akun) AS jumlah_pelanggan
                            FROM kelas k
                            LEFT JOIN transaksi t ON k.id_kelas = t.id_kelas
                            GROUP BY k.id_kelas";
                    $result = $conn->query($sql);

                    // Cek dan tampilkan data
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["id_kelas"] . "</td>";
                            echo "<td>" . $row["nama_kelas"] . "</td>";
                            echo "<td>" . $row["jumlah_pelanggan"] . "</td>";
                            echo "<td>";
                            echo '<a href="Edit_kelas.php?id_kelas=' . $row["id_kelas"] . '"><button class="edit-btn">✏</button></a>';
                            echo '<a href="hapus_kelas.php?id_kelas=' . $row["id_kelas"] . '"><button class="delete-btn">🗑</button></a>';
                            echo "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4'>Tidak ada data kelas</td></tr>";
                    }

                    $conn->close();
                    ?>
                </tbody>
            </table>
            <div class="pagination">
                <label for="per-page">10 per page</label>
                <span>1 of 1 pages</span>
            </div>
        </div>
        <a href="NEWWW1.php">
            <button>Kembali</button>
        </a>
    </main>

    <?php include('partials/footer.php'); ?>
</body>

</html>
