<!DOCTYPE html>
<html lang="en">
    <?php include('partials/head.php') ?>
<body>
    <?php include('partials/navbar.php') ?>

        <main>
            <h2>Daftar Pelanggan</h2>
            <div class = "table_container">
                <table>
                    <thead>
                        <tr>
                            <th>ID Pelanggan</th>
                            <th>Username</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>#12436</td>
                            <td>Fitati</td>
                            <td>Aktif</td>
                            <td>
                                <button class="edit-btn">✏</button>
                                <button class="delete-btn">🗑</button>
                            </td>
                        </tr>
                        <tr>
                            <td>#12436</td>
                            <td>Fitati</td>
                            <td>Aktif</td>
                            <td>
                                <button class="edit-btn">✏</button>
                                <button class="delete-btn">🗑</button>
                            </td>
                        </tr>
                        <tr>
                            <td>#12436</td>
                            <td>Fitati</td>
                            <td>Tidak Aktif</td>
                            <td>
                                <button class="edit-btn">✏</button>
                                <button class="delete-btn">🗑</button>
                            </td>
                        </tr>
                        <tr>
                            <td>#12436</td>
                            <td>Fitati</td>
                            <td>Aktif</td>
                            <td>
                                <button class="edit-btn">✏</button>
                                <button class="delete-btn">🗑</button>
                            </td>
                        </tr>
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

        <?php include('partials/footer.php') ?>
</body>
</html>