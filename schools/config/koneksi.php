<?php
$server   = "localhost";
$user     = "root";      // Default XAMPP
$password = "";          // Default XAMPP kosong
$database = "db_sekolah"; // Sesuaikan nama DB yang tadi dibuat

// Coba hubungkan
$conn = mysqli_connect($server, $user, $password, $database);

// Cek koneksi
if (!$conn) {
    die("<script>alert('Gagal tersambung ke database.')</script>");
}
?>