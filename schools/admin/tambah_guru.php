<?php
session_start();
include '../config/koneksi.php';

if(isset($_POST['simpan'])){
    $nama = $_POST['nama'];
    $nip = $_POST['nip'];
    $jabatan = $_POST['jabatan'];
    
    // Upload Foto
    $filename = $_FILES['foto']['name'];
    $tmp_name = $_FILES['foto']['tmp_name'];
    $folder = "../assets/uploads/";

    // Rename agar unik (seperti perbaikan sebelumnya)
    $foto_baru = rand(0,9999)."-".$filename;
    
    if(move_uploaded_file($tmp_name, $folder.$foto_baru)){
        $simpan = mysqli_query($conn, "INSERT INTO tb_guru (nama_lengkap, nip, jabatan, foto) VALUES ('$nama', '$nip', '$jabatan', '$foto_baru')");
        echo "<script>alert('Guru ditambahkan'); location='guru.php';</script>";
    } else {
        echo "<script>alert('Gagal upload foto');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head><title>Tambah Guru</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"></head>
<body class="p-5">
    <div class="container" style="max-width: 500px">
        <h3>Tambah Data Guru</h3>
        <form method="POST" enctype="multipart/form-data">
            <div class="mb-3"><label>Nama Lengkap</label><input type="text" name="nama" class="form-control" required></div>
            <div class="mb-3"><label>NIP</label><input type="text" name="nip" class="form-control"></div>
            <div class="mb-3"><label>Jabatan</label><input type="text" name="jabatan" class="form-control" required></div>
            <div class="mb-3"><label>Foto</label><input type="file" name="foto" class="form-control" required></div>
            <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
            <a href="guru.php" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</body>
</html>