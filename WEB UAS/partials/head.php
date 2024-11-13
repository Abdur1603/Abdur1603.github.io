<?php
    include "koneksi.php";
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    $userRole = $_SESSION['role'] ?? 'Tidak login'; 
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    $halamanSekarang = basename($_SERVER['SCRIPT_NAME']);

    $judul = [
        'index.php' => 'Segar | Sehat & Bugar',
        'daftar.php' => 'Daftar | Sehat & Bugar',
        'login.php' => 'Masuk | Sehat & Bugar',
    ];

    if (array_key_exists($halamanSekarang, $judul)) {
        echo '<title>' . $judul[$halamanSekarang] . '</title>';
    }
    ?>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="icon" href="assets/logo.png">
    <script src="scripts/script.js"></script>
    <style>
        .toast-wrapper {
            display: none;
            position: fixed;
            top: 25px;
            right: 30px;
            z-index: 9999;
        }

        .toast {
            border-radius: 12px;
            background: #fff;
            padding: 20px 35px 20px 25px;
            box-shadow: 0 6px 20px -5px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transform: translateX(calc(100% + 30px));
            transition: all 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.35);
        }

        .toast.active {
            transform: translateX(0%);
        }

        .toast.sukses .check {
            background-color: #4070f4;
        }

        .toast.danger .check {
            background-color: #f44336;
        }

        .toast .toast-content {
            display: flex;
            align-items: center;
        }

        .toast-content .check {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 35px;
            min-width: 35px;
            color: #fff;
            font-size: 20px;
            border-radius: 50%;
        }

        .toast-content .message {
            display: flex;
            flex-direction: column;
            margin: 0 20px;
        }

        .message .text {
            font-size: 16px;
            font-weight: 400;
            color: #666666;
        }

        .message .text.text-1 {
            font-weight: 600;
            color: #333;
        }

        .toast .close {
            position: absolute;
            top: 10px;
            right: 15px;
            padding: 5px;
            cursor: pointer;
            opacity: 0.7;
        }

        .toast .close:hover {
            opacity: 1;
        }

        .toast .progress {
            position: absolute;
            bottom: 0;
            left: 0;
            height: 3px;
            width: 100%;
        }

        .toast .progress:before {
            content: "";
            position: absolute;
            bottom: 0;
            right: 0;
            height: 100%;
            width: 100%;
            background-color: #4070f4;
        }

        .progress.active:before {
            animation: progress 5s linear forwards;
        }

        .toast.sukses .progress:before {
            background-color: #4070f4;
        }

        .toast.danger .progress:before {
            background-color: #f44336;
        }

        @keyframes progress {
            100% {
                right: 100%;
            }
        }

        .toast.active~button {
            pointer-events: none;
        }
    </style>
</head>
<body>
    <div class="toast-wrapper">
    <div class="toast">
        <div class="toast-content">
            <i class="fas fa-solid fa-check check"></i>
            <div class="message">
                <span class="text text-1"></span>
                <span class="text text-2"></span>
            </div>
        </div>
        <div class="progress"></div>
    </div>
</div>
</body>