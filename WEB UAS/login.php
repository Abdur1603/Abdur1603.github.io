<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('partials/head.php') ?>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #E2E8F0;
        }

        .btn-outline {
            border: 1px solid var(--white);
            color: var(--white);
        }

        .btn-primary {
            color: var(--white);
        } 

        .container {
            display: flex;
            width: 957px;
            height: 567px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
            background-color: var(--white-two);
        }

        .info-container {
            border-radius: 25% 0 0 25%;
            background: linear-gradient(to right, rgba(51, 219, 255, 0.7), rgba(51, 219, 255, 0.5)), url('assets/cover.png') center/cover no-repeat;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h2>Masuk</h2>
            <form action="" method="post">
                <input type="text" placeholder="Username" name="username" required autocomplete="username">
                <input type="password" placeholder="Password" name="password" required autocomplete="current-password">
                <button type="submit" name="submit" class="btn btn-primary" style="width:100%;">Masuk</button>
            </form>
        </div>
        <div class="info-container">
            <div class="overlay">
                <h2>Selamat Datang Kembali!</h2>
                <p>Belum Punya Akun?</p>
                <a href="daftar.php" class="btn btn-outline">Daftar</a>
            </div>
        </div>
    </div>
    <?php
    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM pengguna WHERE username='$username'";
        $result = mysqli_query($conn, $sql);
        if($result){
            $data = mysqli_fetch_assoc($result);
            $_SESSION['role'] = $data['role'];
            if($data && password_verify($password, $data['password'])){
                $_SESSION['username'] = $data['username'];
                // $_SESSION['id_pengguna'] = $data['id_pengguna'];
                $_SESSION['role'] = $data['role'];
                $_SESSION['is_login'] = true;
            if($data['role'] == 'admin'){
                echo '<script>
                    showAlert("sukses", "Login Berhasil", "Anda masuk sebagai admin!");
                    setTimeout(function() {
                        window.location.href = "NEWWW1.php";
                    }, 1500);
                </script>';
                exit();
            } else {
                echo '<script>
                    showAlert("sukses", "Login Berhasil", "Selamat datang, ' . $data['username'] . '!");
                    setTimeout(function() {
                        window.location.href = "index.php";
                    }, 1500);
                </script>';
                exit();
            }
            } else {
                echo '<script>
                        showAlert("danger", "Login Gagal", "Username atau password salah.");
                        setTimeout(function() {
                            window.location.href = "login.php";
                        }, 1500);
                    </script>';
            }
        } else {
            die("Query error: " . mysqli_error($conn));
        }
    }
?>
</body>
</html>