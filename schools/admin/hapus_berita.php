<?php
include '../config/koneksi.php';

$id = $_GET['id'];
$ambil = mysqli_query($conn, "SELECT * FROM tb_artikel WHERE id='$id'");
$data = mysqli_fetch_array($ambil);
$foto = $data['gambar_sampul'];

// Hapus file fisik gambar jika ada
if (file_exists("../assets/uploads/$foto")) {
    unlink("../assets/uploads/$foto");
}

// Hapus data di database
mysqli_query($conn, "DELETE FROM tb_artikel WHERE id='$id'");

echo "<script>alert('Berita terhapus'); location='berita.php';</script>";
?>