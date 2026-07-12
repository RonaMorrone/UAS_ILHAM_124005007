<?php
// =========================================================
// Koneksi Database - FitLife
// =========================================================
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "fitlife_db";

$koneksi = mysqli_connect($host, $user, $pass, $dbname);

if (!$koneksi) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}

mysqli_set_charset($koneksi, "utf8mb4");
?>