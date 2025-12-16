<?php
session_start();
include '../config/koneksi.php';

// Logika Tambah Foto
if(isset($_POST['upload'])){
    $judul = $_POST['judul'];
    $file = $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];
    $target = "../assets/uploads/".rand(0,999)."-".$file;
    
    if(move_uploaded_file($tmp, $target)){
        mysqli_query($conn, "INSERT INTO tb_galeri (judul_kegiatan, file_media) VALUES ('$judul', '".basename($target)."')");
        echo "<script>alert('Foto terupload'); location='galeri.php';</script>";
    }
}

// Logika Hapus Foto
if(isset($_GET['hapus'])){
    $id = $_GET['hapus'];
    $cek = mysqli_query($conn, "SELECT * FROM tb_galeri WHERE id='$id'");
    $d = mysqli_fetch_array($cek);
    if(is_file("../assets/uploads/".$d['file_media'])) unlink("../assets/uploads/".$d['file_media']);
    mysqli_query($conn, "DELETE FROM tb_galeri WHERE id='$id'");
    echo "<script>location='galeri.php';</script>";
}
?>

<!DOCTYPE html>
<html>
<head><title>Kelola Galeri</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"></head>
<body class="p-4">
    <div class="container">
        <h3>Kelola Galeri Sekolah</h3>
        <a href="index.php" class="btn btn-secondary mb-3">Kembali</a>

        <div class="card mb-4 bg-light">
            <div class="card-body">
                <form method="post" enctype="multipart/form-data" class="row g-3">
                    <div class="col-md-5">
                        <input type="text" name="judul" class="form-control" placeholder="Judul Kegiatan" required>
                    </div>
                    <div class="col-md-5">
                        <input type="file" name="gambar" class="form-control" required>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" name="upload" class="btn btn-primary w-100">Upload</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="row">
            <?php
            $q = mysqli_query($conn, "SELECT * FROM tb_galeri ORDER BY id DESC");
            while($g = mysqli_fetch_array($q)):
            ?>
            <div class="col-md-3 mb-3">
                <div class="card">
                    <img src="../assets/uploads/<?= $g['file_media']; ?>" class="card-img-top" style="height:150px; object-fit:cover">
                    <div class="card-body text-center">
                        <small><?= $g['judul_kegiatan']; ?></small><br>
                        <a href="galeri.php?hapus=<?= $g['id']; ?>" class="btn btn-danger btn-sm mt-2" onclick="return confirm('Hapus?')">Hapus</a>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
</body>
</html>