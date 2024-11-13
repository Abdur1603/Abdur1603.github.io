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
    </style>
</head>
<body>
    <div class="container">
        <div class="info-container">
            <div class="overlay">
                <h2>Ayo, Mulai!</h2>
                <p>Sudah Punya Akun?</p>
                <a href="login.php" class="btn btn-outline">Masuk</a>
            </div>
        </div>
        <div class="form-container">
            <h2>Daftar</h2>
            <form action="" method="post">
                <input type="email" placeholder="Email" name="email" required autocomplete="email">
                <input type="text" placeholder="Username" name="username" required autocomplete="username">
                <input type="password" placeholder="Password" name="password" required autocomplete="new-password">
                <button type="submit" name="submit" class="btn btn-primary" style="width:100%;">Daftar</button>
            </form>
        </div>
    </div>
    <?php 
    if (isset($_POST['submit'])) {
        $email = $_POST["email"];
        $username = $_POST["username"];
        $password = $_POST["password"];
        
        if (strlen($username) < 3) {
            echo '<script>
                showAlert("danger", "Isi Form dengan benar", "Username harus lebih dari 3 karakter.");
            </script>';
        } elseif (strlen($password) < 5) {
            echo '<script>
                showAlert("danger", "Isi Form dengan benar", "Password minimal 5 karakter.");
            </script>';
        } else {
            $stmt = $conn->prepare("SELECT username FROM pengguna WHERE username = ?");
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if ($result->num_rows > 0) {
                echo '<script>
                    showAlert("danger", "Isi Form dengan benar", "Username sudah digunakan.");
                </script>';
            } else {
                $stmt = $conn->prepare("SELECT email FROM pengguna WHERE email = ?");
                $stmt->bind_param("s", $email);
                $stmt->execute();
                $result = $stmt->get_result();
                
                if ($result->num_rows > 0) {
                    echo '<script>
                        showAlert("danger", "Isi Form dengan benar", "Email sudah digunakan.");
                    </script>';
                } else {
                    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                    
                    $stmt = $conn->prepare("INSERT INTO pengguna (username, email, password) VALUES (?, ?, ?)");
                    $stmt->bind_param("sss", $username, $email, $hashed_password);
                    
                    if ($stmt->execute()) {
                        echo '<script>
                            showAlert("sukses", "Pendaftaran Berhasil", "Silahkan login dengan akun yang didaftarkan");
                            setTimeout(function() {
                                window.location.href = "login.php";
                            }, 1500);
                        </script>';
                        exit;
                    } else {
                        echo '<script>
                            showAlert("danger", "Gagal mendaftar", "Gagal mendaftar");
                            setTimeout(function() {
                                window.location.href = "daftar.php";
                            }, 1500);
                        </script>';
                    }
                }
            }
        }
    }
    ?>
</body>
</html>