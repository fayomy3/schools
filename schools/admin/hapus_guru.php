<?php
include '../config/koneksi.php';
$id = $_GET['id'];
$ambil = mysqli_query($conn, "SELECT * FROM tb_guru WHERE id='$id'");
$data = mysqli_fetch_array($ambil);
if(is_file("../assets/uploads/".$data['foto'])) unlink("../assets/uploads/".$data['foto']);

mysqli_query($conn, "DELETE FROM tb_guru WHERE id='$id'");
echo "<script>location='guru.php';</script>";
?>