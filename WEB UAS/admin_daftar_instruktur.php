<!DOCTYPE html>
<html lang="en">
<?php include('partials/head.php'); ?>
<link rel="stylesheet" href="admin.css">

<body>
    <?php include('partials/navbar.php'); ?>

    <main>
        <div class="container">
        <h2>Daftar Instruktur</h2>
        <div class="table_container">
            <a href="tambah_instruktur.php">
                <button>Tambah</button>
            </a>
            <table>
                <thead>
                    <tr>
                        <th>ID Instruktur</th>
                        <th>Nama Instruktur</th>
                        <th>Kelas</th>
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

                    // Query untuk mengambil data instruktur beserta kelas yang diajar
                    $sql = "SELECT i.id_instruktur, i.nama_instruktur, k.nama_kelas
                            FROM instruktur i
                            LEFT JOIN kelas_instruktur ki ON i.id_instruktur = ki.id_instruktur
                            LEFT JOIN kelas k ON ki.id_kelas = k.id_kelas";
                    $result = $conn->query($sql);

                    // Cek dan tampilkan data
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["id_instruktur"] . "</td>";
                            echo "<td>" . $row["nama_instruktur"] . "</td>";
                            echo "<td>" . $row["nama_kelas"] . "</td>";
                            echo "<td>";
                            echo '<button class="edit-btn">✏</button>';
                            echo '<a href="hapus_instruktur.php?id_instruktur=' . $row["id_instruktur"] . '"><button class="delete-btn">🗑</button></a>';
                            echo "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4'>Tidak ada data instruktur</td></tr>";
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
        <?php include('partials/footer.php'); ?>
        </div>
    </main>

</body>

</html>