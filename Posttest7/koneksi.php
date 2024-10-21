<?php
    $server = "localhost";
    $user = "root";
    $password = "";
    $db_name = "pelanggan";

    $koneksi = mysqli_connect($server, $user, $password, $db_name);

    if ($koneksi -> connect_error) {
    die("Koneksi gagal: " . mysqli_connect_error());
    }
?>