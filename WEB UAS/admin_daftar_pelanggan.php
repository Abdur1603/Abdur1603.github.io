<!DOCTYPE html>
<html lang="en">
<?php include('partials/head.php'); ?>
<body>
    <?php include('partials/navbar.php'); ?>

    <main>
        <h2>Daftar Pelanggan</h2>
        <div class="table_container">
            <table>
                <thead>
                    <tr>
                        <th>ID Pelanggan</th>
                        <th>Username</th>
                        <th>Email</th>
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

                    // Query untuk mengambil data pelanggan (mengabaikan admin)
                    $sql = "SELECT id_akun, username, email FROM pengguna WHERE role != 'admin'";
                    $result = $conn->query($sql);

                    // Cek dan tampilkan data
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["id_akun"] . "</td>";
                            echo "<td>" . $row["username"] . "</td>";
                            echo "<td>" . $row["email"] . "</td>";
                            echo "<td>";
                            echo '<button class="edit-btn">✏</button>';
                            echo '<button class="delete-btn">🗑</button>';
                            echo "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4'>Tidak ada data pelanggan</td></tr>";
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
